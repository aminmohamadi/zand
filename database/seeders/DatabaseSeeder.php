<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Modules\AAA\Entities\Expert;
use Modules\AAA\Entities\Student;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('experts')->insert([
            'first_name' => 'امین',
            'last_name' => 'محمدی',
            'personality_id' => 123456789,
            'password' => Hash::make(123456789),
            'phone' => '09174083765',
            'status' => random_int(1,2),
            'gender'=>random_int(1,2),
        ]);
    }
}
