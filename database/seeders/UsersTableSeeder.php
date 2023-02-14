<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '管理者',
            'email' => 'aaa@example.com',
            'password' => Hash::make('aaaaaaaa'),
            'permission_id' => '3',
        ];

        User::create($param);

        $param = [
            'name' => '店舗代表者',
            'email' => 'bbb@example.com',
            'password' => Hash::make('bbbbbbbb'),
            'permission_id' => '2',
        ];

        User::create($param);
    }
}
