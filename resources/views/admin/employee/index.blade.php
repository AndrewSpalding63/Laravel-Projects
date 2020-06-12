@extends('layouts.admin.layout')
@section('content')
<div class="main-panel" style="width: 100% !important;">
    <div class="content-wrapper">
        <div class="page-header">

            <h3 class="page-title">
                All Employees
            </h3>

            <a href="{{route('employee.create')}}" class="btn btn-primary float-right"> <i class="fa fa-plus"></i>
                Create
                New</a>


        </div>
        <div class="row grid-margin">
            <div class="col-md-12">
                @if (session()->has('message'))
                <div class="alert alert-{{session()->get('status') == 'success' ? 'success' : 'warning'}} alert-dismissible fade show"
                    role="alert">
                    <strong class="text-capitalize">{{session()->get('status')}}!!</strong>
                    {{session()->get('message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="card p-5">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th class="text-center">Id</th>
                                <th>Name</th>
                                <th>Company</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                            <tr>
                                <td class="text-center">{{$employee->id}}</td>
                                <td>{{$employee->first_name}} {{$employee->last_name}}</td>
                                <td>{{$employee->company->name}}</td>
                                <td>{{$employee->email}}</td>
                                <td>{{$employee->phone}}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{route('employee.show',$employee->id)}}"
                                            class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                        <a href="{{route('employee.edit',$employee->id)}}"
                                            class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                        <a onclick="event.preventDefault(); document.getElementById('del-employee-{{$employee->id}}').submit();"
                                            href="javascript:void(0)" class="btn btn-sm btn-danger"><i
                                                class="fa fa-trash"></i></a>
                                        <form id="del-employee-{{$employee->id}}"
                                            action="{{ route('employee.destroy',$employee->id) }}" method="post"
                                            style="display: none;">
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$employees->links()}}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection