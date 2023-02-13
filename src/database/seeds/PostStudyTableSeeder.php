<?php

use Illuminate\Database\Seeder;

class PostStudyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $param = [
            ['post_id'=>1,'study_id'=>3],
            ['post_id'=>1,'study_id'=>9],
            ['post_id'=>1,'study_id'=>10],
            ['post_id'=>2,'study_id'=>1],
            ['post_id'=>2,'study_id'=>2],
            ['post_id'=>2,'study_id'=>3],
            ['post_id'=>2,'study_id'=>11],
            ['post_id'=>2,'study_id'=>12],
            ['post_id'=>3,'study_id'=>2],
            ['post_id'=>3,'study_id'=>9],
            ['post_id'=>4,'study_id'=>8],
            ['post_id'=>4,'study_id'=>10],
            ['post_id'=>5,'study_id'=>1],
            ['post_id'=>5,'study_id'=>2],
            ['post_id'=>5,'study_id'=>3],
            ['post_id'=>5,'study_id'=>11],
            ['post_id'=>6,'study_id'=>1],
            ['post_id'=>6,'study_id'=>3],
            ['post_id'=>6,'study_id'=>12],
            ['post_id'=>7,'study_id'=>4],
            ['post_id'=>7,'study_id'=>6],
            ['post_id'=>7,'study_id'=>10],
            ['post_id'=>7,'study_id'=>11],
            ['post_id'=>8,'study_id'=>4],
            ['post_id'=>8,'study_id'=>6],
            ['post_id'=>8,'study_id'=>9],
            ['post_id'=>8,'study_id'=>11],
            ['post_id'=>9,'study_id'=>4],
            ['post_id'=>9,'study_id'=>6],
            ['post_id'=>9,'study_id'=>12],
            ['post_id'=>10,'study_id'=>9],
            ['post_id'=>10,'study_id'=>11],
            ['post_id'=>11,'study_id'=>4],
            ['post_id'=>11,'study_id'=>6],
            ['post_id'=>11,'study_id'=>12],
            ['post_id'=>12,'study_id'=>1],
            ['post_id'=>12,'study_id'=>3],
            ['post_id'=>12,'study_id'=>12],
            ['post_id'=>13,'study_id'=>4],
            ['post_id'=>13,'study_id'=>6],
            ['post_id'=>13,'study_id'=>10],
            ['post_id'=>13,'study_id'=>11],
            ['post_id'=>14,'study_id'=>4],
            ['post_id'=>14,'study_id'=>6],
            ['post_id'=>14,'study_id'=>9],
            ['post_id'=>14,'study_id'=>11],
            ['post_id'=>15,'study_id'=>3],
            ['post_id'=>15,'study_id'=>9],
            ['post_id'=>15,'study_id'=>10],
            ['post_id'=>16,'study_id'=>1],
            ['post_id'=>16,'study_id'=>2],
            ['post_id'=>16,'study_id'=>3],
            ['post_id'=>16,'study_id'=>11],
            ['post_id'=>16,'study_id'=>12],
        ];
        DB::table('post_study')->insert($param);
    }
}
