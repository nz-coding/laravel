<?php

namespace App\Http\Livewire\Crud;

use App\Models\Student;
use Livewire\Component;

class AddStudentComponent extends Component
{
    public $student_id, $name, $email, $phone;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'student_id' => 'required|unique:students',
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'phone' => 'required|numeric|unique:students',
        ]);
    }

    public function storeStudent()
    {
        $this->validate([
            'student_id' => 'required|unique:students',
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'phone' => 'required|numeric|unique:students',
        ]);

        $student = new Student();

        $student->student_id = $this->student_id;
        $student->name = $this->name;
        $student->email = $this->email;
        $student->phone = $this->phone;

        $student->save();

        session()->flash('message','Student has been added successfully');

        $this->student_id = '';
        $this->name = '';
        $this->email = '';
        $this->phone = '';
    }

    public function render()
    {
        return view('livewire.crud.add-student-component')->layout('livewire.layouts.base');
    }
}
