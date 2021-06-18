<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
            'name'=>'admin'
            ,'role'=>'admin'
            ,'contact_person'=>'yes'
            ,'email'=>'admin@admin.com'
            ,'password'=>bcrypt('12345678')
            ,'phone_number'=>'085608014111'
        ]
      );
     //vendors
     DB::table('vendors')->insert(
            [
            'name_vendor'=>'Honda'
        ]
      );
     DB::table('vendors')->insert(
            [
            'name_vendor'=>'Toyota'
        ]
      );
     DB::table('vendors')->insert(
            [
            'name_vendor'=>'Daihatsu'
        ]
      );
     //bank
     DB::table('banks')->insert(
      [
        'name_bank'=>'BCA'
        ,'no_rek'=>'09876452132'
        ,'an'=>'Daffa Nugs'
      ],
     );
    }
}
