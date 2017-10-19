<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CostController extends Controller
{
    public function __invoke()
    {
        return view('cost.welcome');
    }

    public function index()
    {
        return view('cost.index');
    }

    public function result($shipType)
    {
        return view('cost.result')->with(['shipType' => $shipType]);;
    }
}
