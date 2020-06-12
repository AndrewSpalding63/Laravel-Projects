@extends('layouts.admin.layout')
@section('content')
<div class="main-panel" style="widtd: 100% !important;">
    <div class="content-wrapper">
        <div class="page-header">

            <h3 class="page-title">
                All Company
            </h3>

            <a href="{{route('company.create')}}" class="btn btn-primary float-right"> <i class="fa fa-plus"></i> Create
                New</a>


        </div>
        <div class="row grid-margin">
            <div class="col-md-12">

                <div class="card p-5">
                    <table class="table table-stripped">
                        <tr>
                            <td>Logo</td>
                            <td><img style="height: 100px;widtd:100px" src="{{Storage::url($company->logo)}}" alt="">
                            </td>
                        </tr>

                        <tr>
                            <td>Name</td>
                            <td>{{$company->name}}</td>
                        </tr>

                        <tr>
                            <td>Email</td>
                            <td>{{$company->email}}</td>
                        </tr>

                        <tr>
                            <td>Website</td>
                            <td>{{$company->website}}</td>
                        </tr>

                    </table>
                    
                </div>
            </div>
        </div>
    </div>

</div>
@endsection