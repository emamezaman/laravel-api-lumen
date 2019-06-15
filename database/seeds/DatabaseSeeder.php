

<?php

use Illuminate\Database\Seeder;
 use App\Course;
 use App\User;
 use App\Episode;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(CourseTableseeder::class);
        $user = factory(User::class)->create();
        factory(Course::class,5)->create(['user_id'=>$user->id])->each(function($course){
        factory(Episode::class,rand(5,20))->make()->each(function($episode,$key)use ($course){
            $episode->number = $key+1;
            $course->episodes()->save($episode);
        });
        });

    }
}

