<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class AuthControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLogin()
    {
        // Sets
        $data=[
            'username' => 'admin',
            'password' => '123456',
        ];

        //factory(User::class)->create($data);

        $this->post('auth/login', $data);

        // Asserts
        $this->seeStatusCode(200);
        $this->seeJson([
            'username' => 'admin',
        ]);
    }

    public function testLoginWithEmail()
    {
        // Sets
        $data=[
            'username' => 'admin@email.com',
            'password' => '123456',
        ];

        //factory(User::class)->create($data);

        $this->post('auth/login', $data);

        // Asserts
        $this->seeStatusCode(200);
        $this->seeJson([
            'username' => 'admin',
        ]);
    }
}
