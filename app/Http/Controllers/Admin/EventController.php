<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use App\Services\EventParticipantService;
use App\Models\Period;
use App\Models\Program;
use Illuminate\Support\Str;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::orderByDesc('start_at')->get();
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $periods = Period::orderByDesc('id')->get();
        $programs = Program::orderByDesc('id')->get();
        return view('admin.events.create', compact('periods','programs'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request, EventParticipantService $svc)
    {
        $data = $request->validated();

        // program wajib kalau rapat proker
        if ($data['type'] === 'PROGRAM_MEETING' && empty($data['program_id'])) {
            return back()->withErrors(['program_id' => 'Program wajib dipilih untuk rapat proker.'])->withInput();
        }

        $event = Event::create([
            ...$data,
            'created_by' => $request->user()->id,
            'qr_token' => ($data['attendance_mode'] ?? 'MANUAL') === 'QR' ? Str::uuid()->toString() : null,
        ]);

        // seed peserta + buat attendances default absent
        $svc->seedParticipants($event);

        return redirect()->route('admin.events.show', $event)->with('success', 'Event dibuat & peserta terisi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $participantsCount = $event->participants()->count();
        return view('admin.events.show', compact('event','participantsCount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }

    public function openAttendance(Event $event, Request $request)
    {
        $minutes = (int) $request->input('minutes', 180); // default 3 jam

        $event->update([
            'open_from' => now(),
            'open_until' => now()->addMinutes(max(5, $minutes)),
        ]);

        return back()->with('success', 'Absensi dibuka.');
    }

    public function closeAttendance(Event $event)
    {
        $event->update(['open_until' => now()]);
        return back()->with('success', 'Absensi ditutup.');
    }
}
