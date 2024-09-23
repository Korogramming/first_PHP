<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


//08-1 シーディングによるデータの挿入
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    //カラムに値を書いていく
    //title body created_at updated_atは記載しないとnullになってしまうため、記載して
    public function run(): void
    {
        DB::table('posts')->insert([
            'title' => '命名の心得',
            'body' => '命名はデータを基準に考える',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
