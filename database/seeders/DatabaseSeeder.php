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
        $this->call(QuestionSeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(TehsilSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(BusinessActivitySeeder::class);
        $this->call(BusinessCategorySeeder::class);
        $this->call(ActivitySeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(RequiredDocumentSeeder::class);
        $this->call(ActivitySectionSeeder::class);
        $this->call(ScopeSeeder::class);
    }
}
