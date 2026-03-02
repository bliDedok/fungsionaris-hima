<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Period;
use App\Models\Division;
use App\Models\Position;
use App\Models\Member;
use App\Models\MemberPeriodRole;
use App\Models\Program;
use App\Models\Registration;
use App\Models\Gallery;

class HimaTISeeder extends Seeder
{
    public function run(): void
    {
        // ===== 1. PERIODS =====
        $periods = [];
        foreach ([
            ['name' => '2021/2022', 'start_date' => '2021-09-01', 'end_date' => '2022-08-31', 'is_active' => false],
            ['name' => '2022/2023', 'start_date' => '2022-09-01', 'end_date' => '2023-08-31', 'is_active' => false],
            ['name' => '2023/2024', 'start_date' => '2023-09-01', 'end_date' => '2024-08-31', 'is_active' => false],
            ['name' => '2024/2025', 'start_date' => '2024-09-01', 'end_date' => '2025-08-31', 'is_active' => false],
            ['name' => '2025/2026', 'start_date' => '2025-09-01', 'end_date' => '2026-08-31', 'is_active' => true],
        ] as $p) {
            $periods[$p['name']] = Period::firstOrCreate(['name' => $p['name']], $p);
        }

        // ===== 2. DIVISIONS =====
        // only include the divisions that correspond to allowed coordinator roles plus
        // a "BPH" group for the executive positions (chair, secretary, etc.).
        $divisions = [];
        foreach ([
            ['name' => 'BPH', 'slug' => 'bph'],
            ['name' => 'Kominfo', 'slug' => 'kominfo'],
            ['name' => 'HH', 'slug' => 'hh'],
            ['name' => 'PSDM', 'slug' => 'psdm'],
            ['name' => 'Delegasi', 'slug' => 'delegasi'],
        ] as $d) {
            $divisions[$d['slug']] = Division::firstOrCreate(['slug' => $d['slug']], $d);
        }

        // ===== 3. POSITIONS (sort_order determines display order on landing) =====
        // the application will let admins assign only these roles; limits are enforced
        // in the controller later (1 chair, 1 vice-chair, 1 secretary-general,
        // maximum 2 secretaries, maximum 2 treasurers, one coordinator per division).
        $positions = [];
        foreach ([
            ['name' => 'Ketua Umum', 'sort_order' => 1],
            ['name' => 'Wakil Ketua Umum', 'sort_order' => 2],
            ['name' => 'Sekretaris Umum', 'sort_order' => 3],
            ['name' => 'Sekretaris', 'sort_order' => 4],
            ['name' => 'Bendahara', 'sort_order' => 5],
            ['name' => 'Koordinator Divisi', 'sort_order' => 6],
        ] as $pos) {
            $positions[$pos['name']] = Position::firstOrCreate(['name' => $pos['name']], $pos);
        }

        // ===== 4. MEMBERS =====
        $members = [];
        $memberData = [
            // ten sample members; feel free to add more when seeding additional roles
            ['name' => 'I Kadek Arta Wijaya', 'nim' => '2115101001', 'email' => 'arta@undiknas.ac.id'],
            ['name' => 'Ni Putu Ayu Pratiwi', 'nim' => '2115101002', 'email' => 'ayu@undiknas.ac.id'],
            ['name' => 'I Made Dwi Putra', 'nim' => '2115101003', 'email' => 'dwi@undiknas.ac.id'],
            ['name' => 'Ni Luh Eka Sari', 'nim' => '2115101004', 'email' => 'eka@undiknas.ac.id'],
            ['name' => 'I Gede Surya Dharma', 'nim' => '2115101005', 'email' => 'surya@undiknas.ac.id'],
            ['name' => 'Ni Kadek Putri Lestari', 'nim' => '2115101006', 'email' => 'putri@undiknas.ac.id'],
            ['name' => 'I Wayan Agus Saputra', 'nim' => '2115101007', 'email' => 'agus@undiknas.ac.id'],
            ['name' => 'Ni Made Indah Permata', 'nim' => '2115101008', 'email' => 'indah@undiknas.ac.id'],
            ['name' => 'I Putu Bayu Kresna', 'nim' => '2115101009', 'email' => 'bayu@undiknas.ac.id'],
            ['name' => 'Ni Komang Sri Rahayu', 'nim' => '2115101010', 'email' => 'sri@undiknas.ac.id'],
            ['name' => 'I Nyoman Putra Santika', 'nim' => '2115101011', 'email' => 'santika@undiknas.ac.id'],
        ];

        foreach ($memberData as $m) {
            $members[$m['nim']] = Member::firstOrCreate(['nim' => $m['nim']], $m);
        }

        // ===== 5. MEMBER PERIOD ROLES (Fungsionaris for active period 2025/2026) =====
        $activePeriod = $periods['2025/2026'];
        $assignments = [
            // executive BPH roles
            ['nim' => '2115101001', 'position' => 'Ketua Umum', 'division' => 'bph', 'is_core' => true],
            ['nim' => '2115101002', 'position' => 'Wakil Ketua Umum', 'division' => 'bph', 'is_core' => true],
            ['nim' => '2115101003', 'position' => 'Sekretaris Umum', 'division' => 'bph', 'is_core' => true],
            ['nim' => '2115101004', 'position' => 'Sekretaris', 'division' => 'bph', 'is_core' => true],
            ['nim' => '2115101005', 'position' => 'Sekretaris', 'division' => 'bph', 'is_core' => true],
            ['nim' => '2115101006', 'position' => 'Bendahara', 'division' => 'bph', 'is_core' => true],
            ['nim' => '2115101007', 'position' => 'Bendahara', 'division' => 'bph', 'is_core' => true],
            // coordinators for each authorised division
            ['nim' => '2115101008', 'position' => 'Koordinator Divisi', 'division' => 'kominfo', 'is_core' => false],
            ['nim' => '2115101009', 'position' => 'Koordinator Divisi', 'division' => 'hh', 'is_core' => false],
            ['nim' => '2115101010', 'position' => 'Koordinator Divisi', 'division' => 'psdm', 'is_core' => false],
            // optionally a delegate coordinator if we had a 11th member
            ['nim' => '2115101011', 'position' => 'Koordinator Divisi', 'division' => 'delegasi', 'is_core' => false],
        ];

        foreach ($assignments as $a) {
            MemberPeriodRole::firstOrCreate(
                ['period_id' => $activePeriod->id, 'member_id' => $members[$a['nim']]->id],
                [
                    'position_id' => $positions[$a['position']]->id,
                    'division_id' => $divisions[$a['division']]->id,
                    'is_core' => $a['is_core'],
                    'is_active' => true,
                    'joined_at' => '2025-09-01',
                ]
            );
        }

        // ===== 6. PROGRAMS (across several periods) =====
        $programList = [
            ['period' => '2025/2026', 'name' => 'IT-Versary', 'description' => 'Perayaan tahunan HIMA TI'],
            ['period' => '2025/2026', 'name' => 'Seminar Nasional', 'description' => 'Seminar teknologi informasi nasional'],
            ['period' => '2025/2026', 'name' => 'Workshop Web Development', 'description' => 'Workshop pemrograman web'],
            ['period' => '2025/2026', 'name' => 'Study Tour', 'description' => 'Kunjungan industri IT'],
            ['period' => '2024/2025', 'name' => 'IT-Versary 2024', 'description' => 'Perayaan tahunan HIMA TI 2024'],
            ['period' => '2024/2025', 'name' => 'Hackathon', 'description' => 'Kompetisi pemrograman 48 jam'],
            ['period' => '2024/2025', 'name' => 'Seminar AI', 'description' => 'Seminar Artificial Intelligence'],
            ['period' => '2023/2024', 'name' => 'IT-Versary 2023', 'description' => 'Perayaan tahunan HIMA TI 2023'],
            ['period' => '2023/2024', 'name' => 'Workshop Mobile Dev', 'description' => 'Workshop pengembangan aplikasi mobile'],
        ];

        foreach ($programList as $pg) {
            Program::firstOrCreate(
                ['name' => $pg['name'], 'period_id' => $periods[$pg['period']]->id],
                ['description' => $pg['description']]
            );
        }

        // ===== 7. REGISTRATIONS =====
        $regList = [
            [
                'title' => 'Open Recruitment HIMA TI 2025',
                'slug' => 'oprec-hima-ti-2025',
                'description' => 'Pendaftaran calon anggota HIMA TI periode 2025/2026',
                'is_active' => true,
                'open_date' => '2025-08-01',
                'close_date' => '2025-09-30',
                'form_fields' => [
                    ['name' => 'nama_lengkap', 'label' => 'Nama Lengkap', 'type' => 'text', 'required' => true],
                    ['name' => 'nim', 'label' => 'NIM', 'type' => 'text', 'required' => true],
                    ['name' => 'email', 'label' => 'Email', 'type' => 'email', 'required' => true],
                    ['name' => 'no_hp', 'label' => 'No. HP', 'type' => 'text', 'required' => true],
                    [
                        'name' => 'divisi',
                        'label' => 'Divisi Pilihan',
                        'type' => 'select',
                        'required' => true,
                        'options' => ['Akademik', 'Humas', 'Minat & Bakat', 'Kewirausahaan']
                    ],
                    ['name' => 'motivasi', 'label' => 'Motivasi', 'type' => 'textarea', 'required' => true],
                ],
            ],
            [
                'title' => 'IT-Versary 2025',
                'slug' => 'it-versary-2025',
                'description' => 'Pendaftaran peserta IT-Versary 2025',
                'is_active' => true,
                'open_date' => '2025-10-01',
                'close_date' => '2026-03-30',
                'form_fields' => [
                    ['name' => 'nama_lengkap', 'label' => 'Nama Lengkap', 'type' => 'text', 'required' => true],
                    ['name' => 'email', 'label' => 'Email', 'type' => 'email', 'required' => true],
                    ['name' => 'no_hp', 'label' => 'No. HP', 'type' => 'text', 'required' => true],
                    [
                        'name' => 'kategori',
                        'label' => 'Kategori Lomba',
                        'type' => 'select',
                        'required' => true,
                        'options' => ['Web Design', 'Competitive Programming', 'UI/UX Design', 'E-Sport']
                    ],
                    ['name' => 'nama_tim', 'label' => 'Nama Tim', 'type' => 'text', 'required' => false],
                ],
            ],
        ];

        foreach ($regList as $r) {
            Registration::firstOrCreate(['slug' => $r['slug']], $r);
        }

        // ===== 8. GALLERY =====
        $galleryItems = [
            ['category' => 'IT-VERSARY', 'title' => 'Pembukaan IT-Versary 2025', 'caption' => 'Acara pembukaan'],
            ['category' => 'IT-VERSARY', 'title' => 'Lomba Web Design', 'caption' => 'Peserta lomba web'],
            ['category' => 'IT-VERSARY', 'title' => 'Penutupan IT-Versary', 'caption' => 'Penyerahan hadiah'],
            ['category' => 'SEMINAR', 'title' => 'Seminar Nasional AI', 'caption' => 'Keynote speaker'],
            ['category' => 'SEMINAR', 'title' => 'Diskusi Panel', 'caption' => 'Sesi tanya jawab'],
            ['category' => 'WORKSHOP', 'title' => 'Workshop Laravel', 'caption' => 'Hands-on coding'],
            ['category' => 'WORKSHOP', 'title' => 'Workshop React', 'caption' => 'Frontend development'],
            ['category' => 'STUDY TOUR', 'title' => 'Kunjungan Industri', 'caption' => 'Visit ke perusahaan IT'],
        ];

        foreach ($galleryItems as $g) {
            Gallery::firstOrCreate(
                ['title' => $g['title']],
                array_merge($g, ['image' => null]) // no actual images, will show placeholder
            );
        }

        $this->command->info('✅ HIMA TI seeder completed!');
    }
}
