<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(UsersTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(DistrictsTableSeeder ::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(BannerTableSeeder::class);
        $this->call(CategoryNewsSeeder::class);
        $this->call(CategoryProductSeeder::class);
    }
}
