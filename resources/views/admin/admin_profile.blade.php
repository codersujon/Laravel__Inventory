@php
    $pageTitle = "Admin Profile"
@endphp


@extends('admin.admin_master')
@section('main-content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Admin Profile</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Inventory</a></li>
                            <li class="breadcrumb-item active">Admin Profile</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div><!-- end page title -->

        <div class="row">
            <div class="col-lg-6">
                <div class="card">

                    <img class="img-thumbnail rounded-circle avatar-xl m-auto my-4" src="{{ asset('backend') }}/assets/images/small/img-5.jpg" alt="Card image cap">

                    <div class="card-body">
                       <table class="table">
                            <tr>
                                <td><h5>Fullname</h5></td>
                                <td>:</td>
                                <td>{{ $adminInfo->name }}</td>
                            </tr>
                            <tr>
                                <td><h5>Username:</h5></td>
                                <td>:</td>
                                <td>{{ $adminInfo->username }}</td>
                            </tr>
                            <tr>
                                <td><h5>Email:</h5></td>
                                <td>:</td>
                                <td>{{ $adminInfo->email }}</td>
                            </tr>
                       </table>
                       <a href="{{ route('edit.profile') }}" class="btn btn-primary waves-effect waves-light">
                            <i class="ri-edit-fill align-middle ms-2"></i>
                            Edit Profile
                       </a>
                    </div>
                </div>
            </div>
        </div>

      
    </div>
</div>
<!-- End Page-content -->

@endsection

