<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\User::class,50)->create();
        // factory(App\subject::class,30)->create();
        
         //  factory(App\material::class,500)->create();
        // factory(App\studentmaterial::class,350)->create();
               factory(App\test::class,20)->create();
              factory(App\questionbank::class,100)->create();
         //     factory(App\payment::class,10)->create();
       // factory(App\teacher_profile::class,20)->create();
       // factory(App\teachers_subject::class,60)->create();
    //factory(App\studentsubject::class,80)->create();
    //factory(App\friend::class,80)->create();



    }
}
