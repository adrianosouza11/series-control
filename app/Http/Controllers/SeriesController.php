<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
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

    public function store(SeriesFormRequest $request)
    {
        $serie = Serie::create($request->all());

        $seasons = [];
        for ($i = 1; $i <= $request->seasonQty; $i++) {
            $seasons[] = [
                'series_id' => $serie->id,
                'number' => $i
            ];

            Season::insert($seasons);
        }

        $episodes = [];

        foreach($serie->seasons as $season) {
            for ($j = 1; $j <= $request->episodesPerSeason; $j++) {
                $episodes[] = [
                    'season_id' => $season->id,
                    'number' => $j
                ];
            }
        }

        Episode::insert($episodes);

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

    public function update(Serie $series, SeriesFormRequest $request)
    {
        $series->update($request->all());

        return to_route('series.index')
            ->with('msgSuccess', "Serie '{$series->name}' atualizada com sucesso!");
    }
}
