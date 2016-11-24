<?php

use App\User;

abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    public function getHeaders(User $user = null, $password = 'password123')
    {
        if(is_null($user)){
            $user = factory(User::class)->create([
                'password' => bcrypt($password),
            ]);
        }
        $data = [
            'username' => $user->username,
            'password' => $password,
        ];
        $this->post('auth/login', $data);
        $data = $this->response->getContent();

        $token = json_decode($data)->token;

        return[
            'Authorization'=> 'Bearer '.$token,
        ];
    }
}
