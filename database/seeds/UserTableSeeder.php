<?php

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $personalUser = new User();
        $personalUser->name = 'marc';
        $personalUser->email = 'marc@gmail.com';
        $personalUser->password = Hash::make ('unoduetrequattro5678');

        $personalUser->save();


        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->name = $faker->username();
            $user->email = $faker->email();
            $user->password = Hash::make ($faker->password());

            $user->save();
        }
    }
}
