<?php

namespace App\Http\Livewire\Crud;

use App\Models\Student;
use Illuminate\Support\Facades\Mail;
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

    public function sendMail($email)
    {
        $mailData['email'] = $email;
        $mailData['subject'] = 'Mail Check';

        Mail::send('emails.email-temp', $mailData, function($message) use($mailData) {
            $message->to($mailData['email'])
                ->subject($mailData['subject']);
        });

        $this->dispatchBrowserEvent('success', ['message'=>'Mail sent successfully']);
    }

    public $mail_content;
    public function sendToAll()
    {
        $students = Student::all();
        $content = $this->mail_content;
        foreach($students as $student){
            dispatch(function() use($student, $content){
                $mailData['email'] = $student->email;
                $mailData['subject'] = 'Test Mail';
                $mailData['content'] = $content;

                Mail::send('emails.send-to-all', $mailData, function($message) use($mailData) {
                    $message->to($mailData['email'])
                        ->subject($mailData['subject']);
                });
            });
        }

        $this->dispatchBrowserEvent('success', ['message'=>'Mail sent successfully']);
    }

    public function render()
    {
        $students = Student::all();

        return view('livewire.crud.index-component', ['students'=>$students])->layout('livewire.layouts.base');
    }
}


