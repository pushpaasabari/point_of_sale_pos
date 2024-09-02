<?php

namespace Modules\Suadmin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Carbon\Carbon;

class VendorController extends Controller
{
    public function vendor_add()
    {
        return view('suadmin::vendor.add');
    }
    public function vendor_add_post(Request $request)
    {
        $request->validate([
            'vendor_name' => 'required',
            'vendor_gstin' => 'required',
            'vendor_mobile' => 'required',
            'vendor_email' => 'required',
            'vendor_address' => 'required'
        ]);

        // Insert the data into the database
        DB::table('vendor')->insert([
            'vendor_name' => $request->vendor_name,
            'vendor_gstin' => $request->vendor_gstin,
            'vendor_mobile' => $request->vendor_mobile,
            'vendor_email' => $request->vendor_email,
            'vendor_address' => $request->vendor_address,
            'vendor_created_on' => Carbon::now(),
            'vendor_updated_on' => Carbon::now(),
            'vendor_status' => 1
        ]);

        // Redirect with success message
        // return redirect(url('suadmin/vendor.add'))->with("success", "Vendor Added successfully!");
        return back()->with('success', 'Vendor Added successfully!');
    }

    public function vendor_list()
    {
        $vendor_list = DB::table('vendor')
            ->get();
        return view('suadmin::vendor.list', compact('vendor_list'));
    }

    public function vendor_status_change($vendor_sno, $vendor_status)
    {
        if ($vendor_status == 1) {
            DB::table('vendor')->where('vendor_sno', $vendor_sno)->update(['vendor_status' => 0, 'vendor_updated_on' => Carbon::now()]);
            return redirect()->back();
        } elseif ($vendor_status == 0) {
            DB::table('vendor')->where('vendor_sno', $vendor_sno)->update(['vendor_status' => 1, 'vendor_updated_on' => Carbon::now()]);
            return redirect()->back();
        } else {
            DB::table('vendor')->where('vendor_sno', $vendor_sno)->update(['vendor_status' => 0, 'vendor_updated_on' => Carbon::now()]);
            return redirect()->back();
        }
    }

    public function vendor_edit($vendor_sno)
    {
        $vendor_edit = DB::table('vendor')
            ->where('vendor_sno', $vendor_sno)
            ->get()
            ->first();
        return view('suadmin::vendor.edit', compact('vendor_edit'));

    }

    function vendor_edit_post(Request $request)
    {

        // print_r($request->vendor_sno);
        // exit();
        $request->validate([
            'vendor_sno' => 'required',
            'vendor_name' => 'required',
            'vendor_gstin' => 'required',
            'vendor_mobile' => 'required',
            'vendor_email' => 'required',
            'vendor_address' => 'required'
        ]);
        DB::table('vendor')
            ->where('vendor_sno', $request->vendor_sno)
            ->update([
                'vendor_name' => $request->vendor_name,
                'vendor_gstin' => $request->vendor_gstin,
                'vendor_mobile' => $request->vendor_mobile,
                'vendor_email' => $request->vendor_email,
                'vendor_address' => $request->vendor_address,
                'vendor_updated_on' => Carbon::now()
            ]);
        return redirect(url('suadmin/vendor.list'))->with('success', $request->vendor_name . ' Updated Successfully!.');

    }


    function vendor_delete($vendor_sno, $vendor_name)
    {
        DB::table('vendor')->where('vendor_sno', $vendor_sno)->delete();
        return redirect()->back()->with('success', $vendor_name . ' Successfully Deleted');
    }
}
