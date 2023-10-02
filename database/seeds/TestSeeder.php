<?php

use App\Test;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Test::create([
            'name'=>'Elham Ehab',
            'spec'=>'Full stack',
            'desc'=>'Learning is intersting and a good place',
            'img'=>'Test1.png'
        ]);
        Test::create([
            'name'=>'Rehma Ahmed',
            'spec'=>'Backend developer',
            'desc'=>'Learning is intersting and a good place',
            'img'=>'Test2.png'
        ]);
        Test::create([
            'name'=>'Tarek Ali',
            'spec'=>'Frontend developer',
            'desc'=>'Learning is intersting and a good place',
            'img'=>'Test3.png'
        ]);
        Test::create([
            'name'=>'Karam Mohammed',
            'spec'=>'Testing developer',
            'desc'=>'Learning is intersting and a good place',
            'img'=>'Test4.png'
        ]);
    }

}
