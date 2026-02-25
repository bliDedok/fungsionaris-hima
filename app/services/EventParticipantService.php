<?php
namespace App\Services;
use App\Models\Attendance;
use App\Models\Event;
use App\Models\MemberPeriodRole;
use App\Models\ProgramMember;
use Illuminate\Support\Facades\DB;

class EventParticipantService
{
    public function seedParticipants(Event $event): void
    {
        DB::transaction(function () use ($event) {
            if ($event->type === 'FUNCTIONARY_MEETING') {
                $q = MemberPeriodRole::query()
                ->where('period_id', $event->period_id)
                ->where('is_active', true)
                ->whereHas('position', fn($p) => $p->where('exclude_from_attendance', false));

                if ($event->only_core) $q->where('is_core', true);

                $memberIds = $q->pluck('member_id')->all();
            } else { // PROGRAM_MEETING
                $q = ProgramMember::query()
                    ->where('program_id', $event->program_id)
                    ->where('is_active', true);
                if ($event->only_core) $q->where('is_core', true);

                $memberIds = $q->pluck('member_id')->all();
            }

            // insert participants
            $rows = array_map(fn($id) => [
                'event_id' => $event->id,
                'member_id' => $id,
                'created_at' => now(),
                'updated_at' => now(),
            ], $memberIds);

            DB::table('event_participants')->upsert($rows, ['event_id','member_id'], ['updated_at']);

            // bikin attendance default absent (buat rekap gampang)
            $attRows = array_map(fn($id) => [
                'event_id' => $event->id,
                'member_id' => $id,
                'status' => 'absent',
                'created_at' => now(),
                'updated_at' => now(),
            ], $memberIds);

            DB::table('attendances')->upsert($attRows, ['event_id','member_id'], ['updated_at']);
        });
    }
}
