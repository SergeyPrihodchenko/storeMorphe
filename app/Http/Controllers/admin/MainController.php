<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestAdminPanel;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(RequestAdminPanel $request)
    {
        dd($request);
    }
}
