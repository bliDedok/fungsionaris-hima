<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Member;
use App\Models\Period;
use App\Models\Division;
use App\Models\Position;
use App\Models\MemberPeriodRole;
use Database\Seeders\HimaTISeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MemberPeriodRoleLimitTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // bring in baseline data
        $this->seed(HimaTISeeder::class);
        // create an admin user so we can hit admin routes
        $this->admin = User::factory()->create();
        $this->admin->assignRole('admin');
    }

    public function test_only_one_ketua_umum_allowed()
    {
        $period = Period::first();
        $pos = Position::where('name', 'Ketua Umum')->first();
        $div = Division::where('slug', 'bph')->first();

        $member1 = Member::factory()->create();
        $member2 = Member::factory()->create();

        // first insertion should pass
        $response = $this->actingAs($this->admin)
            ->post(route('admin.member-period-roles.store'), [
                'period_id' => $period->id,
                'member_id' => $member1->id,
                'division_id' => $div->id,
                'position_id' => $pos->id,
            ]);
        $response->assertSessionHasNoErrors();

        // second should fail
        $response = $this->actingAs($this->admin)
            ->post(route('admin.member-period-roles.store'), [
                'period_id' => $period->id,
                'member_id' => $member2->id,
                'division_id' => $div->id,
                'position_id' => $pos->id,
            ]);
        $response->assertSessionHasErrors('position_id');
    }

    public function test_max_two_secretaris_allowed()
    {
        $period = Period::first();
        $pos = Position::where('name', 'Sekretaris')->first();
        $div = Division::where('slug', 'bph')->first();

        $members = Member::factory()->count(3)->create();

        foreach (range(0, 1) as $i) {
            $response = $this->actingAs($this->admin)
                ->post(route('admin.member-period-roles.store'), [
                    'period_id' => $period->id,
                    'member_id' => $members[$i]->id,
                    'division_id' => $div->id,
                    'position_id' => $pos->id,
                ]);
            $response->assertSessionHasNoErrors();
        }

        $response = $this->actingAs($this->admin)
            ->post(route('admin.member-period-roles.store'), [
                'period_id' => $period->id,
                'member_id' => $members[2]->id,
                'division_id' => $div->id,
                'position_id' => $pos->id,
            ]);
        $response->assertSessionHasErrors('position_id');
    }

    public function test_unique_coordinator_per_division()
    {
        $period = Period::first();
        $pos = Position::where('name', 'Koordinator Divisi')->first();
        $kominfo = Division::where('slug', 'kominfo')->first();

        $members = Member::factory()->count(2)->create();

        $response = $this->actingAs($this->admin)
            ->post(route('admin.member-period-roles.store'), [
                'period_id' => $period->id,
                'member_id' => $members[0]->id,
                'division_id' => $kominfo->id,
                'position_id' => $pos->id,
            ]);
        $response->assertSessionHasNoErrors();

        $response = $this->actingAs($this->admin)
            ->post(route('admin.member-period-roles.store'), [
                'period_id' => $period->id,
                'member_id' => $members[1]->id,
                'division_id' => $kominfo->id,
                'position_id' => $pos->id,
            ]);
        $response->assertSessionHasErrors('division_id');
    }
}
