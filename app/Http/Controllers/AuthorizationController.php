<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AuthorizationController extends Controller
{
    public function index(){
        Gate::allow('isAdmin') ? Response::allow() : about(403);
        return 'Authorization';
    }
}
