@extends('admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Update Discount</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('discounts.index')}}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">



        <!-- Default box -->
        <div class="container-fluid">

            <form action="{{ route('discounts.update', $discounts->id)}}" method="post" id="categoryForm" name="categoryForm">
				@csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                              Product Name: <h2>{{$discounts->product['name']}}</h2>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Percentage</label>
                                    <input type="number" name="percentage" id="percentage" class="form-control"
                                        placeholder="Expiry Date" value={{$discounts->percentage}}>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Expiry Data</label>
                                    <input type="date" name="expiry_date" id="expiry_date" class="form-control"
                                    placeholder="Expiry Date" value="{{ $discounts->expiry_date }}" min="<?php echo date('Y-m-d', strtotime('today')); ?>">
                             
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

    <!-- /.content -->
@endsection

@section('customJs')
@endsection
