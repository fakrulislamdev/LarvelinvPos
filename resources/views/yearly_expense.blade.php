@extends('layouts.app')
@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            @php
             $data=date('Y');
             $expense=DB::table('expenses')->where('year',$data)->sum('amount');
            @endphp
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome !</h4>
                    <ol class="breadcrumb pull-right">
                            <li><a href="#">Yearly Expense</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
            
            <div class="panel panel-info">
                <h3 class="panel-light" style="color: red">{{$data}} All Expanse
                <a href="{{route('all_expense')}}" class="pull-right btn btn-danger btn-sm">View All</a>
                <a href="{{route('add_expense')}}" class="pull-right btn btn-info btn-sm">Add New</a>
                </h3> 
            </div>
            <table class="table table-bordered" id="datatable">
                <thead class="bg-info">
                <tr>
                    <th>Expense Details</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
                </thead>
                @forelse($year as $d)
                <tr>
                    <td>{{$d->details}}</td>
                    <td>{{$d->amount}}</td>
                    <td>
                        <a href="{{url('/edit_expense/'.$d->id)}}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{url('/delete_expense/'.$d->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a> 
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3"><h2 style="color: red">No Data Found!</h2></td>
                </tr>
                @endforelse
            </table>
            <h3 class="bg-info" style="color: black;">Total : {{$expense}} Taka</h3>
        </div>
    </div>
</div>
@endsection