<?php

namespace Modules\Suadmin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Session;
use Carbon\Carbon;

class PurchaseController extends Controller
{

    public function purchase_add()
    {
        $vendor = DB::table('vendor')->get();
        $item = DB::table('item')->get();
        return view('suadmin::purchase.add', compact('vendor', 'item'));
    }
    public function purchase_add_post(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // exit();
        $rules = [
            '_token' => 'required',
            'vendor_id' => 'required|integer|exists:vendor,vendor_sno',
            'vendor_mobile' => 'required|digits:10',
            'vendor_name' => 'required|string|max:255',
            'vendor_gstin' => 'required|string|max:15',
            'vendor_address' => 'required|string|max:500',
            'purchase_bill' => 'required|string|max:50',
            'purchase_date' => 'required|date',
            'item_id.*' => 'required|integer|exists:item,item_sno',
            'item_hsn.*' => 'required|string|max:10',
            'item_name.*' => 'required|string|max:255',
            'item_mrp.*' => 'required|numeric|min:0',
            'item_qty.*' => 'required|integer|min:1',
            'item_purchase.*' => 'required|numeric|min:0',
            'item_discount_percentage.*' => 'nullable|numeric|between:0,100',
            'item_discount.*' => 'nullable|numeric|min:0',
            'item_tax_percentage.*' => 'required|numeric|between:0,100',
            'item_tax.*' => 'required|numeric|min:0',
            'item_amount.*' => 'required|numeric|min:0',
            'totalQty' => 'required|numeric|min:0',
            'item_totalDiscountAmount' => 'nullable|numeric|min:0',
            'item_totalTaxAmount' => 'required|numeric|min:0',
            'item_totalAmount' => 'required|numeric|min:0',
            'item_totalReceived' => 'nullable|numeric|min:0',
            'item_totalBalance' => 'required|numeric|min:0',
        ];

        // Custom error messages (optional)
        $messages = [
            'vendor_id.required' => 'Vendor ID is required.',
            'item_id.*.required' => 'Item ID is required for each item.',
            'item_qty.*.min' => 'Quantity must be at least 1.'
            // Add more custom messages as needed
        ];

        // Perform validation
        $validatedData = $request->validate($rules, $messages);

        $user_name = Session::get('su_sess_name');

        $purchaseID = DB::table('purchase')
            ->where('purchase_bill', $request->purchase_bill)
            ->where('vendor_id', $request->vendor_id)
            ->get('id')
            ->first();
        // echo '<pre>';
        // print_r($purchaseID);
        // exit();
        if ($purchaseID) {
            return back()->with('error', 'Purchase Order is already exists!');
        } else {
            $purchase = DB::table('purchase')->insert([
                'vendor_id' => $request->vendor_id,
                'vendor_name' => $request->vendor_name,
                'user_name' => $user_name,
                'vendor_mobile' => $request->vendor_mobile,
                'vendor_gstin' => $request->vendor_gstin,
                'purchase_bill' => $request->purchase_bill,
                'purchase_date' => $request->purchase_date,
                'total_amount' => $request->item_totalAmount,
                'totalQty' => $request->totalQty,
                'item_totalDiscountAmount' => $request->item_totalDiscountAmount,
                'item_totalTaxAmount' => $request->item_totalTaxAmount,
                'item_totalPaid' => $request->item_totalReceived,
                'item_totalBalance' => $request->item_totalBalance,
                'purchase_created_at' => Carbon::now(),
                'purchase_updated_at' => Carbon::now()
            ]);

            $purchaseID = DB::table('purchase')
                ->where('purchase_bill', $request->purchase_bill)
                ->get('id')
                ->first();



            foreach ($request->item_id as $index => $itemId) {
                DB::table('purchase_item')->insert([
                    'purchase_id' => $purchaseID->id,
                    'vendor_name' => $request->vendor_name,
                    'purchase_bill' => $request->purchase_bill,
                    'purchase_date' => $request->purchase_date,
                    'item_id' => $itemId,
                    'item_hsn' => $request->item_hsn[$index],
                    'item_name' => $request->item_name[$index],
                    'item_mrp' => $request->item_mrp[$index],
                    'item_qty' => $request->item_qty[$index],
                    'item_purchase_price' => $request->item_purchase[$index],
                    'item_amount' => $request->item_amount[$index],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                $getstock = DB::table('item')
                    ->where('item_sno', $itemId)
                    ->get('item_stock')
                    ->first();

                if (!$getstock->item_stock) {
                    DB::table('item')->where('item_sno', $itemId)
                        ->update([
                            'item_stock' => $request->item_qty[$index],
                            'item_updated_on' => Carbon::now()
                        ]);
                } else {
                    $updatedstock = $getstock->item_stock + $request->item_qty[$index];
                    DB::table('item')->where('item_sno', $itemId)
                        ->update([
                            'item_stock' => $updatedstock,
                            'item_updated_on' => Carbon::now()
                        ]);
                }
            }
            return back()->with('success', 'Purchase Order saved successfully!');
        }
    }

    public function fetch_vendor_details(Request $request)
    {
        $get_vendor_ajax['vendor'] = DB::table('vendor')
            ->where("vendor_sno", $request->vendor_sno)
            ->get()
            ->first();
        return response()->json($get_vendor_ajax);
    }
    public function fetch_item_details(Request $request)
    {
        $get_item_ajax['item'] = DB::table('item')
            ->where("item_sno", $request->item_sno)
            ->get()
            ->first();
        return response()->json($get_item_ajax);
    }

}
