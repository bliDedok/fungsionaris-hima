<?php

namespace App\Http\Controllers;

use App\Models\MemberPeriodRole;
use App\Models\Period;
use App\Models\Program;
use App\Models\Registration;
use App\Models\Gallery;

class LandingController extends Controller
{
    public function index()
    {
        // Active period for fungsionaris
        $activePeriod = Period::where('is_active', true)->first();

        // Fungsionaris: members from active period, ordered by position sort_order
        $fungsionaris = $activePeriod
            ?MemberPeriodRole::with(['member', 'position', 'division'])
            ->where('period_id', $activePeriod->id)
            ->where('is_active', true)
            ->join('positions', 'member_period_roles.position_id', '=', 'positions.id')
            ->orderBy('positions.sort_order')
            ->select('member_period_roles.*')
            ->get()
            : collect();

        // All periods for program kerja year tabs
        $periods = Period::orderByDesc('start_date')->get();

        // Programs grouped by period
        $programsByPeriod = Program::with('period')
            ->orderBy('name')
            ->get()
            ->groupBy('period_id');

        // Active registrations
        $registrations = Registration::where('is_active', true)
            ->orderByDesc('id')
            ->get();

        // Gallery items + categories
        $galleries = Gallery::orderByDesc('id')->get();
        $categories = Gallery::select('category')->distinct()->pluck('category');

        return view('landing', compact(
            'activePeriod',
            'fungsionaris',
            'periods',
            'programsByPeriod',
            'registrations',
            'galleries',
            'categories'
        ));
    }
}
