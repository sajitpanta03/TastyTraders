@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<section class="content-header">
	<div class="container-fluid my-2">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Create Discount</h1>
			</div>
			<div class="col-sm-6 text-right">
				<a href="{{ route('discounts.create')}}" class="btn btn-primary">Create/Edit</a>
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
											<th width="0">Discount Percentage</th>

										</tr>
									</thead>
									<tbody>
                                        @forelse ($discounts as $discount)
                                            <tr>
                                                <td>
                                                    <div class="card-body">
                                                        <div class="col-md-3">
                                                            @if ($discount->product)
                                                                <h6 class="col-md-3">{{ $discount->product->name }}</h6>
                                                            @else
                                                                <p>Product not available</p>
                                                            @endif
                                                        </div>
                                                </td>
												<td>
                                                    <div class="card-body">
                                                        <div class="col-md-3">
                                                            <h6 class="col-md-3">{{ $discount['percentage'] }}%</h6>
                                                        </div>
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

