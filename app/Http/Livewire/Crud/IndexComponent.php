<?php

namespace App\Http\Livewire\Crud;

use App\Models\Student;
use Livewire\Component;

class IndexComponent extends Component
{

    public $delete_id;

    protected $listeners = ['deleteConfirmed'=>'deleteData'];

    public function deleteConfirmation($id)
    {
        $student = Student::where('id', $id)->first();
        $this->delete_id = $student->id;

        $this->dispatchBrowserEvent('show_delete_confirmation');
    }

    public function deleteData()
    {
        $student = Student::where('id', $this->delete_id)->first();
        $student->delete();

        $this->dispatchBrowserEvent('studentDeleted');
        $this->delete_id = '';
    }

    public function render()
    {
        $students = Student::all();

        return view('livewire.crud.index-component', ['students'=>$students])->layout('livewire.layouts.base');
    }
}


