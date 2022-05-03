<div>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title" style="float: left;">All Products</h5>
                        <a href="{{ route('addProducts') }}" class="btn btn-sm btn-primary" style="float: right;">Add
                            New Product</a>
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
                                    <th style="text-align: center;">Product ID</th>
                                    <th>Title</th>
                                    <th style="text-align: center;">Images</th>
                                    <th style="text-align: center;">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($products->count() > 0)
                                    @foreach ($products as $product)
                                        <tr>
                                            <td style="text-align: center;">{{ $product->id }}</td>
                                            <td>{{ $product->title }}</td>
                                            <td style="text-align: center;">
                                                @php
                                                    $images = App\Models\ProductImages::where('product_id', $product->id)->get();
                                                @endphp

                                                @foreach ($images as $item)
                                                    <img src="{{ asset('uploads/all') }}/{{ $item->image }}" style="height: 50px; width: 50px;" alt="">
                                                @endforeach
                                            </td>
                                            <td style="text-align: center;">
                                                <a href="{{ route('editProducts', ['id'=>$product->id]) }}" class="btn btn-sm btn-secondary" style="padding: 1px 8px;">Edit</a>

                                                <a href="javascript:void(0)" class="btn btn-sm btn-danger" style="padding: 1px 8px;">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" style="text-align: center;">No products found!</td>
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
