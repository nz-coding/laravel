<div>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title" style="float: left;">Add New Product</h5>
                        <a href="{{ route('allProducts') }}" class="btn btn-sm btn-primary" style="float: right;">All
                            Products</a>
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success text-center">{{ session('message') }}</div>
                        @endif

                        <form wire:submit.prevent="storeProduct">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" placeholder="Enter title"
                                    wire:model="title" />
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Images</label>
                                <input type="file" class="form-control" style="padding: 3px; font-size: 12px;" wire:model="images" multiple />
                                @error('images')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-sm btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
