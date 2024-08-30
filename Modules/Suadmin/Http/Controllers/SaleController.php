<?php

namespace Modules\Suadmin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;

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
        echo '<pre>';
        print_r($request->all());
        exit();
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
