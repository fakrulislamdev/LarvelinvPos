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
                        <li><a href="#">Add Expense</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class='panel panel-default'>
                <div class="panel-heading">
                    <h3>Add Expense
                        <a href="{{route('all_expense')}}" class="pull-right btn btn-info btn-sm">View All</a>
                        <a href="{{route('monthly_expense')}}" class="pull-right btn btn-danger btn-sm">This Month</a>
                        <a href="{{route('today_expense')}}" class="pull-right btn btn-info btn-sm">Today</a>
                    </h3>
                </div>
                <div class="panel-body">
                <div class="col-md-12">
                <form action="{{ url('/store_expense') }}" method="post">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-row mb-4">
                            <div class="col-sm-6">
                                <lable><strong>Expense Details</strong></lable>
                                <textarea name="details" class="form-control" value="{{old('details')}}">
                                </textarea>
                                @error('details')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <lable><strong>Expense Amount</strong></lable>
                                <input type="text" name="amount" class="form-control" value="{{old('amount')}}">
                                @error('amount')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-6">
                                <input type="hidden" name="month" class="form-control" value="{{date('F')}}">
                            </div>
                            <div class="col-sm-6">
                                <input type="hidden" name="date" class="form-control" value="{{date('d/m/y')}}">
                            </div>
                            <div class="col-sm-6">
                                <input type="hidden" name="year" class="form-control" value="{{date('Y')}}">
                            </div>
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
