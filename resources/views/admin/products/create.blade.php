@extends('admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Products</h1>
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
            <form action="{{url('/admin/products/store')}}" method="post" id="categoryForm" name="categoryForm" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">

                                    <label for="name">Category</label>
                                    <select name="category" id="category">
                                        <option value="category">category</option>
                                    </select><br>
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Name"><br>
                                    <label for="name">Price</label>
                                    <input type="number" name="number" id="number" class="form-control"
                                        placeholder="Price"><br>
                                        <label for="name">Description</label>
                                    <input type="text" name="description" id="description" class="form-control"
                                        placeholder="Description"><br>
                                    <label for="image">Image Upload: </label>
                                    <input type="file" name="image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pb-5 pt-">
                    <button class="btn btn-primary" type="submit">Create</button>
                    <a href="" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
        </div>
        </form>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection

@section('customJs')
@endsection
