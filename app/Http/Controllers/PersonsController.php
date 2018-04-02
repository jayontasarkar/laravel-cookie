<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonsController extends Controller
{
    public function index()
    {
    	return view('persons.index');
    }

    public function create()
    {
    	return view('persons.create');
    }

    public function edit($id)
    {
    	return view('persons.edit', compact('id'));
    }
}
