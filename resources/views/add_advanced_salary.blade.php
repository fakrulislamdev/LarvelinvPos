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
                        <li><a href="#">Advanced Salary</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class='panel panel-default'>
                <div class="panel-heading">
                    <h3>Add Advanced Salary
                        <a href="{{route('all_advanced_salary')}}" class="pull-right btn btn-info btn-sm">View All</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <form action="{{ url('/store_advanced_salary') }}" method="post">
                            @csrf
                            <div class="col-md-12">
                                <div class="col-sm-12">
                                    <lable><strong>Employee</strong></lable>
                                    @php
                                    $emp=DB::table('employees')->get();
                                    @endphp
                                    <select name="emp_id" class="form-control">
                                        <option selected="">--select--</option>
                                        @foreach($emp as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <lable><strong>Date</strong></lable>
                                    <input type="date" name="date" class="form-control">
                                    @error('date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-12">
                                    <lable><strong>Advanced Salary</strong></lable>
                                    <input type="text" name="advanced_salary" class="form-control" placeholder="advanced_salary">
                                    @error('advanced_salary')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
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
