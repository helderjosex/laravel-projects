<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Client;

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

    public function testCreateWithCpfAndBirthdate()
    {
        // Sets
        $client = factory(Client::class)->create([
            //'cpf' => '21445701324',
        ]);
        $headers = $this->getHeaders();

        $name = 'Hélder';
        $cpf = '85684656412';
        $data = [
            'name' => $name,
            'cpf' => $cpf,
            'birthdate' => '1990-10-01',
        ];

        $this->post('client', $data, $headers);
        //dd($this->response->getContent());
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


    public function testUpdate()
    {
        // Sets
        $client = factory(Client::class)->create([
            'cpf' => '30138582491',
        ]);
        $headers = $this->getHeaders();

        $name = 'Hélder';
        $cpf = '30138582491';
        $data = [
            'name' => $name,
            'cpf' => $cpf,
            'birthdate' => $client->birthdate,
        ];

        $this->put('client/'.$client->id, $data, $headers);
        //dd($this->response->getContent());
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
