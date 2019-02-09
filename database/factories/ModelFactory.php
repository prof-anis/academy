<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
    $position=['student','teacher'];
    $class=['js1','js2','js3'];
    return [
       
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'status'=>1,//1 is active , 0 is not active , 2 is not setup
        'code'=>rand(999,9999),
        'position'=>$position[rand(0,1)],
        'class'=>$class[rand(0,2)]
    ];
});

$factory->define(App\subject::class, function (Faker\Generator $faker) {
    static $password;
    $class=['js1','js2','js3','ss1','ss2','ss3',"basic"];
    $choose=$class[rand(0,2)];
    if($choose == 'js1' || $choose == 'js2' || $choose == 'js3')
    {
        $classify="junior";
    }
    if($choose == 'ss1' || $choose == 'ss2' || $choose == 'ss3')
    {
        $classify="senior";
    }
    else{
        $classify="basic";
    }
return [
       
        'subject' => $faker->text(5),
        'class'=>$choose,
           'cost'=>rand(100,500),
           'classification'=>$classify
       
    ];
});

$factory->define(App\studentsubject::class, function (Faker\Generator $faker) {
    static $password;

    return [
       
        'student' => App\User::where('position','student')->get()->random()->id,
        'subject'=>App\subject::all()->random()->id,
        'teacher'=>App\User::where('position','teacher')->get()->random()->email
       
    ];
});

$factory->define(App\material::class, function (Faker\Generator $faker) {
    $type=['pdf','video','audio'];
    $class=['js1','js2','js3'];
    return [
       
        'title' =>$faker->text(20),
        'course'=>App\subject::all()->random()->id,
        'type'=>$type[rand(0,2)],
        'location'=>'null for now',
        'is_public'=>1,
        'class'=>$class[rand(0,2)],
        'topics'=>json_encode(['science','engineering','tech'])
      
    ];
});

$factory->define(App\studentmaterial::class, function (Faker\Generator $faker) {
    $type=['pdf','video','audio'];

    return [
       
        'material_id' =>App\material::all()->random()->id,
        'student_id'=>App\User::where('position','student')->get()->random(),
        'teacher_id'=>App\User::where('position','teacher')->get()->random(),
        'subject_id'=>App\subject::all()->random()->id
       
    ];
});

$factory->define(App\test::class, function (Faker\Generator $faker) {
    $type=['pdf','video','audio'];

    return [
       
        'teachers_id' =>App\User::where('position','teacher')->get()->random()->id,
        'student_id'=>"none",
        'status'=>"sample",//0 is not done, 1 is live, 2 is done
        'subject'=>App\subject::all()->random()->id,
        'topic'=>$faker->text(10),
        'time'=>rand(1,30),
        'question_no'=>rand(10,200),
        'name'=>$faker->text(5)
       

       
    ];
});

$factory->define(App\questionbank::class, function (Faker\Generator $faker) {
    $type=['option','german'];

    return [
       
        'question' =>$faker->text(45),
        'type'=>$type[rand(0,1)],
        'a'=>$faker->text(10),
        'b'=>$faker->text(10),
        'c'=>$faker->text(10),
        'd'=>$faker->text(10),
        'ans'=>"a",
        'teachers_id'=>App\User::where('position','teacher')->get()->random()->id,
        'test_id'=>App\test::all()->random()->id,
        'topic'=>$faker->text(20),
        
       
    ];
});
$factory->define(App\payment::class, function (Faker\Generator $faker) {
    $type=['option','german'];

    return [
       
       'user_id'=>App\User::all()->random()->id,
       'curr_bal'=>rand(100,10000)
        
       
    ];
});
$factory->define(App\teacher_profile::class, function (Faker\Generator $faker) {

    return [
    'name'=>$faker->name(),
    'gender'=>array_rand(['male','female']),
    'email'=>App\User::where('position','teacher')->get()->random()->email,
    'about'=>$faker->paragraph(5),
    'image'=>'none for now'
        
       
    ];
});

$factory->define(App\teachers_subject::class, function (Faker\Generator $faker) {
        return [
    'teachers_id'=>App\User::where('position','teacher')->get()->random()->email,
    'subject_id'=>App\subject::all()->random()->id,
  
        
       
    ];
});


$factory->define(App\friend::class, function (Faker\Generator $faker) {
        return [
    'user_id'=>App\User::all()->random()->id,
    'friend_id'=>App\User::all()->random()->id,
  
        
       
    ];
});



