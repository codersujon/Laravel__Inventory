@php
$pageTitle = "Admin Profile Edit"
@endphp

@extends('admin.admin_master')
@section('main-content')

{{-- jquery latest --}}
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" 
        crossorigin="anonymous"></script>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Profile Edit</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Inventory</a></li>
                            <li class="breadcrumb-item active">Profile Edit</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div><!-- end page title -->

        {{-- main content start --}}
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- Fullname --}}
                            <div class="row mb-3">
                                <label for="fullname" class="col-sm-2 col-form-label">Fullname</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $editData->name }}" name="fullname"
                                        id="fullname">
                                </div>
                            </div>
                            {{-- Username --}}
                            <div class="row mb-3">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $editData->username }}" name="username"
                                        id="username">
                                </div>
                            </div>
                            {{-- Username --}}
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="email" value="{{ $editData->email }}" name="email"
                                        id="email">
                                </div>
                            </div>

                            {{-- Profile Image --}}
                            <div class="row mb-3">
                                <label for="profile_image" class="col-sm-2 col-form-label">Profile Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="profile_image"
                                        id="profile_image">
                                </div>
                            </div>

                            {{-- Profile Image Show --}}
                            <div class="row mb-3">
                                <label for="profile_image" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg" alt="200x200" width="200" src="{{ asset('backend') }}/assets/images/small/img-3.jpg" data-holder-rendered="true" id="profile_image_show">
                                </div>
                            </div>

                            {{-- Profile Update Button --}}
                            <div class="row mb-3">
                                <label for="profile_image" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-info waves-effect waves-light">
                                        <i class="ri-check-line align-middle me-2"></i> Update Profile
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


<script type="text/javascript">

       $(document).ready(function(){
        /**
         * For Dynamic Image Change jquery Code
         */
           $("#profile_image").change(function(e){
               var reader = new FileReader();
               reader.onload = function(e){
                   $("#profile_image_show").attr('src', e.target.result);
               }
               reader.readAsDataURL(e.target.files['0'])
           });
       });

</script>

@endsection
