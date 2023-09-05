<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = ['Hakkımızda','Kariyer','Vizyon','Misyon'];
        $count=0;
        foreach ($pages as $page) {
            $count++;
            DB::table('pages')->insert([
                'title' => $page,
                'slug' => Str::slug($page),
                'image'=>'https://cdn.webo.digital/uploads/2022/08/Business-Technology-scaled.jpeg',
                'content'=>'saygılar  ablacığım',
                'order'=>$count,
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
    }
}
