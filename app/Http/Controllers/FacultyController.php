<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;

class FacultyController extends Controller
{
    public function create()
    {
      return view('pages.faculties.create');
    }

    public function index()
    {
      $faculties = Faculty::all();
      return view('pages.faculties.index', compact('faculties'));
    }

    public function store()
    {
      $data = request()->validate([
        'name' => 'string|required|max:200|min:1',
        'email' => 'string|required|email|max:255'
      ]);
      unset($data['_token']);
      Faculty::create($data);
      return redirect()->route('faculties.index');
    }

    
}
