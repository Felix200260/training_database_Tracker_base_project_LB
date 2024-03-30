<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create()
    {
        return view('create_item'); // Представление create_item.blade.php
    }
}
