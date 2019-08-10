<?php

use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->delete();

        $user = new User;
        $user->user_id = 1;
        $user->first_name = 'Sebas';
        $user->last_name = 'Reyes';
        $user->username = 'admin';
        $user->email = 'sebasreyes@gmail.com';
        $user->password = Hash::make('secret');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user = new User;
        $user->user_id = 2;
        $user->first_name = 'Rea';
        $user->last_name = 'Santiago';
        $user->username = 'reasan';
        $user->email = 'reasan@gmail.com';
        $user->password = Hash::make('secret');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();
    }
}
