<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder {
    public function run() {
        // テーブルのリセット
        DB::table('users')->delete();

        // 日本語化の設定
        $faker = Factory::create('ja_JP');

        // ダミーデータ挿入（ファクトリ）
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => Hash::make('Aa123456'),
            ]);
        }
    }
}
