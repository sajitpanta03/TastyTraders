@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Product</h1>
                </div>
                <div class="col-sm-6 text-right">
                    {{-- <a href="{{ route('products.create') }}" class="btn btn-primary">Create New Product</a> --}}
                    <a href="{{ route('products.create') }}" class="btn btn-primary">Create New Product</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <div class="input-group input-group" style="width: 250px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Images</th>
                                <th>Discount</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>
                                        <div class="card-body">
                                            <div class="col-md-3">
                                                <h6 class="col-md-3">{{ $product['name'] }}</h6>
                                            </div>
                                    </td>
                                    <td>
                                        <div class="card-body">
                                            <div class="col-md-3">
                                                <h6 class="col-md-3">{{ $product['price'] }}</h6>
                                            </div>
                                    </td>

                                    @if (empty($product->discount))
                                        <td>
                                            <div class="card-body">
                                                <div class="col-md-3">
                                                    <h6 class="col-md-3">No discount</h6>
                                                </div>
                                            </div>
                                        </td>
                                    @else
                                        <td>
                                            <div class="card-body">
                                                <div class="col-md-3">
                                                    <h6 class="col-md-3">{{ $product->discount->percentage }}%</h6>
                                                </div>
                                            </div>
                                        </td>
                                    @endif

                                    <td>
                                        <div class="card-body">
                                            <div class="com-md-3">
                                                <div class="col-md-1">
                                                    <img src="{{ asset('storage/images/' . $product->image) }}"
                                                        alt="profile" title="" class="img-thumbnail">
                                                </div>
                                    </td>
                                    <td class="card-body">
                                        <a href={{ route('products.edit', ['id' => $product['id']]) }} style="color: #000000;">
                                            <i class="fa fa-edit">edit</i>
                                        </a>
										<a href="{{ route('products.destroy', ['id' => $product['id']]) }}" style="color: #000000;">
											<i class="text-danger w-4 h-4 mr-1 fa fa-trash"></i>Delete
										</a>
                                    </td>
                                </tr>
                            @empty
                                <tr></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <ul class="pagination pagination m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">«</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
    </div>
@endsection

@section('customJs')
@endsection
