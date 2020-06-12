@extends('layouts.admin.layout')
@section('content')
<div class="main-panel" style="width: 100% !important;">
    <div class="content-wrapper">
        <div class="page-header">

            <h3 class="page-title">
                Employee
            </h3>

            <a href="{{route('employee.create')}}" class="btn btn-primary float-right"> <i class="fa fa-plus"></i>
                Create
                New</a>


        </div>
        <div class="row grid-margin">
            <div class="col-md-12">
                <div class="card p-5">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>{{$employee->first_name}}</th>
                            </tr>

                            <tr>
                                <th>Last Name</th>
                                <th>{{$employee->last_name}}</th>
                            </tr>

                            <tr>
                                <th>Email</th>
                                <th>{{$employee->email}}</th>
                            </tr>

                            <tr>
                                <th>Phone</th>
                                <th>{{$employee->phone}}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection