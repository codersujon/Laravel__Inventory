<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $suppliers =  DB::table('suppliers')->latest()->get();
       return view('backend.supplier.supplier_all', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       DB::table('suppliers')->insertOrIgnore([
            "name"=> $request->supplier_name,
            "mobile_no"=> $request->mobile_no,
            "email"=> $request->supplier_email,
            "address"=> $request->address,
            "created_by"=> Auth::user()->id,
            "created_at"=> now(),
       ]);

       $notification = array(
            "message" => "Supplier Store Successfully!",
            "alert-type"=>"success"
        );

        return redirect()->route('supplier.all')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        DB::table('suppliers')->where('id', $id)->update([
            "name"=> $request->supplier_name,
            "mobile_no"=> $request->mobile_no,
            "email"=> $request->supplier_email,
            "status"=> $request->supplier_status,
            "address"=> $request->address,
            "updated_by"=> Auth::user()->id,
            "updated_at"=> now(),
       ]);

       $notification = array(
            "message" => "Supplier Updated Successfully!",
            "alert-type"=>"success"
        );

        return redirect()->route('supplier.all')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteItem = DB::table('suppliers')
                        ->where('id', $id)
                        ->delete();

        $notification = array(
            "message" => "Supplier Deleted Successfully!",
            "alert-type"=>"success"
        );

        return redirect()->route('supplier.all')->with($notification);
    }
}
