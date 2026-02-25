<?php

namespace App\Http\Controllers\Letter;

use App\Http\Controllers\Controller;
use App\Models\Letter;
use Illuminate\Http\Request;
use App\Services\LetterNumberingService;


class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Letter $letter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Letter $letter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Letter $letter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Letter $letter)
    {
        //
    }

    public function submit(Letter $letter, Request $request)
    {
        abort_unless(in_array($letter->status, ['draft','rejected']), 400);

        $letter->update(['status' => 'submitted']);
        return back()->with('success', 'Surat diajukan untuk approval.');
    }

    public function approve(Letter $letter, Request $request, LetterNumberingService $svc)
    {
        abort_unless($letter->status === 'submitted', 400);

        $letter->approved_by = $request->user()->id;
        $letter->approved_at = now();
        $letter->status = 'approved';
        $letter->save();

        // generate nomor: 001/HIMAPRODI-TI/I-SPM/II/2026
        $svc->generate($letter, 'HIMAPRODI-TI');

        return back()->with('success', 'Surat disetujui & nomor surat dibuat.');
    }

    public function reject(Letter $letter, Request $request)
    {
        abort_unless($letter->status === 'submitted', 400);

        $letter->update([
            'status' => 'rejected',
            'rejected_reason' => $request->input('reason'),
        ]);

        return back()->with('success', 'Surat ditolak.');
    }
}
