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
                        <li><a href="#">Supplier</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class='panel panel-default'>
                <div class="panel-heading">
                    <h3>Update Supplier
                        <a href="{{route('all_supplier')}}" class="pull-right btn btn-info btn-sm">All Supplier</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <form action="{{url('/update_supplier/'.$data->id)}}" method="post">
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
                                    <input type="email" name="email" class="form-control" value="{{$data->email}}">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
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
                                    <lable><strong>Shoap</strong></lable>
                                    <input type="text" name="shoap" class="form-control" value="{{$data->shoap}}">
                                    @error('shoap')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-sm-6">
                                    <lable><strong>Account Holder</strong></lable>
                                    <input type="text" name="account_holder" class="form-control" value="{{$data->account_holder}}">
                                    @error('account_holder')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <lable><strong>Account Number</strong></lable>
                                    <input type="text" name="account_number" class="form-control" value="{{$data->account_number}}">
                                    @error('account_number')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-sm-6">
                                    <lable><strong>Bank Name</strong></lable>
                                    <input type="text" name="bank_name" class="form-control" value="{{$data->bank_name}}">
                                    @error('bank_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <lable><strong>Bank Branch</strong></lable>
                                    <input type="text" name="branch_name" class="form-control" value="{{$data->branch_name}}">
                                    @error('branch_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-sm-6">
                                    <lable><strong>Supplier Type</strong></lable>
                                    <select name="type" class="form-control">
                                        <option value="{{$data->type}}">{{$data->type}}</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <lable><strong>City</strong></lable>
                                    <input type="text" name="city" class="form-control" value="{{$data->city}}">
                                    @error('city')
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
