@extends('admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create User</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('users.index')}}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <form action="/admin/users/store" method="post" id="categoryForm" name="categoryForm">
				@csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Name"> 
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Email">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Password</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="password">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Phone no</label>
                                    <input type="number" name="number" id="number" class="form-control"
                                        placeholder="phone number">
                                </div>
                            </div>

                        </div>

                        <p>1 for the normal user</p>
                        <p>2 for the admin user</p>

                        <div class="mb-3">
                            <label for="name">Role</label>
                            <select name="role" id="role">
                                <option value="1">1</option>
                                <option value="1">2</option>
                            </select>
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
