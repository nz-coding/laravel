<div>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title" style="float: left;">All Students</h5>
                        <a href="#" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modelId" style="float: right; margin-left: 5px;">Send Mail to Everyone</a>
                        <a href="{{ route('addStudent') }}" class="btn btn-sm btn-primary" style="float: right;">Add New Student</a>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if (session()->has('message'))
                                    <div class="alert alert-success text-center">{{ session('message') }}</div>
                                @endif
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($students->count() > 0)
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $student->student_id }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->phone }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('editStudent',['id'=>$student->id]) }}" class="btn btn-sm btn-secondary" style="padding: 1px 8px;">Edit</a>

                                                <a href="javascript:void(0)" wire:click.prevent='deleteConfirmation({{ $student->id }})' class="btn btn-sm btn-danger" style="padding: 1px 8px;">Delete</a>

                                                <a href="javascript:void(0)" wire:click.prevent='sendMail("{{ $student->email }}")' class="btn btn-sm btn-dark" style="padding: 1px 8px;">
                                                    {!! loadingState('sendMail("'.$student->email.'")', 'Send Mail') !!}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" style="text-align: center;">No students found!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Send Mail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <form wire:submit.prevent='sendToAll'>
                    <div class="modal-body">
                        <label for="">Mail Body/Content</label>
                        <textarea class="form-control" wire:model='mail_content' cols="30" rows="10"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">
                            {!! loadingState('sendToAll', 'Send') !!}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('studentDeleted', event => {
            Swal.fire(
                'Deleted!',
                'Student has been deleted successfully.',
                'success'
            )
        });
    </script>
@endpush
