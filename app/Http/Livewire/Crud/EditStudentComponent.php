<?php

namespace App\Http\Livewire\Crud;

use App\Models\Student;
use Livewire\Component;

class EditStudentComponent extends Component
{
    public $student_id, $name, $email, $phone, $student_edit_id;

    public function mount($id)
    {
        $student = Student::where('id', $id)->first();

        $this->student_id = $student->student_id;
        $this->name = $student->name;
        $this->email = $student->email;
        $this->phone = $student->phone;

        $this->student_edit_id = $student->id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'student_id' => 'required|unique:students,student_id,'.$this->student_edit_id.'',
            'name' => 'required',
            'email' => 'required|email|unique:students,email,'.$this->student_edit_id.'',
            'phone' => 'required|numeric|unique:students,phone,'.$this->student_edit_id.'',
        ]);
    }

    public function updateStudent()
    {
        $this->validate([
            'student_id' => 'required|unique:students,student_id,'.$this->student_edit_id.'',
            'name' => 'required',
            'email' => 'required|email|unique:students,email,'.$this->student_edit_id.'',
            'phone' => 'required|numeric|unique:students,phone,'.$this->student_edit_id.'',
        ]);

        $student = Student::where('id', $this->student_edit_id)->first();

        $student->student_id = $this->student_id;
        $student->name = $this->name;
        $student->email = $this->email;
        $student->phone = $this->phone;

        $student->save();

        session()->flash('message','Student has been updated successfully');
    }

    public function render()
    {
        return view('livewire.crud.edit-student-component')->layout('livewire.layouts.base');
    }
}
