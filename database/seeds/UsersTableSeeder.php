<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'name' => 'Автор не известен',
                'email'=> 'autor@autor.com',
                'password' => bcrypt(str_random(16)),
            ],
            [
                'name' => 'Автор',
                'email'=> 'autor_two@autor.com',
                'password' => bcrypt(str_random('121212')),         
            ],
        ];

        DB::table('users') -> insert($data);

    }
}
