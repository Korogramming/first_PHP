<?php

//取り返しがつかない場合は参考があるので08-1を見返すこと。

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //08-1作成したPostSeederクラスをDatabaseSeeder.phpファイルで呼び出し
        $this->call(PostSeeder::class);
    }
}
