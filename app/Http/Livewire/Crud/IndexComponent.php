<?php

namespace App\Http\Livewire\Crud;

use App\Models\Student;
use Livewire\Component;

class IndexComponent extends Component
{

    public function delete($id)
    {
        $student = Student::where('id', $id)->first();
        $student->delete();

        session()->flash('message', 'Student has been deleted successfully');
    }

    public function render()
    {
        $students = Student::all();

        return view('livewire.crud.index-component', ['students'=>$students])->layout('livewire.layouts.base');
    }
}


