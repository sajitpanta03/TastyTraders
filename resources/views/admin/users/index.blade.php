@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<section class="content-header">
	<div class="container-fluid my-2">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Create Users</h1>
			</div>
			<div class="col-sm-6 text-right">
				<a href="{{ route('users.create')}}" class="btn btn-primary">Create New user</a>
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
											<th width="0">Email</th>
											<th width="0">Role</th>
											<th width="0">Action</th>

										</tr>
									</thead>
									<tbody>
                                        @forelse ($users as $user)
                                            <tr>
                                                <td>
                                                    <div class="card-body">
                                                        <div class="col-md-3">
                                                            <h6 class="col-md-3">{{ $user['name'] }}</h6>
                                                        </div>
                                                </td>
												<td>
                                                    <div class="card-body">
                                                        <div class="col-md-3">
                                                            <h6 class="col-md-3">{{ $user['email'] }}</h6>
                                                        </div>
                                                </td>
												<td>
                                                    <div class="card-body">
                                                        <div class="col-md-3">
                                                            <h6 class="col-md-3">{{ $user['role'] }}</h6>
                                                        </div>
                                                </td>
                                                <td class="card-body">
                                                    <a href={{'users/edit/' . $user['id']}}
                                                        style="color: #000000;">
                                                        <i class="fa fa-edit">edit</i>
                                                    </a>
                                                    <a href={{ 'users/destroy/' . $user['id'] }} style="color: #000000;">
                                                        <i class="text-danger w-4 h-4 mr-1 fa fa-trash">delete</i>
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

