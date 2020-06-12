@extends('layouts.admin.layout')
@section('content')
<div class="main-panel" style="width: 100% !important;">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Edit employee
            </h3>
            <a href="{{route('employee.index')}}" class="btn btn-primary float-right"><i class="fa fa-arrow-left"></i>
                All
                Employees</a>
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
                    <form action="{{route('employee.update', $employee->id)}}" method="POST"
                        enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="first_name" class="label">First name</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                value="{{ $employee->first_name }}" name="first_name" placeholder="employee first name"
                                required>

                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="last_name" class="label">Last name</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                value="{{ $employee->last_name }}" name="last_name" placeholder="employee last name"
                                required>

                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label for="company_id" class="label">Select Company</label>
                                <select name="company_id" class="form-control @error('email') is-invalid @enderror"
                                    id="company_id">
                                    @foreach ($companies as $company)
                                    <option value="{{$company->id}}"
                                        {{$employee->company->id == $company->id ? 'selected' : ''}}>{{$company->name}}
                                    </option>
                                    @endforeach
                                </select>

                                @error('company_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email" class="label">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ $employee->email }}" placeholder="employee Email">
                            </div>
                            <div class="form-group">
                                <label for="name" class="label">Phone</label>
                                <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" value="{{ $employee->phone }}" placeholder="employee phone">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>



                            <div class="form-group">
                                <button class="btn btn-success float-right" type="submit">Update</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection