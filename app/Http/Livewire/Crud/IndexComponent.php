<?php

namespace App\Http\Livewire\Crud;

use App\Models\Student;
use Livewire\Component;

class IndexComponent extends Component
{
    public $delete_id;

    protected $listeners = ['deleteConfirmed'=>'deleteStudent'];

    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteStudent()
    {
        $student = Student::where('id', $this->delete_id)->first();
        $student->delete();

        $this->dispatchBrowserEvent('studentDeleted');
    }

    public function render()
    {
        $students = Student::all();

        return view('livewire.crud.index-component', ['students'=>$students])->layout('livewire.layouts.base');
    }
}


