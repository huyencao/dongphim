<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('settings')->truncate();

        $settings = [
        	['GCO-Book', 'logo', '315 Truong Trinh, Thanh xuan', '0954 223 235', '0968 582 838', 'facebook', 'caohuyeenf1997@gmail.com','website dat sach truc tuyen', 1, 'GCO-Book', 'GCO-Book', 'GCO-Book'],
        ];

        foreach ($settings as $setting) {
            App\Models\Setting::create([
                'name' => $setting[0],
                'logo' => $setting[1],
                'address' => $setting[2],
                'phone' => $setting[3],
                'hotline' => $setting[4],
                'facebook' => $setting[5],
                'email' => $setting[6],
                'description' => $setting[7],
                'user_id' => $setting[8],
                'meta_title' => $setting[9],
                'meta_seo' => $setting[10],
                'meta_keyword' => $setting[11],
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
