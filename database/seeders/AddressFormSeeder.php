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
        AddressForm::create(['form_name'=>'Commercial']);
        AddressForm::create(['form_name'=>'Industrial']);
        AddressForm::create(['form_name'=>'Residential']);
    }
}
