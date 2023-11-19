@php
$pageTitle = "Supplier All"
@endphp


@extends('admin.admin_master')
@section('main-content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Supplier All</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Inventory</a></li>
                            <li class="breadcrumb-item active">Supplier All</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div><!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-6">
                                <h4 class="card-title">Supplier All Data</h4>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <button type="button" class="btn btn-dark waves-effect waves-light"
                                    data-bs-toggle="modal" data-bs-target="#supplierModal">Add Supplier</button>

                            </div>
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Mobile Number</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($suppliers as $key=>$item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->mobile_no }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>
                                        @if ($item->status == '1')
                                        <div class="font-size-13">
                                            <i
                                                class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active
                                        </div>
                                        @else
                                        <div class="font-size-13">
                                            <i
                                                class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>Deactive
                                        </div>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target="#updateSupplier"><i
                                                class="far fa-edit"></i></button>
                                        <a href="{{ route('supplier.destroy', $item->id) }}" id="delete"
                                            class="btn btn-danger btn-sm waves-effect waves-light"><i
                                                class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>


                                <!-- Update Supplier Modal -->
                                <div class="modal fade" id="updateSupplier" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" role="dialog"
                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Update Supplier</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('supplier.update', $item->id) }}" method="POST"
                                                    id="Supplier_Form">
                                                    @csrf
                                                    {{-- Supplier Name --}}
                                                    <div class="row mb-1">
                                                        <label for="supplier_name" class="col-form-label">Supplier
                                                            Name</label>
                                                        <div class="col-sm-12">
                                                            <input class="form-control" type="text"
                                                                value="{{ $item->name }}" id="supplier_name"
                                                                name="supplier_name">
                                                        </div>
                                                    </div>
                                                    {{-- Mobile No --}}
                                                    <div class="row mb-1">
                                                        <label for="mobile_no" class="col-form-label">Mobile No</label>
                                                        <div class="col-sm-12">
                                                            <input class="form-control" type="number"
                                                                value="{{ $item->mobile_no }}" id="mobile_no"
                                                                name="mobile_no">
                                                        </div>
                                                    </div>
                                                    {{-- Email --}}
                                                    <div class="row mb-1">
                                                        <label for="supplier_email" class="col-form-label">Email</label>
                                                        <div class="col-sm-12">
                                                            <input class="form-control" type="email"
                                                                value="{{ $item->email }}" id="supplier_email"
                                                                name="supplier_email">
                                                        </div>
                                                    </div>
                                                    {{-- Status --}}
                                                    <div class="row mb-1">
                                                        <label for="supplier_status" class="col-form-label">Supplier
                                                            Status</label>
                                                        <div class="col-sm-12">
                                                            <select name="supplier_status" id="supplier_status"
                                                                class="form-control">
                                                                <option value="1">Active</option>
                                                                <option value="0">Deactive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    {{-- Address --}}
                                                    <div class="row mb-1">
                                                        <label for="address" class="col-form-label">Address</label>
                                                        <div class="col-sm-12">
                                                            <textarea id="textarea" class="form-control" maxlength="225"
                                                                rows="2"
                                                                placeholder="This textarea has a limit of 225 chars."
                                                                name="address"
                                                                id="address">{{ $item->address }}</textarea>
                                                        </div>
                                                    </div>
                                                    {{-- Button --}}
                                                    <div class="row my-3">
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="button"
                                                                class="btn btn-light mx-1 waves-effect"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit"
                                                                class="btn btn-success mx-1 waves-effect waves-light"
                                                                id="Store_Supplier">Update Supplier</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Page-content -->

<!-- Add Supplier Modal -->
<div class="modal fade" id="supplierModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('supplier.add') }}" method="POST" id="default_Form">
                    @csrf
                    {{-- Supplier Name --}}
                    <div class="row mb-1">
                        <label for="supplier_name" class="col-form-label">Supplier Name</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="text" placeholder="Enter Supplier Name" id="supplier_name"
                                name="supplier_name">
                        </div>
                    </div>
                    {{-- Mobile No --}}
                    <div class="row mb-1">
                        <label for="mobile_no" class="col-form-label">Mobile No</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="number" placeholder="Mobile Number" id="mobile_no"
                                name="mobile_no">
                        </div>
                    </div>
                    {{-- Email --}}
                    <div class="row mb-1">
                        <label for="supplier_email" class="col-form-label">Email</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="email" placeholder="example@example.com"
                                id="supplier_email" name="supplier_email">
                        </div>
                    </div>
                    {{-- Address --}}
                    <div class="row mb-1">
                        <label for="address" class="col-form-label">Address</label>
                        <div class="col-sm-12">
                            <textarea id="textarea" class="form-control" maxlength="225" rows="2"
                                placeholder="This textarea has a limit of 225 chars." name="address"
                                id="address"></textarea>
                        </div>
                    </div>
                    {{-- Button --}}
                    <div class="row my-3">
                        <div class="col-sm-12 d-flex justify-content-end">
                            <button type="button" class="btn btn-light mx-1 waves-effect"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary mx-1 waves-effect waves-light"
                                id="Store_Supplier">Save Supplier</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

</div>

@endsection
