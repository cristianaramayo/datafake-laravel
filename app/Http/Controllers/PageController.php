<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Dataset;

class PageController extends Controller
{
    public function dashboard ()
    {
        return Inertia::render('Dashboard');
    }

    public function index(Request $request)
    {
        return Inertia::render('Index', [
            'datasets' => Dataset::latest()
                ->where('about', 'LIKE', "%$request->q%")
                ->get()
        ]);
    }

}

  