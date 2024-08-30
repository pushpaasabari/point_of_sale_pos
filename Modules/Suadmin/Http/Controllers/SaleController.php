<?php

namespace Modules\Suadmin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Session;
use Carbon\Carbon;

class SaleController extends Controller
{
    public function sale_add()
    {
        $customer = DB::table('customer')->get();
        $item = DB::table('item')
            ->where("item_status", 1)
            ->get();
        $lastSale = DB::table('sale')->orderBy('sale_bill', 'desc')->first();
        $nextBillNumber = $this->generateNextBillNumber($lastSale ? $lastSale->sale_bill : null);
        return view('suadmin::sale.add', compact('customer', 'nextBillNumber', 'item'));
    }

    private function generateNextBillNumber($lastBillNumber)
    {
        // Define your prefix and suffix
        $prefix = 'SALE/24-25/';

        if ($lastBillNumber) {
            // Extract the numeric part
            $lastNumber = (int) substr($lastBillNumber, strlen($prefix));
            // Increment the number
            $nextNumber = $lastNumber + 1;
        } else {
            // Start with 1 if no previous bill number
            $nextNumber = 1;
        }

        // Format the number with leading zeros if needed
        $nextBillNumber = $prefix . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

        return $nextBillNumber;
    }
    public function sale_add_post(Request $request)
    {
        // echo '<pre>';
        // print_r($request->all());
        // exit();
        // Validation rules
        $rules = [
            'customer_id' => 'required|integer|exists:customer,customer_sno',
            'customer_mobile' => 'required|string|max:15',
            'customer_name' => 'required|string|max:255',
            'customer_gstin' => 'nullable|string|max:15',
            'customer_address' => 'required|string|max:255',
            'sale_bill' => 'required|string|max:50|unique:sale,sale_bill',
            'sale_date' => 'required|date',
            'item_id.*' => 'required|integer|exists:item,item_sno',
            'item_hsn.*' => 'required|string|max:10',
            'item_name.*' => 'required|string|max:255',
            'item_mrp.*' => 'required|numeric|min:0',
            'item_qty.*' => 'required|integer|min:1',
            'item_sale.*' => 'required|numeric|min:0',
            'item_discount_percentage.*' => 'nullable|numeric|between:0,100',
            'item_discount.*' => 'nullable|numeric|min:0',
            'item_tax_percentage.*' => 'required|numeric|min:0|max:100',
            'item_tax.*' => 'required|numeric|min:0',
            'item_amount.*' => 'required|numeric|min:0',
            'totalQty' => 'required|numeric|min:1',
            'item_totalDiscountAmount' => 'required|numeric|min:0',
            'item_totalTaxAmount' => 'required|numeric|min:0',
            'item_totalAmount' => 'required|numeric|min:0',
            'item_totalReceived' => 'nullable|numeric|min:0',
            'item_totalBalance' => 'required|numeric|min:0',
        ];

        // Custom error messages (optional)
        $messages = [
            'customer_id.required' => 'The customer is required.',
            'item_id.*.exists' => 'One or more items are invalid.',
            // Add more custom messages if needed
        ];

        // Validate the request
        $validated = $request->validate($rules, $messages);

        // If validation passes, proceed with storing the data
        $user_name = Session::get('su_sess_name');
        $user_id = Session::get('su_sess_id');
        $saleID = DB::table('sale')
            ->where('sale_bill', $request->sale_bill)
            ->where('customer_id', $request->customer_id)
            ->get('id')
            ->first();
        if ($saleID) {
            return back()->with('error', 'Sale Order is already exists!');
        } else {
            $sale = DB::table('sale')->insert([
                'customer_id' => $request->customer_id,
                'customer_name' => $request->customer_name,
                'user_name' => $user_name,
                'user_id' => $user_id,
                'customer_mobile' => $request->customer_mobile,
                'customer_gstin' => $request->customer_gstin,
                'customer_address' => $request->customer_address,
                'sale_bill' => $request->sale_bill,
                'sale_date' => $request->sale_date,
                'total_amount' => $request->item_totalAmount,
                'totalQty' => $request->totalQty,
                'item_totalDiscountAmount' => $request->item_totalDiscountAmount,
                'item_totalTaxAmount' => $request->item_totalTaxAmount,
                'item_totalReceived' => $request->item_totalReceived,
                'item_totalBalance' => $request->item_totalBalance,
                'sale_created_at' => Carbon::now(),
                'sale_updated_at' => Carbon::now()
            ]);


            $newSaleID = DB::table('sale')
                ->where('sale_bill', $request->sale_bill)
                ->get('id')
                ->first();

            foreach ($request->item_id as $index => $itemId) {
                DB::table('sale_item')->insert([
                    'sale_id' => $newSaleID->id,
                    'customer_name' => $request->customer_name,
                    'sale_bill' => $request->sale_bill,
                    'sale_date' => $request->sale_date,
                    'item_id' => $itemId,
                    'item_hsn' => $request->item_hsn[$index],
                    'item_name' => $request->item_name[$index],
                    'item_mrp' => $request->item_mrp[$index],
                    'item_qty' => $request->item_qty[$index],
                    'item_sale_price' => $request->item_sale[$index],
                    'item_discount_percentage' => $request->item_discount_percentage[$index],
                    'item_discount' => $request->item_discount[$index],
                    'item_tax_percentage' => $request->item_tax_percentage[$index],
                    'item_tax' => $request->item_tax[$index],
                    'item_amount' => $request->item_amount[$index],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                $getstock = DB::table('item')
                    ->where('item_sno', $itemId)
                    ->get('item_stock')
                    ->first();

                if (!$getstock->item_stock) {
                    return redirect(url('suadmin/sale.add'))->with("error", "Out Of Stock");
                } else {
                    $updatedstock = $getstock->item_stock - $request->item_qty[$index];
                    DB::table('item')->where('item_sno', $itemId)
                        ->update([
                            'item_stock' => $updatedstock,
                            'item_updated_on' => Carbon::now()
                        ]);
                }
            }
            return back()->with('success', 'Sale Order saved successfully!');
        }

        // return view('suadmin::sale.add');
    }
    public function fetch_customer_details(Request $request)
    {
        $get_customer_ajax['customer'] = DB::table('customer')
            ->where("customer_sno", $request->customer_sno)
            ->get()
            ->first();
        return response()->json($get_customer_ajax);
    }
    public function fetch_item_details(Request $request)
    {
        $get_item_ajax['item'] = DB::table('item')
            ->where("item_sno", $request->item_sno)
            ->where("item_status", 1)
            ->get()
            ->first();
        return response()->json($get_item_ajax);
    }
}
