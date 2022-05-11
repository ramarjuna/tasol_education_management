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

    public function store()
    {
      $data = request()->validate([
          'name' => 'string|required|max:199|min:1',
          'email' => 'required|email'
      ]);
      unset($data['_token']);
      Faculty::create($data);
      return redirect()->route('faculties.index');
    }

    public function index()
    {
      $faculties = Faculty::all();
      return view('pages.faculties.index', compact('faculties'));
    }
}
