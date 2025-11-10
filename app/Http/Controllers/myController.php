<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class myController extends Controller
{
    public function dashboard($id)
    {
        return "Employee has been created successfully with ID = " . $id;
    }
}
