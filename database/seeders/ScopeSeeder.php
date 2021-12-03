<?php

namespace Database\Seeders;

use App\Models\Scope;
use Illuminate\Database\Seeder;

class ScopeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Scope::create(['scope_title'=>'Federal', 'scope_order'=>1, 'scope_status'=>1]);
        Scope::create(['scope_title'=>'Provincial', 'scope_order'=>2, 'scope_status'=>1]);
        Scope::create(['scope_title'=>'District', 'scope_order'=>3, 'scope_status'=>1]);
        Scope::create(['scope_title'=>'Tehsil', 'scope_order'=>4, 'scope_status'=>1]);
        Scope::create(['scope_title'=>'UC', 'scope_order'=>5, 'scope_status'=>1]);

    }
}
