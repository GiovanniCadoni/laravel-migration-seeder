<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Train;

class TrainController extends Controller
{
    public function index() {
        $trains = Train::where('orario_partenza', '>=', now())->orderBy('orario_partenza') -> get();
        return view('trains.index', compact('trains'));
    }
}
