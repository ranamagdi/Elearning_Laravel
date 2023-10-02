<?php

use App\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        


        for($i=1;$i<=3;$i++)//cat
        {
            for($j=1;$j<=6;$j++){//course
                Course::create([
                    "cat_id"=>$i,
                    "trainer_Id"=>rand(1,4),
                    "name"=>"Course num $j Cat num $i",
                    "small_desc"=>"Lorem Lorem Lorem Lorem Lorem",
                    "desc"=>"Lorem Lorem Lorem Lorem Lorem Lorem Lorem LoremLorem Lorem LoremLoremLorem Lorem",
                    "price"=>rand(1000,5000),
                    "img"=>"$i$j.png",

                ]);

            }
        }
    }
}
