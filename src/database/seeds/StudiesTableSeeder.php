<?php

use Illuminate\Database\Seeder;

class StudiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            ['study'=>'html','color'=>'rgb(0,66,229)','language_or_content'=>'language'],
            ['study'=>'css','color'=>'rgb(0,112,185)','language_or_content'=>'language'],
            ['study'=>'js','color'=>'rgb(0,189,219)','language_or_content'=>'language'],
            ['study'=>'PHP','color'=>'rgb(8,205,250)','language_or_content'=>'language'],
            ['study'=>'Laravel','color'=>'rgb(203,173,240)','language_or_content'=>'language'],
            ['study'=>'SQL','color'=>'rgb(108,67,229)','language_or_content'=>'language'],
            ['study'=>'SHELL','color'=>'rgb(70,9,232)','language_or_content'=>'language'],
            ['study'=>'その他','color'=>'rgb(45,0,186)','language_or_content'=>'language'],
            ['study'=>'N予備校','color'=>'rgb(0,66,229)','language_or_content'=>'content'],
            ['study'=>'ドットインストール','color'=>'rgb(0,112,185)','language_or_content'=>'content'],
            ['study'=>'POSSE課題','color'=>'rgb(0,189,219)','language_or_content'=>'content'],
            ['study'=>'その他','color'=>'rgb(8,205,250)','language_or_content'=>'content'],
        ];
        DB::table('studies')->insert($param);
    }
}

