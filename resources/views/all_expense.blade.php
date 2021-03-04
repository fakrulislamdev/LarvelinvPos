
@extends('layouts.app')
@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            @php
             $expense=DB::table('expenses')->sum('amount');
            @endphp
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome !</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Expense</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <h4 style="background: yellow; color: black; ">Total : {{$expense}} Tk</h4>
            <div class="panel panel-info">
                <h3 class="panel-light">All Expense
                    <a href="{{route('add_expense')}}" class="pull-right btn btn-info btn-sm">Add New</a>
                    <a href="{{route('all_expense')}}" class="pull-right btn btn-danger btn-sm">View All</a>
                    <a href="{{route('yearly_expense')}}" class="pull-right btn btn-info btn-sm">Yearly</a>
                    <a href="{{route('monthly_expense')}}" class="pull-right btn btn-danger btn-sm"> Monthly</a>
                    <a href="{{route('today_expense')}}" class="pull-right btn btn-info btn-sm">Today</a>

                </h3>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif

            <table class="table table-bordered" id="datatable">
                <thead class="bg-info">
                <tr>
                    <th style="color: white">Expense Details</th>
                    <th style="color: white">Expense Amount</th>
                    <th style="color: white">Month</th>
                    <th style="color: white">Date</th>
                    <th style="color: white">Action</th>
                </tr>
                </thead>
                @forelse($data as $d)
                <tr>
                    <td>{{$d->details}}</td>
                    <td>{{$d->amount}}</td>
                    <td>{{$d->month}}</td>
                    <td>{{$d->date}}</td>
                    <td>
                        <a href="{{url('/edit_expense/'.$d->id)}}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{url('/delete_expense/'.$d->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a> 
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5"><h2 style="color: red">No Data Found!</h2></td>
                </tr>
                @endforelse
            </table>
        </div>
    </div>
</div>
@endsection