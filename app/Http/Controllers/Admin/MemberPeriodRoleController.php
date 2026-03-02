<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MemberPeriodRole;
use App\Models\Member;
use App\Models\Period;
use App\Models\Division;
use App\Models\Position;
use Illuminate\Http\Request;

class MemberPeriodRoleController extends Controller
{
    public function index(Request $request)
    {
        $roles = MemberPeriodRole::with(['member', 'period', 'division', 'position'])
            ->when($request->period_id, fn($q, $v) => $q->where('period_id', $v))
            ->join('positions', 'member_period_roles.position_id', '=', 'positions.id')
            ->orderBy('positions.sort_order')
            ->select('member_period_roles.*')
            ->get();

        $periods = Period::orderByDesc('start_date')->get();

        return view('admin.member-period-roles.index', compact('roles', 'periods'));
    }

    public function create()
    {
        $members = Member::orderBy('name')->get();
        $periods = Period::orderByDesc('start_date')->get();
        $divisions = Division::orderBy('name')->get();
        $positions = Position::orderBy('sort_order')->get();

        return view('admin.member-period-roles.form', compact('members', 'periods', 'divisions', 'positions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'period_id' => 'required|exists:periods,id',
            'member_id' => 'required|exists:members,id',
            'division_id' => 'required|exists:divisions,id',
            'position_id' => 'required|exists:positions,id',
            'is_core' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
            'joined_at' => 'nullable|date',
        ]);

        $data['is_core'] = $request->boolean('is_core');
        $data['is_active'] = $request->boolean('is_active', true);

        // enforce business limits for certain roles
        if ($error = $this->checkRoleLimits($data)) {
            return back()->withErrors($error)->withInput();
        }

        MemberPeriodRole::create($data);

        return redirect()->route('admin.member-period-roles.index')
            ->with('success', 'Fungsionaris berhasil ditambahkan.');
    }

    public function edit(MemberPeriodRole $memberPeriodRole)
    {
        $members = Member::orderBy('name')->get();
        $periods = Period::orderByDesc('start_date')->get();
        $divisions = Division::orderBy('name')->get();
        $positions = Position::orderBy('sort_order')->get();
        $role = $memberPeriodRole;

        return view('admin.member-period-roles.form', compact('role', 'members', 'periods', 'divisions', 'positions'));
    }

    public function update(Request $request, MemberPeriodRole $memberPeriodRole)
    {
        $data = $request->validate([
            'period_id' => 'required|exists:periods,id',
            'member_id' => 'required|exists:members,id',
            'division_id' => 'required|exists:divisions,id',
            'position_id' => 'required|exists:positions,id',
            'is_core' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
            'joined_at' => 'nullable|date',
        ]);

        $data['is_core'] = $request->boolean('is_core');
        $data['is_active'] = $request->boolean('is_active', true);

        if ($error = $this->checkRoleLimits($data, $memberPeriodRole->id)) {
            return back()->withErrors($error)->withInput();
        }

        $memberPeriodRole->update($data);

        return redirect()->route('admin.member-period-roles.index')
            ->with('success', 'Fungsionaris berhasil diperbarui.');
    }

    public function destroy(MemberPeriodRole $memberPeriodRole)
    {
        $memberPeriodRole->delete();

        return redirect()->route('admin.member-period-roles.index')
            ->with('success', 'Fungsionaris berhasil dihapus.');
    }

    /**
     * check business rules for how many people may hold a particular
     * role in a given period. returns array suitable for ->withErrors()
     * or null if everything is fine.
     */
    protected function checkRoleLimits(array $data, $excludeId = null)
    {
        $position = Position::find($data['position_id']);
        if (!$position) {
            return null; // validation already covers this
        }

        $periodId = $data['period_id'];
        $limitByName = [
            'Ketua Umum' => 1,
            'Wakil Ketua Umum' => 1,
            'Sekretaris Umum' => 1,
            'Sekretaris' => 2,
            'Bendahara' => 2,
        ];

        // check generic limits (period + position)
        if (isset($limitByName[$position->name])) {
            $count = MemberPeriodRole::where('period_id', $periodId)
                ->where('position_id', $data['position_id']);
            if ($excludeId) {
                $count->where('id', '!=', $excludeId);
            }
            if ($count->count() >= $limitByName[$position->name]) {
                return ['position_id' => "Batas jumlah untuk jabatan {$position->name} tercapai"];
            }
        }

        // special case: koordinator divisi must be unique per division
        if ($position->name === 'Koordinator Divisi') {
            $count = MemberPeriodRole::where('period_id', $periodId)
                ->where('position_id', $data['position_id'])
                ->where('division_id', $data['division_id']);
            if ($excludeId) {
                $count->where('id', '!=', $excludeId);
            }
            if ($count->count() >= 1) {
                $divisionName = Division::find($data['division_id'])->name ?? '–';
                return ['division_id' => "Sudah ada koordinator untuk divisi {$divisionName} pada periode tersebut"];
            }
        }

        return null;
    }
}
