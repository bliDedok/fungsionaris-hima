<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Attendance;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class AttendanceController extends Controller
{
    public function checkin(Event $event, Request $request)
    {
        $request->validate([
            'signature' => ['required', 'string'],
        ]);

        $member = $request->user()->member;
        abort_unless($member, 403, 'Akun belum terhubung ke Member.');

        // window absensi harus aktif
        if (!$event->open_from || !$event->open_until) {
            abort(403, 'Absensi belum dibuka.');
        }
        abort_unless(now()->between($event->open_from, $event->open_until), 403, 'Absensi di luar waktu.');

        $attendance = Attendance::where('event_id', $event->id)
            ->where('member_id', $member->id)
            ->firstOrFail();

        if ($attendance->checkin_at) {
            return back()->with('info', 'Kamu sudah check-in.');
        }

        $signaturePath = $this->storeSignaturePng($request->input('signature'));

        $attendance->checkin_at = now();
        $attendance->signature_path = $signaturePath;
        $attendance->signed_at = now();
        $attendance->signed_ip = $request->ip();

        // telat > 15 menit dari start_at
        $lateLimit = $event->start_at->copy()->addMinutes(15);
        $attendance->status = now()->gt($lateLimit) ? 'late' : 'present';

        $attendance->save();

        return back()->with('success', 'Check-in berhasil.');
    }

    private function storeSignaturePng(string $dataUrl): string
    {
        if (!str_starts_with($dataUrl, 'data:image/png;base64,')) {
            abort(422, 'Format tanda tangan tidak valid.');
        }

        $base64 = str_replace('data:image/png;base64,', '', $dataUrl);
        $binary = base64_decode($base64, true);
        if ($binary === false) abort(422, 'Gagal decode tanda tangan.');

        $path = 'signatures/'.date('Y/m/').Str::uuid().'.png';
        Storage::disk('public')->put($path, $binary);

        return $path;
    }
}
