<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;
use Illuminate\Support\Facades\Http;

class PokemonController extends Controller
{
    public function  index(){
        return view('home');
    }
}
