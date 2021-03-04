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
                        <li><a href="#">Attendance</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <div class='panel panel-default'>
                <div class="panel-heading">
                    <h3>Attendance
                        <a href="{{route('all_attendance')}}" class="pull-right btn btn-info btn-sm">All Attendance</a>
                    </h3> 
                </div>
                <h3 class="text-success" align='center'>Attendance {{ $date->att_date }}</h3> 
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table class="table table-bordered" id="datatable">
                                <thead class="bg-info">
                                    <tr>
                                        <th>Name</th>
                                        <th>Attendance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <form action="" method="post">
                                    @csrf
                                    @foreach($data as $d)
                                    <tr>
                                        <td>{{$d->name}}
                                            <input type="hidden" name="id[]" value="{{$d->id}}">
                                        </td>
                                        <td>
                                            <input type="radio" name="attendance[{{$d->id}}]" value="present" disabled=""<?php
                                            if ($d->attendance == 'present') {
                                                echo 'checked';
                                            }
                                            ?>>Present
                                            <input type="radio" name="attendance[{{$d->id}}]" value="absence" disabled=""<?php
                                            if ($d->attendance == 'absence') {
                                                echo 'checked';
                                            }
                                            ?>>Absence
                                        </td>
                                    <input type="hidden" name="att_date" value="{{date("d/m/y")}}">
                                    <input type="hidden" name="att_year" value="{{date("Y")}}">
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    </table>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
