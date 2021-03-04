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
                        <li><a href="#">Category</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class='panel panel-default'>
                <div class="panel-heading">
                    <h3>Update Category
                        <a href="{{route('all_category')}}" class="pull-right btn btn-info btn-sm">View All</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="col-sm-12">
                        <form action="{{ url('/update_category/'.$data->id) }}" method="post">
                            @csrf
                            <div class="col-sm-12">
                                <div class="col-sm-12">
                                    <lable><strong>Category Name</strong></lable>
                                    <input type="text" name="cat_name" class="form-control" value="{{$data->cat_name}}">
                                    @error('cat_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-12">
                                    <input type="submit" name="btn" class="btn btn-primary" value="Submit">
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
