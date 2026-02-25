<?php
namespace App\Services;

use App\Models\Letter;
use App\Models\LetterNumberSequence;
use Illuminate\Support\Facades\DB;

class LetterNumberingService
{
    public function generate(Letter $letter, string $orgCode = 'HIMAPRODI-TI'): string
    {
        return DB::transaction(function () use ($letter, $orgCode) {
            $date = $letter->approved_at ?? now();
            $month = (int) $date->format('n');
            $year  = (int) $date->format('Y');

            $scopeRoman = $letter->scope === 'INTERNAL' ? 'I' : 'II';
            $monthRoman = $this->toRomanMonth($month);
            $code = $letter->letterType->code; // SPM

            $seqRow = LetterNumberSequence::query()
                ->where('period_id', $letter->period_id)
                ->where('org_code', $orgCode)
                ->where('scope', $letter->scope)
                ->where('letter_code', $code)
                ->where('month', $month)
                ->where('year', $year)
                ->lockForUpdate()
                ->first();

            if (!$seqRow) {
                $seqRow = LetterNumberSequence::create([
                    'period_id' => $letter->period_id,
                    'org_code' => $orgCode,
                    'scope' => $letter->scope,
                    'letter_code' => $code,
                    'month' => $month,
                    'year' => $year,
                    'last_number' => 0,
                ]);
                $seqRow->refresh();
            }

            $seqRow->last_number += 1;
            $seqRow->save();

            $seq = str_pad((string)$seqRow->last_number, 3, '0', STR_PAD_LEFT);

            // 001/HIMAPRODI-TI/I-SPM/II/2026
            $full = "{$seq}/{$orgCode}/{$scopeRoman}-{$code}/{$monthRoman}/{$year}";

            $letter->number_seq = $seqRow->last_number;
            $letter->number_full = $full;
            $letter->save();

            return $full;
        });
    }

    private function toRomanMonth(int $m): string
    {
        $map = [1=>'I',2=>'II',3=>'III',4=>'IV',5=>'V',6=>'VI',7=>'VII',8=>'VIII',9=>'IX',10=>'X',11=>'XI',12=>'XII'];
        return $map[$m] ?? 'I';
    }
}
