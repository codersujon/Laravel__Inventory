@php
    $pageTitle = "Change Password"
@endphp

@extends('admin.admin_master')
@section('main-content')


<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Change Password</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Inventory</a></li>
                            <li class="breadcrumb-item active">Change Password</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div><!-- end page title -->

        {{-- main content start --}}
        <div class="row">
            <div class="col-sm-12 col-md-10 ">
                <div class="card">
                    <div class="card-body">

                        {{-- For Validation Message --}}
                        @if (count($errors))
                            @foreach ($errors->all() as $error)
                               <p class="alert alert-danger alert-dismissible fade show">{{ $error }}</p>
                            @endforeach
                        @endif

                        <form action="{{ route('update.password') }}" method="POST">
                            @csrf

                            {{-- Old Password --}}
                            <div class="row mb-3">
                                <label for="oldPassword" class="col-sm-2 col-form-label">Old Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password"  name="oldPassword"
                                        id="oldPassword" placeholder="Enter Old Password">
                                </div>
                            </div>

                            {{-- New Password --}}
                            <div class="row mb-3">
                                <label for="newPassword" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password"  name="newPassword"
                                        id="newPassword" placeholder="Enter New Password">
                                </div>
                            </div>

                            {{-- Confirm Password --}}
                            <div class="row mb-3">
                                <label for="confirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password"  name="confirmPassword"
                                        id="confirmPassword" placeholder="Enter Confirm Password">
                                </div>
                            </div>
                         
                            {{-- Profile Update Button --}}
                            <div class="row mb-3">
                                <label for="profile_image" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        <i class="ri-check-line align-middle me-2"></i> Change Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        {{-- main content end --}}
    </div>
</div>

@endsection
