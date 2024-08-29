<?php

namespace Modules\Suadmin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Carbon\Carbon;

class ItemController extends Controller
{
    public function item_add()
    {
        return view('suadmin::item.add');
    }
    public function item_add_post(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // exit();
        $request->validate([
            'item_name' => 'required',
            // 'item_hsn' => 'required',
            'item_category' => 'required',
            // 'item_code' => 'required',
            // 'item_desc' => 'required',
            'item_base_unit' => 'required',
            // 'item_secondary_unit' => 'required',
            'item_tax' => 'required',
            // 'item_purchase_price' => 'required',
            // 'item_purchase_tax' => 'required',
            // 'item_mrp' => 'required',
            // 'item_sale_price' => 'required',
            // 'item_sale_tax' => 'required',
            // 'item_image' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);

        // Handle the file upload
        if ($request->hasFile('item_image')) {
            $file = $request->file('item_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = 'uploads/item';
            $file->move($destinationPath, $filename);

            // The full path to the uploaded file
            $filePath = $destinationPath . '/' . $filename;
        } else {
            return back()->withErrors(['item_image' => 'File upload failed.']);
        }

        // Insert the data into the database
        DB::table('item')->insert([
            'item_name' => $request->item_name,
            'item_hsn' => $request->item_hsn,
            'item_category' => $request->item_category,
            'item_code' => $request->item_code,
            'item_desc' => $request->item_desc,
            'item_base_unit' => $request->item_base_unit,
            'item_secondary_unit' => $request->item_secondary_unit,
            'item_tax' => $request->item_tax,
            'item_purchase_price' => $request->item_purchase_price,
            'item_purchase_tax' => $request->item_purchase_tax,
            'item_mrp' => $request->item_mrp,
            'item_sale_price' => $request->item_sale_price,
            'item_sale_tax' => $request->item_sale_tax,
            'item_image' => $filePath, // Store the file path in the database
            'item_created_on' => Carbon::now(),
            'item_updated_on' => Carbon::now(),
            'item_stock' => 0,
            'item_status' => 0
        ]);

        // Redirect with success message
        return redirect(url('suadmin/item.add'))->with("success", "Item Added successfully!");
    }

    public function item_list()
    {
        $item_list = DB::table('item')
            ->get();
        return view('suadmin::item.list', compact('item_list'));
    }

    public function item_status_change($item_sno, $item_status)
    {
        if ($item_status == 1) {
            DB::table('item')->where('item_sno', $item_sno)->update(['item_status' => 0, 'item_updated_on' => Carbon::now()]);
            return redirect()->back();
        } elseif ($item_status == 0) {
            DB::table('item')->where('item_sno', $item_sno)->update(['item_status' => 1, 'item_updated_on' => Carbon::now()]);
            return redirect()->back();
        } else {
            DB::table('item')->where('item_sno', $item_sno)->update(['item_status' => 0, 'item_updated_on' => Carbon::now()]);
            return redirect()->back();
        }
    }

    public function item_edit($item_sno)
    {
        $item_edit = DB::table('item')
            ->where('item_sno', $item_sno)
            ->get()
            ->first();
        return view('suadmin::item.edit', compact('item_edit'));

    }

    function item_edit_post(Request $request)
    {

        $request->validate([
            'item_sno' => 'required',
            'item_name' => 'required',
            // 'item_hsn' => 'required',
            'item_category' => 'required',
            // 'item_code' => 'required',
            // 'item_desc' => 'required',
            'item_base_unit' => 'required',
            // 'item_secondary_unit' => 'required',
            'item_tax' => 'required',
            // 'item_purchase_price' => 'required',
            // 'item_purchase_tax' => 'required',
            // 'item_mrp' => 'required',
            // 'item_sale_price' => 'required',
            // 'item_sale_tax' => 'required',
            // 'item_image' => 'required|mimes:png,jpg,jpeg|max:2048'
            'old_item_image' => 'required'
        ]);
        $item_sno = $request->item_sno;

        // Handle the file upload
        if ($request->hasFile('item_image')) {
            $file = $request->file('item_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = 'uploads/item';
            $file->move($destinationPath, $filename);

            // The full path to the uploaded file
            $filePath = $destinationPath . '/' . $filename;

            // File Delete
            $old_img = $request->old_item_image;
            $img_path = public_path($old_img);
            if (file_exists($img_path)) {
                unlink($img_path);
            }

            DB::table('item')
                ->where('item_sno', $item_sno)
                ->update([
                    'item_name' => $request->item_name,
                    'item_hsn' => $request->item_hsn,
                    'item_category' => $request->item_category,
                    'item_code' => $request->item_code,
                    'item_desc' => $request->item_desc,
                    'item_base_unit' => $request->item_base_unit,
                    'item_secondary_unit' => $request->item_secondary_unit,
                    'item_tax' => $request->item_tax,
                    'item_purchase_price' => $request->item_purchase_price,
                    'item_purchase_tax' => $request->item_purchase_tax,
                    'item_mrp' => $request->item_mrp,
                    'item_sale_price' => $request->item_sale_price,
                    'item_sale_tax' => $request->item_sale_tax,
                    'item_image' => $filePath,
                    'item_updated_on' => Carbon::now(),
                ]);
            return redirect(url('suadmin/item.list'))->with('success', $request->item_name . ' Updated Successfully!.');
        } else {
            $filePath = $request->old_item_image;
            DB::table('item')
                ->where('item_sno', $item_sno)
                ->update([
                    'item_name' => $request->item_name,
                    'item_hsn' => $request->item_hsn,
                    'item_category' => $request->item_category,
                    'item_code' => $request->item_code,
                    'item_desc' => $request->item_desc,
                    'item_base_unit' => $request->item_base_unit,
                    'item_secondary_unit' => $request->item_secondary_unit,
                    'item_tax' => $request->item_tax,
                    'item_purchase_price' => $request->item_purchase_price,
                    'item_purchase_tax' => $request->item_purchase_tax,
                    'item_mrp' => $request->item_mrp,
                    'item_sale_price' => $request->item_sale_price,
                    'item_sale_tax' => $request->item_sale_tax,
                    'item_image' => $filePath,
                    'item_updated_on' => Carbon::now(),
                ]);
            return redirect(url('suadmin/item.list'))->with('success', $request->item_name . ' Updated Successfully!.');
        }
    }

    function item_delete($item_sno, $item_name)
    {
        DB::table('item')->where('item_sno', $item_sno)->get(['item_image']);
        $img_path = public_path('item_image');
        if (file_exists($img_path)) {
            unlink($img_path);
        }
        DB::table('item')->where('item_sno', $item_sno)->delete();
        return redirect()->back()->with('success', $item_name . ' Successfully Deleted');
    }
}
