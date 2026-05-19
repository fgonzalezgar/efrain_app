<?php

namespace App\Http\Controllers;

use App\Models\Responsible;
use App\Http\Requests\StoreResponsibleRequest;
use Illuminate\Http\Request;

class ResponsibleController extends Controller
{
    public function index()
    {
        $responsibles = Responsible::withCount('clients')->latest()->paginate(10);
        return view('responsibles.index', compact('responsibles'));
    }

    public function create()
    {
        return view('responsibles.create');
    }

    public function store(StoreResponsibleRequest $request)
    {
        Responsible::create($request->validated());
        return redirect()->route('responsibles.index')->with('success', 'Responsable creado correctamente.');
    }
}
