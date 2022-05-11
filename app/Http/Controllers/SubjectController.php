<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Term;
use App\Models\Subject;

class SubjectController extends Controller
{
  public function create(){
    $terms = Term::all();
    return view('pages.subjects.create', compact('terms'));
  }

  public function index(){
    $subjects = Subject::all();
    return view('pages.subjects.index', compact('subjects'));
  }

  public function store(){
    $data = request()->validate([
      'name' => 'string|required|max:200|min:1',
      'term_id' => 'integer|required'
    ]);
    unset($data['_token']);
    $subject = Subject::create($data);
    return redirect()->route('subjects.index');
  }
}
