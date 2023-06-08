@extends('admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Update Category</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('categories.index')}}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
       
            
        <!-- Default box -->
        <div class="container-fluid">
            <form action="{{ route('categories.update', $categories->id) }}" method="post" id="categoryForm" name="categoryForm">
				@csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    @foreach ($categories as $category)
                                    <label for="name" values="{{ $category['name'] }}">Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Name" value="">
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
	</form>        <!-- /.card -->
    </section>
    @endforeach
    <!-- /.content -->
@endsection

@section('customJs')
@endsection
