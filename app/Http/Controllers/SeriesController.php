<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class SeriesController extends Controller
{
    public function index() : View
    {
        $series = [
            'Outlander',
            'The Office',
            'Outsider',
            'Mr. Mercedez',
            "Grey's Anatomy"
        ];

        return view('series.index')->with('series', $series);
    }

    public function create() : View
    {
        return view('series.create');
    }
}
