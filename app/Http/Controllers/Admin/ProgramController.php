<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Period;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::with('period', 'division')->orderByDesc('id')->get();
        return view('admin.programs.index', compact('programs'));
    }

    public function create()
    {
        $periods = Period::orderByDesc('id')->get();
        $divisions = Division::orderBy('name')->get();
        return view('admin.programs.form', compact('periods', 'divisions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'period_id' => 'required|exists:periods,id',
            'division_id' => 'nullable|exists:divisions,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'start_at' => 'nullable|date',
            'end_at' => 'nullable|date|after_or_equal:start_at',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('programs', 'public');
        }

        Program::create($data);

        return redirect()->route('admin.programs.index')->with('success', 'Program kerja berhasil ditambahkan.');
    }

    public function edit(Program $program)
    {
        $periods = Period::orderByDesc('id')->get();
        $divisions = Division::orderBy('name')->get();
        return view('admin.programs.form', compact('program', 'periods', 'divisions'));
    }

    public function update(Request $request, Program $program)
    {
        $data = $request->validate([
            'period_id' => 'required|exists:periods,id',
            'division_id' => 'nullable|exists:divisions,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'start_at' => 'nullable|date',
            'end_at' => 'nullable|date|after_or_equal:start_at',
        ]);

        if ($request->hasFile('image')) {
            if ($program->image)
                Storage::disk('public')->delete($program->image);
            $data['image'] = $request->file('image')->store('programs', 'public');
        }

        $program->update($data);

        return redirect()->route('admin.programs.index')->with('success', 'Program kerja berhasil diperbarui.');
    }

    public function destroy(Program $program)
    {
        if ($program->image)
            Storage::disk('public')->delete($program->image);
        $program->delete();

        return redirect()->route('admin.programs.index')->with('success', 'Program kerja berhasil dihapus.');
    }
}
