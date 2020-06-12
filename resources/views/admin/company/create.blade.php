@extends('layouts.admin.layout')
@section('content')
<div class="main-panel" style="width: 100% !important;">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Create Company
            </h3>
            <a href="{{route('company.index')}}" class="btn btn-primary float-right"><i class="fa fa-arrow-left"></i>
                All
                Companies</a>
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

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="card p-5">
                    <form action="{{route('company.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" name="name" placeholder="Company Name" required>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="label">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" placeholder="Company Email">
                        </div>
                        <div class="form-group">
                            <label for="name" class="label">Website</label>
                            <input type="text" class="form-control @error('website') is-invalid @enderror"
                                name="website" value="{{ old('website') }}" placeholder="Company Webiste">
                            @error('website')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="logo" class="label">Logo</label>
                            <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo"
                                accept="image/*">
                            @error('logo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success float-right" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection