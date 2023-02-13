<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            ['comment'=>'難しかった','hour'=>1,'day'=>'2022-07-11','user_id'=>1],
            ['comment'=>'','hour'=>3,'day'=>'2022-09-11','user_id'=>1],
            ['comment'=>'','hour'=>2,'day'=>'2022-09-11','user_id'=>2],
            ['comment'=>'','hour'=>4,'day'=>'2022-09-20','user_id'=>1],
            ['comment'=>'','hour'=>1,'day'=>'2023-2-11','user_id'=>2],
            ['comment'=>'終わった','hour'=>6,'day'=>'2023-2-14','user_id'=>2],
            ['comment'=>'終わった','hour'=>4,'day'=>'2023-2-17','user_id'=>2],
            ['comment'=>'','hour'=>4,'day'=>'2023-2-17','user_id'=>3],
            ['comment'=>'','hour'=>4,'day'=>'2023-2-21','user_id'=>3],
            ['comment'=>'','hour'=>7,'day'=>'2023-2-28','user_id'=>3],
            ['comment'=>'','hour'=>4,'day'=>'2023-2-21','user_id'=>1],
            ['comment'=>'','hour'=>1,'day'=>'2023-2-21','user_id'=>1],
            ['comment'=>'','hour'=>4,'day'=>'2023-2-22','user_id'=>1],
            ['comment'=>'','hour'=>5,'day'=>'2023-2-23','user_id'=>1],
            ['comment'=>'','hour'=>8,'day'=>'2023-2-24','user_id'=>1],
            ['comment'=>'','hour'=>3,'day'=>'2023-2-25','user_id'=>1],
        ];
        DB::table('posts')->insert($param);
    }
}
