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
                        <li><a href="#">Setting</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class='panel panel-default'>
                <div class="panel-heading">
                    <h3>Update Setting</h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                    <form action="{{url('/update_website/'.$setting->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row mb-4">
                            <div class="col-sm-6">
                                <lable><strong>Company Name</strong></lable>
                                <input type="text" name="company_name" class="form-control" value="{{$setting->company_name}}">
                                @error('company_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <lable><strong>Company Email</strong></lable>
                                <input type="email" name="company_email" id="email" class="form-control" value="{{$setting->company_email}}">
                                @error('company_email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><br>
                        <div class="form-row mb-4">
                            <div class="col-sm-6">
                                <lable><strong>Company City</strong></lable>
                                <input type="text" name="company_city" class="form-control"value="{{$setting->company_city}}">
                                @error('company_city')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <lable><strong>Zip Code</strong></lable>
                                <input type="text" name="company_zip_code" id="experiance" class="form-control" value="{{$setting->company_zip_code}}">
                                @error('company_zip_code')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><br>
                        <div class="form-row mb-4">
                            <div class="col-sm-6">
                                <lable><strong>Country</strong></lable>
                                <input type="text" id="salary" name="company_country" class="form-control" value="{{$setting->company_country}}">
                                @error('company_country')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <lable><strong>Company Phone</strong></lable>
                                <input type="text" name="company_phone" class="form-control" value="{{$setting->company_phone}}">
                                @error('company_phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-6">
                                <lable><strong>Company Address</strong></lable>
                                <textarea name="company_address" class="form-control">{{$setting->company_address}}</textarea>
                            </div>
                            <div class="col-sm-6">
                                    <lable><strong>Company Logo</strong></lable>
                                    <input type="file" name="company_logo" class="form-control" value="{{old('company_logo')}}">
                                    <img src="upload/company/{{$setting->company_logo}}" height="80" width="80">
                                    @error('company_logo')
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


