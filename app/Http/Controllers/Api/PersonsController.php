<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Cookie;
use Illuminate\Http\Request;

class PersonsController extends Controller
{
    public function index()
    {
    	$cookie = Cookie::get('persons');

    	if( ! $cookie){
    		$data = config('persons');
        	return response(['data' => $data])->cookie('persons', serialize($data));
    	}  

    	return unserialize($cookie);
    }

    public function store(Request $request)
    {
    	$data = unserialize(Cookie::get('persons'));
	    array_push($data, $request->only('name', 'email', 'dob'));
	    cookie()->forget('persons');
	    session()->flash('success', 'New Person Created Successfully');
	    return response('Person Created')->cookie('persons', serialize($data));
    }

    public function edit($id)
    {
    	$cookie = Cookie::get('persons');

    	$data = unserialize($cookie);

    	return response(['data' => $data[$id]]);
    }

    public function update(Request $request, $id)
    {
    	$data = unserialize(Cookie::get('persons'));
	    cookie()->forget('persons');

	    $data[$id]['name'] = $request->input('name');
	    $data[$id]['email'] = $request->input('email');
	    $data[$id]['dob'] = $request->input('dob');
	    session()->flash('success', 'Person updated Successfully');
	    return response('Person Updated')->cookie('persons', serialize($data));
    }

    public function destroy($id)
    {
    	$data = unserialize(Cookie::get('persons'));
	    cookie()->forget('persons');

	    unset($data[$id]);
	    session()->flash('success', 'Person Removed Successfully');
	    return response('Person Updated')->cookie('persons', serialize($data));
    }
}
