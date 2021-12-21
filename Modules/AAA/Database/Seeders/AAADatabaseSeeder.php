<?php

namespace Modules\AAA\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\AAA\Database\factories\ExpertFactory;

class AAADatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        ExpertFactory::factory()->count(1)->make();

    }
}
