<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class UserController extends Controller{

    protected $user = null;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->allUsers();
        return response($users,200);
    }

    public function show($id)
    {
        $user = $this->user->getUser($id);
        if(!$user)
        {
            $output = ['response' => 'Usuário não encontrado!'];
            return response($output,400);
        }
        return response($user,200);
    }

    public function save()
    {
        $user = $this->user->saveUser();
        return response($user,200);
    }

    public function update($id)
    {
        $user = $this->user->updateUser($id);
        if(!$user)
        {
            $output = ['response' => 'Usuário não encontrado!'];
            return response($output,400);
        }
        return response($user,200);
    }

    public function delete($id)
    {
        $user = $this->user->deleteUser($id);
        if(!$user)
        {
            $output = ['response' => 'Usuário não encontrado!'];
            return response($output,400);
        }
        $output = ['response' => 'Usuário removido com sucesso!'];
        return response($output,200);
    }

}
