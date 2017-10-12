<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CostController extends Controller
{
    public function __invoke()
    {
        return "Show welcome page ...";
    }

    public function index()
    {
        return "Show the input form ...";
    }

    public function result($shipType)
    {
        return 'You are viewing cost for shipping type: '.$shipType;
    }
}
