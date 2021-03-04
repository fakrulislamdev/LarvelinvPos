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
                        <li><a href="#">Update Expense</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="col-md-12">
                <form action="{{ url('/update_expense/'.$data->id) }}" method="post">
                    <div class="panel panel-info">
                        <h1 class="text-center bg-primary">Update Expense</h1>
                    </div>
                    @csrf
                    <div class="col-md-12">
                        <div class="form-row mb-4">
                            <div class="col-sm-12">
                                <lable><strong>Expense Details</strong></lable>
                                <textarea name="details" class="form-control">{{$data->details}}</textarea>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-6">
                                <lable><strong>Expense Amount</strong></lable>
                                <input type="text" name="amount" class="form-control" value="{{$data->amount}}">
                            </div>
                            <div class="col-sm-6">
                                <lable><strong>Month</strong></lable>
                                <input type="text" name="month" class="form-control" value="{{$data->month}}">
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-6">
                                <lable><strong>Date</strong></lable>
                                <input type="text" name="date" class="form-control" value="{{$data->date}}">
                            </div>
                            <div class="col-sm-6">
                                <lable><strong>Year</strong></lable>
                                <input type="text" name="year" class="form-control" value="{{$data->year}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" name="btn" class="btn btn-primary" value="Update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
