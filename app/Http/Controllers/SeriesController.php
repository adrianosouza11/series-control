<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SeriesController extends Controller
{
    public function index() : View
    {
        $series = Serie::all();

        return view('series.index')->with('series', $series);
    }

    public function create() : View
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        Serie::create($request->all());

        return redirect('/series');
    }
}
