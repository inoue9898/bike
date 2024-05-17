<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            [
                'company_name' => 'Harley Davidson',
                'country_name' => 'アメリカ',
            ],
            [
                'company_name' => 'HONDA',
                'country_name' => '日本',
            ],
            [
                'company_name' => 'KAWASAKI',
                'country_name' => '日本',
            ],
            [
                'company_name' => 'SUZUKI',
                'country_name' => '日本',
            ],
            [
                'company_name' => 'BMW',
                'country_name' => 'ドイツ',
            ],
            [
                'company_name' => 'トライアンフ',
                'country_name' => 'イギリス',
            ],
            [
                'company_name' => 'ドゥカティ',
                'country_name' => 'イタリア',
            ],
            [
                'company_name' => 'KTM',
                'country_name' => 'オーストリア',
            ],
            [
                'company_name' => 'HONDA',
                'country_name' => '日本',
            ],
            [
                'company_name' => 'ベスパ',
                'country_name' => 'イタリア',
            ],
            [
                'company_name' => 'ロイヤルエンフィールド',
                'country_name' => 'インド',
            ],



        ]);
    }
}
