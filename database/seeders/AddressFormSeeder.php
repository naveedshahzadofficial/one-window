<?php

namespace Database\Seeders;

use App\Models\AddressForm;
use Illuminate\Database\Seeder;

class AddressFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AddressForm::create(['form_name'=>'Form 1']);
        AddressForm::create(['form_name'=>'Form 2']);
    }
}
