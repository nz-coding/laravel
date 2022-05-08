<div>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title" style="float: left;">Add New Students</h5>
                        <a href="{{ route('students') }}" class="btn btn-sm btn-primary" style="float: right;">All Students</a>
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success text-center">{{ session('message') }}</div>
                        @endif

                        <form wire:submit.prevent="storeStudent">
                            <div class="form-group">
                                <label for="student_id">Student ID</label>
                                <input type="number" min="1000" max="9999" class="form-control" wire:model="student_id" autocomplete="off" />
                                {{-- for validation --}}
                                @error('student_id')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" maxlength="10" class="form-control" wire:model="name" autocomplete="off" />
                                {{-- for validation --}}
                                @error('name')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" wire:model="email" autocomplete="off" />
                                {{-- for validation --}}
                                @error('email')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="number" min="01000000000" max="01999999999" class="form-control" wire:model="phone" autocomplete="off" />
                                {{-- for validation --}}
                                @error('phone')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-sm w-50">Add Student</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
