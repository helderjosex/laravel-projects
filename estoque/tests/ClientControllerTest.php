<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClientControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreate()
    {
        // Sets
        $headers = $this->getHeaders();

        $name = 'Hélder José';

        $data = [
            'name' => $name,
            'birthdate' => '1990-01-11',
        ];

        $this->post('client', $data, $headers);
        // Asserts
        $this->seeStatusCode(200);
        $this->seeJson([
            'name' => $name,
        ]);
        $this->seeInDatabase('clients',[
           'name' => $name,
        ]);

    }
}
