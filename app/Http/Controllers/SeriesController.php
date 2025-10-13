<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SeriesController extends Controller
{
    public function index() : View
    {
        $series = Serie::all();

        $msgSuccess = session('msgSuccess');

        return view('series.index')
            ->with('series', $series)
            ->with('msgSuccess', $msgSuccess);
    }

    public function create() : View
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $serie = Serie::create($request->all());

        $request->session()->flash('msgSuccess', "Serie '{$serie->name}' criada com sucesso!");

        return to_route('series.index')
            ->with('msgSuccess', "Serie '{$serie->name}' removida com sucesso!");
    }

    public function destroy(Serie $series,Request $request)
    {
        $series->delete();

        return to_route('series.index')
            ->with('msgSuccess', "Serie '{$series->name}' removida com sucesso!");
    }

    public function edit(Serie $series) : View
    {
        return view('series.edit')->with('series', $series);
    }

    public function update(Serie $series, Request $request)
    {
        $series->update($request->all());

        return to_route('series.index')
            ->with('msgSuccess', "Serie '{$series->name}' atualizada com sucesso!");
    }
}
