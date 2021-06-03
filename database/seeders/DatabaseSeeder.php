<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(TelecomCompanySeeder::class);
        $this->call(MobileCodeSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(PrefixSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DesignationBusinessSeeder::class);
        $this->call(MinorityStatusSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(EducationLevelSeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(TehsilSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(AddressTypeSeeder::class);
        $this->call(AddressFormSeeder::class);
        $this->call(AddressCapacitySeeder::class);
        $this->call(AddressShareSeeder::class);
        $this->call(BusinessRegistrationStatusSeeder::class);
        $this->call(BusinessLegalStatusSeeder::class);
        $this->call(BusinessCategorySeeder::class);
        $this->call(BusinessSectorSeeder::class);
        $this->call(BusinessSubSectorSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(ConnectionOwnershipSeeder::class);
        $this->call(UtilityTypeSeeder::class);
        $this->call(UtilityFormSeeder::class);
        $this->call(ConnectionProviderSeeder::class);
        $this->call(FiscalYearSeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(EmployeeTypeSeeder::class);
    }
}
