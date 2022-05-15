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

                        <form wire:submit.prevent="updateProduct">
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

                                <br>

                                @foreach ($productImages as $pimage)
                                    <img src="{{ asset('uploads/all') }}/{{ $pimage->image }}" height="70px" width="70px" alt="">
                                    <a href="#" wire:click.prevent='deleteImage({{ $pimage->id }})'><i class="fa fa-times text-danger mr-2"></i></a>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label for="">Description</label>
                                <div wire:ignore>
                                    <textarea name="" class="form-control" id="description" wire:model="description"></textarea>
                                </div>
                                @error('description')
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

@push('scripts')
    <script>
        $(function(){
            $('#description').summernote({
                height: 300,
                width: '100%',
                toolbar: [
                    ['style', ['style', 'undo', 'redo']],
                    ['font', ['bold', 'underline', 'clear', 'fontsize', 'fontname']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['color', 'table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
                placeholder: 'Post Content',
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('description', contents);
                    }
                }
            });
        });
        
    </script>
@endpush