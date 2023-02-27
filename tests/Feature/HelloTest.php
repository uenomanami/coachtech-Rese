<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class HelloTest extends TestCase
{
    /**
     * ユーザーの新規作成をテスト
     * @return void
     */
    public function testCreate()
    {
        // $this->withoutMiddleware();

        $user = [
            'name' => '田中 太郎',
            'email' => 'zzz@example.com',
            'password' => 'password1',
            'permission_id' => '1'
        ];

        $this->user = User::create($user);

        $this->assertDatabaseHas('users', [
            'name' => '田中 太郎',
            'email' => 'zzz@example.com',
            'password' => 'password1',
            'permission_id' => '1'
        ]);
    }

    /**
     *ログイン後認証されているかのテスト

     * @return void
     */

    public function testLogin()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);

        // ログインする
        $response = $this->post(route('login'), ['email' => 'test@example.com', 'password' => 'password1']);
        // リダイレクトでページ遷移してくるのでstatusは302
        $response->assertStatus(302);
        $response->assertRedirect('/');
        $this->assertAuthenticated();
    }
}
