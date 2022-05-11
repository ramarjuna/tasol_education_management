<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Term;
use App\Models\Faculty;
use App\Models\Subject;
use Livewire\Component;
use App\Models\FacultyTimeTable;

class TimeTable extends Component
{
    public function render()
    {
        $this->terms = Term::all();
        $this->subjects = Subject::all();
        $this->faculties = Faculty::all();
        return view('livewire.time-table');
    }

    public $subjects, $faculty_id, $subject_id, $start_time, $stop_time, $duration, $date, $term_id;
    public $updateMode = false;
    public $inputs = [];
    public $i = 1;

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    // /**
    //  * Write code on Method
    //  *
    //  * @return response()
    //  */
    // public function remove($i)
    // {
    //     unset($this->inputs[$i]);
    // }

    // /**
    //  * Write code on Method
    //  *
    //  * @return response()
    //  */
    // private function resetInputFields(){
    //     $this->subject_id = '';
    //     $this->faculty_id = '';
    //     $this->date = '';
    //     $this->term_id = '';
    //     $this->duration = '';
    //     $this->start_time = '';
    //     $this->subject_id = '';
    //     $this->stop_time = '';
    // }

    // /**
    //  * Write code on Method
    //  *
    //  * @return response()
    //  */
    // public function store()
    // {
    //     $validatedDate = $this->validate([
    //             'subject_id.0' => 'required',
    //             'faculty_id.0' => 'required',
    //             'start_time.0' => 'required',
    //             'stop_time.0' => 'required_with:start_time.0|after_or_equal:start_time.0',
    //             'duration.0' => 'required',
    //             'duration.*' => 'required',
    //             'subject_id.*' => 'required',
    //             'faculty_id.*' => 'required',
    //             'start_time.*' => 'required',
    //             'stop_time.*' => 'required_with:start_time.*|after_or_equal:start_time.*',
    //             'term_id'=>'required',
    //             'date' =>'required',
    //         ],
    //         [
    //             'subject_id.0.required' => 'subject_id field is required',
    //             'faculty_id.0.required' => 'faculty_id field is required',
    //             'start_time.0.required' => 'start_time field is required',
    //             'stop_time.0.required' => 'stop_time field is required',
    //             'duration.0.required' => 'stop_time field is required',
    //             'duration.*.required' => 'subject_id field is required',
    //             'subject_id.*.required' => 'subject_id field is required',
    //             'faculty_id.*.required' => 'faculty_id field is required',
    //             'start_time.*.required' => 'start_time field is required',
    //             'stop_time.*.required' => 'stop_time field is required',
    //             'term_id.required' => 'term_id field is required',
    //             'date.required' => 'date field is required',
    //         ]
    //     );
    //     $this->subject_id = is_array($this->subject_id)? $this->subject_id : [$this->subject_id];

    //     foreach ($this->subject_id as $key => $value) {
    //         FacultyTimeTable::create([
    //             'subject_id' => $this->subject_id[$key],
    //             'faculty_id' => $this->faculty_id[$key],
    //             'session_start_time' => Carbon::parse($this->start_time[$key]),
    //             'session_stop_time' => Carbon::parse($this->stop_time[$key]),
    //             'duration' => $this->duration[$key],
    //             'date'=>$this->date,
    //             'term_id' =>$this->term_id
    //         ]);
    //     }

    //     $this->inputs = [];

    //     $this->resetInputFields();

    //     session()->flash('message', 'Time tables created successfully!');
    // }
}