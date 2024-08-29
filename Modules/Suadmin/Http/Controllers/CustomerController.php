<?php

namespace Modules\Suadmin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Carbon\Carbon;

class CustomerController extends Controller
{
    public function customer_add()
    {
        return view('suadmin::customer.add');
    }

    public function customer_add_post(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'customer_gstin' => 'required',
            'customer_mobile' => 'required',
            'customer_email' => 'required',
            'customer_address' => 'required'
        ]);

        // Insert the data into the database
        DB::table('customer')->insert([
            'customer_name' => $request->customer_name,
            'customer_gstin' => $request->customer_gstin,
            'customer_mobile' => $request->customer_mobile,
            'customer_email' => $request->customer_email,
            'customer_address' => $request->customer_address,
            'customer_created_on' => Carbon::now(),
            'customer_updated_on' => Carbon::now(),
            'customer_status' => 1
        ]);

        // Redirect with success message
        return redirect(url('suadmin/customer.add'))->with("success", "Customer Added successfully!");
    }

    public function customer_list()
    {
        $customer_list = DB::table('customer')
            ->get();
        return view('suadmin::customer.list', compact('customer_list'));
    }

    public function customer_status_change($customer_sno, $customer_status)
    {
        if ($customer_status == 1) {
            DB::table('customer')->where('customer_sno', $customer_sno)->update(['customer_status' => 0, 'customer_updated_on' => Carbon::now()]);
            return redirect()->back();
        } elseif ($customer_status == 0) {
            DB::table('customer')->where('customer_sno', $customer_sno)->update(['customer_status' => 1, 'customer_updated_on' => Carbon::now()]);
            return redirect()->back();
        } else {
            DB::table('customer')->where('customer_sno', $customer_sno)->update(['customer_status' => 0, 'customer_updated_on' => Carbon::now()]);
            return redirect()->back();
        }
    }

    public function customer_edit($customer_sno)
    {
        $customer_edit = DB::table('customer')
            ->where('customer_sno', $customer_sno)
            ->get()
            ->first();
        return view('suadmin::customer.edit', compact('customer_edit'));

    }

    function customer_edit_post(Request $request)
    {

        // print_r($request->customer_snos);
        // exit();
        $request->validate([
            'customer_sno' => 'required',
            'customer_name' => 'required',
            'customer_gstin' => 'required',
            'customer_mobile' => 'required',
            'customer_email' => 'required',
            'customer_address' => 'required'
        ]);
        DB::table('customer')
            ->where('customer_sno', $request->customer_sno)
            ->update([
                'customer_name' => $request->customer_name,
                'customer_gstin' => $request->customer_gstin,
                'customer_mobile' => $request->customer_mobile,
                'customer_email' => $request->customer_email,
                'customer_address' => $request->customer_address,
                'customer_updated_on' => Carbon::now()
            ]);
        return redirect(url('suadmin/customer.list'))->with('success', $request->customer_name . ' Updated Successfully!.');

    }


    function customer_delete($customer_sno, $customer_name)
    {
        DB::table('customer')->where('customer_sno', $customer_sno)->delete();
        return redirect()->back()->with('success', $customer_name . ' Successfully Deleted');
    }
}
