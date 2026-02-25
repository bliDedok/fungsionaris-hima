<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventBrowseController extends Controller
{
    public function index(Request $request)
    {
        $member = $request->user()->member;
        if (!$member) {
            return view('events.index', [
                'events' => collect(),
                'error' => 'Akun kamu belum terhubung ke data Member. Minta admin hubungkan dulu.',
            ]);
        }

        // Event yang memang dia jadi peserta (ada attendance row)
        $events = Event::query()
            ->whereHas('attendances', fn($q) => $q->where('member_id', $member->id))
            ->orderByDesc('start_at')
            ->get();

        return view('events.index', compact('events'));
    }

    public function show(Event $event, Request $request)
    {
        $member = $request->user()->member;
        abort_unless($member, 403);

        $attendance = $event->attendances()
            ->where('member_id', $member->id)
            ->firstOrFail();

        return view('events.show', compact('event', 'attendance'));
    }
}
