<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\RoleResource;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = RoleResource::collection(Role::all());
        //dd($roles);
        return $roles;
    }

    public function store()
    {
        //TODO: Terminar o crud de grupo de usuários;
        return 'Hello World!';
    }

}
