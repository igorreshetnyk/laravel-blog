<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            [
                'name'      => 'No name autor',
                'email'     => 'uncnow$email.g',
                'password'  => bcrypt(Str::random(10)),
            ],
            [
                'name'      => 'Autor 1',
                'email'     => 'autor$email.g',
                'password'  => bcrypt(111111),
            ],
        ];

        DB::table('users')->insert($data);
    }
}
