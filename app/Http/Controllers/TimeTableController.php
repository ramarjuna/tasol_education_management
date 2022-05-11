<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeTable;
use App\Models\Subject;
use App\Models\Faculty;

class TimeTableController extends Controller
{
    public function create()
    {
      $subjects = Subject::all();
      $faculties = Faculty::all();
      $time_tables = TimeTable::all();
      return view('pages.time_tables.create', compact('subjects', 'faculties','time_tables'));
    }

    public function index()
    {
      $time_tables = TimeTable::all();
      return view('pages.time_tables.index', compact('time_tables'));
    }

    public function store()
    {
      $data = request()->all();
      unset($data['_token']);
      TimeTable::create($data);
      $time_tables = TimeTable::all();
      $message = 'Time Table created successfully.';
      return redirect()->back()->with('message', $message);
    }

    public function delete()
    {
      $time_table_id = request()->id;
      TimeTable::where('id',$time_table_id)->delete();
      $message = 'Time Table deleted successfully.';
      return redirect()->back()->with('message', $message);
    }
}
