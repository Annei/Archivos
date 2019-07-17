<?php

namespace App\Http\Controllers;
use App\User;

use Spatie\Permission\Models\Role;


use Illuminate\Http\Request;

class AlumnosController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['permission:create user'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read users'], ['only' => 'index']);
        $this->middleware(['permission:update user'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:delete user'], ['only' => 'delete']);

    }
    public function index()
    {
        $users = User::all();
        return view('alumnos.prueba',compact('users'));
    }
}
