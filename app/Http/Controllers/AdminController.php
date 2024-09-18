<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function profilpage()
    {
        return view('profil_admin');
    }

}
