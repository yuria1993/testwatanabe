<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Test;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('contacts')->insert([
            'fullname' => '渡邉結',
            'gender' => '2',
            'email' => 'yyy@yahoo.co.jp',
            'postcode' => '444-4444',
            'address' => '静岡県',
            'building_name' => 'たたた',
            'opinion' => 'できない',
        ]);
    }
}
