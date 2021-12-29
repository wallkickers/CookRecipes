<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Api\Recipe;
use App\Models\User;
use DB;
use Illuminate\Database\Seeder;

class InitialDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            $user = User::factory()->create();

            for ($i=0; $i<10; ++$i) {
                $recipe = Recipe::factory()->create(
                    [
                        'user_id' => $user->id,
                    ]
                );
            }
        });
    }
}
