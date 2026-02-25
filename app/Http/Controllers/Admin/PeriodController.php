<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PeriodRequest;
use App\Models\Period;
use Illuminate\Support\Facades\DB;

class PeriodController extends Controller
{
    public function index()
    {
        $periods = Period::orderByDesc('id')->get();
        return view('admin.periods.index', compact('periods'));
    }

    public function create()
    {
        return view('admin.periods.create');
    }

    public function store(PeriodRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $period = Period::create($request->validated());

            // kalau diaktifkan, matikan yang lain
            if ($period->is_active) {
                Period::where('id', '!=', $period->id)->update(['is_active' => false]);
            }

            return redirect()->route('admin.periods.index')->with('success', 'Periode berhasil dibuat.');
        });
    }

    public function edit(Period $period)
    {
        return view('admin.periods.edit', compact('period'));
    }

    public function update(PeriodRequest $request, Period $period)
    {
        return DB::transaction(function () use ($request, $period) {
            $period->update($request->validated());

            if ($period->is_active) {
                Period::where('id', '!=', $period->id)->update(['is_active' => false]);
            }

            return redirect()->route('admin.periods.index')->with('success', 'Periode berhasil diupdate.');
        });
    }

    public function destroy(Period $period)
    {
        $period->delete();
        return redirect()->route('admin.periods.index')->with('success', 'Periode berhasil dihapus.');
    }
}
