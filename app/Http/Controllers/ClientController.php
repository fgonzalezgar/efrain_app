<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Department;
use App\Models\Responsible;
use App\Http\Requests\StoreClientRequest;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->paginate(10);
        return view('clientes.index', compact('clients'));
    }

    public function upload()
    {
        return view('clientes.upload');
    }

    public function create()
    {
        $departments = Department::orderBy('name')->get();
        $responsibles = Responsible::where('status', 'active')->orderBy('name')->get();
        return view('clientes.create', compact('departments', 'responsibles'));
    }

    public function store(StoreClientRequest $request)
    {
        Client::create($request->validated());
        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente.');
    }

    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('clientes.show', compact('client'));
    }
}
