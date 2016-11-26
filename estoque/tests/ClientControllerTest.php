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

    public function testCreateWithCpf()
    {
        // Sets
        $headers = $this->getHeaders();

        $name = 'Hélder José';
        $cpf = '57216327551';
        $data = [
            'name' => $name,
            'cpf' => $cpf,
        ];

        $this->post('client', $data, $headers);
        // Asserts
        $this->seeStatusCode(200);
        $this->seeJson([
            'name' => $name,
            'cpf' => $cpf,
        ]);
        $this->seeInDatabase('clients',[
            'name' => $name,
            'cpf' => $cpf,
        ]);
    }

    public function testCreateWithCpfAndBirthdate()
    {
        // Sets
        $headers = $this->getHeaders();

        $name = 'Hélder José';
        $cpf = '57216327551';
        $data = [
            'name' => $name,
            'cpf' => $cpf,
            'birthdate' => '1990-10-10',
        ];

        $this->post('client', $data, $headers);
        // Asserts
        $this->seeStatusCode(200);
        $this->seeJson([
            'name' => $name,
            'cpf' => $cpf,
        ]);
        $this->seeInDatabase('clients',[
            'name' => $name,
            'cpf' => $cpf,
        ]);
    }
}
