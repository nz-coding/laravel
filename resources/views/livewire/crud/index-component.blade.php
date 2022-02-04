<div>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title" style="float: left;">All Students</h5>
                        <a href="{{ route('addStudent') }}" class="btn btn-sm btn-primary" style="float: right;">Add New Student</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
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
                                            <td></td>
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
</div>
