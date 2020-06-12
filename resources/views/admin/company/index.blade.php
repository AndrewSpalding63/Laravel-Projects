@extends('layouts.admin.layout')
@section('content')
<div class="main-panel" style="width: 100% !important;">
    <div class="content-wrapper">
        <div class="page-header">

            <h3 class="page-title">
                All Companies
            </h3>

            <a href="{{route('company.create')}}" class="btn btn-primary float-right"> <i class="fa fa-plus"></i> Create
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
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                            <tr>
                                <td class="text-center">{{$company->id}}</td>
                                <td><img style="height: 100px;width:100px" src="{{Storage::url($company->logo)}}"
                                        alt=""></td>
                                <td>{{$company->name}}</td>
                                <td>{{$company->email}}</td>
                                <td>{{$company->website}}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{route('company.show',$company->id)}}"
                                            class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                        <a href="{{route('company.edit',$company->id)}}" class="btn btn-sm btn-info"><i
                                                class="fa fa-edit"></i></a>
                                        <a onclick="event.preventDefault(); document.getElementById('del-company-{{$company->id}}').submit();"
                                            href="javascript:void(0)" class="btn btn-sm btn-danger"><i
                                                class="fa fa-trash"></i></a>
                                        <form id="del-company-{{$company->id}}"
                                            action="{{ route('company.destroy',$company->id) }}" method="post"
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
                    {{$companies->links()}}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection