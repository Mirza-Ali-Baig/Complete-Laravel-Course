<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users=[
            [
                'name'=>"Ahmed",
                'email'=>'ahmed@ahmed.com',
                'email_verified_at'=>now(),
                'password'=>Hash::make("ahmed123")
            ],
            [
                'name'=>"Talha",
                'email'=>'talha@talha.com',
                'email_verified_at'=>now(),
                'password'=>Hash::make("talha123")
            ],
            [
                'name'=>"Khan",
                'email'=>'khan@khan.com',
                'email_verified_at'=>now(),
                'password'=>Hash::make("khan123")
            ]
        ];
        foreach ($users as $user){
            User::create([
                'name'=>$user['name'],
                'email'=>$user['email'],
                'email_verified_at'=>now(),
                'password'=>$user['password']
            ]);
        }


        // Using Insert Method
//        DB::table("users")->create([
//            [
//                'name'=>"Ahmed",
//                'email'=>'ahmed@ahmed.com',
//                'email_verified_at'=>now(),
//                'password'=>Hash::make("ahmed123")
//            ],
//            [
//                'name'=>"Talha",
//                'email'=>'talha@talha.com',
//                'email_verified_at'=>now(),
//                'password'=>Hash::make("talha123")
//            ],
//            [
//                'name'=>"Khan",
//                'email'=>'khan@khan.com',
//                'email_verified_at'=>now(),
//                'password'=>Hash::make("khan123")
//            ]
//        ]);
    }
}
