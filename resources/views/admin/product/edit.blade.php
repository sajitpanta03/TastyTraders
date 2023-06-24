@extends('admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Product</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <form action="{{ route('products.update', $product->id) }}" method="post" id="productForm" name="productForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="_method" value="PUT">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $product->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="price">Price</label>
                                    <input type="number" name="price" id="price" class="form-control" placeholder="Price" value="{{ $product->price }}">
                                </div>
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" placeholder="Description">{{ $product->description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pb-5 pt-">
                    <button class="btn btn-primary" type="submit">Update</button>
                    <a href="#" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection

@section('customJs')
@endsection
