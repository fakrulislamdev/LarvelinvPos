@extends('layouts.app')
@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome !</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Employee</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class='panel panel-default'>
                <div class="panel-heading">
                    <h3>Update Employee
                        <a href="{{route('all_employee')}}" class="pull-right btn btn-info btn-sm">All Employee</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="col-sm-12">
                        <form action="{{url('/update/'.$data->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row mb-4">
                                <div class="col-sm-6">
                                    <lable><strong>Name</strong></lable>
                                    <input type="text" name="name" class="form-control" value="{{$data->name}}">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <lable><strong>Email</strong></lable>
                                    <input type="email" name="email" id="email" class="form-control" value="{{$data->email}}">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-sm-6">
                                    <lable><strong>City</strong></lable>
                                    <input type="text" id="city" name="city" class="form-control" value="{{$data->city}}">
                                    @error('city')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <lable><strong>Experiance</strong></lable>
                                    <input type="text" name="experiance" id="experiance" class="form-control" value="{{$data->experiance}}">
                                    @error('experiance')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-sm-6">
                                    <lable><strong>Salary</strong></lable>
                                    <input type="text" id="salary" name="salary" class="form-control" value="{{$data->salary}}">
                                    @error('salary')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <lable><strong>Vacation</strong></lable>
                                    <input type="text" name="vacation" id="vacation" class="form-control" value="{{$data->vacation}}">
                                    @error('vacation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-sm-12">
                                    <lable><strong>Address</strong></lable>
                                    <textarea name="address" class="form-control">{{$data->address}}</textarea>
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-sm-6">
                                    <lable><strong>Phone</strong></lable>
                                    <input type="text" name="phone" class="form-control" value="{{$data->phone}}">
                                    @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <lable><strong>Photo</strong></lable>
                                    <input type="file" name="photo" class="form-control" value="">
                                    <img src="../upload/{{$data->photo}}" height="80" width="80">
                                    @error('photo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-sm-12">
                                    <input type="submit" name="btn" class="btn btn-primary" value="Update">
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
