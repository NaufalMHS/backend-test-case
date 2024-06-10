<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;

class MembersTableSeeder extends Seeder
{
    public function run()
    {
        $members = [
            ['code' => 'M001', 'name' => 'Angga'],
            ['code' => 'M002', 'name' => 'Ferry'],
            ['code' => 'M003', 'name' => 'Putri'],
        ];

        foreach ($members as $member) {
            Member::create($member);
        }
    }
}

