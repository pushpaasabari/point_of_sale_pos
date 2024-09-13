<?php

namespace Modules\Suadmin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Carbon\Carbon;
use Storage;

class BusinessController extends Controller
{
    public function business_basic()
    {
        $business_basic = DB::table('business_basic')->get()->first();
        return view('suadmin::business.basic', compact('business_basic'));
    }

    public function uploadProfilePicture(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg|max:2048' // Max size 2MB
        ]);

        try {
            $file = $request->file("profile_picture");
            $destinationPath = "assets/profile_pictures";
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $fileUrl = $file->move($destinationPath, $fileName);

            $lastRow = DB::table('business_basic')->get()->first();

            if ($lastRow == '') {
                DB::table('business_basic')->insert([
                    'business_profile_picture' => $fileName,
                    'business_updated_at' => Carbon::now()
                ]);
            } else {

                DB::table('business_basic')
                    ->where('id', $lastRow->id)
                    ->update([
                        'business_profile_picture' => $fileName,
                        'business_updated_at' => Carbon::now()
                    ]);
            }

            // Return success response with the file URL
            return response()->json([
                'success' => true,
                'file_url' => $fileUrl,
                'message' => 'Profile picture uploaded successfully!',
            ]);

        } catch (\Exception $e) {
            // Return error response in case of failure
            return response()->json([
                'success' => false,
                'message' => 'Failed to upload profile picture. Please try again.',
            ], 500);
        }
    }

    public function business_info(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // exit();

        $request->validate([
            'business_name' => 'required',
            'business_gstin' => 'nullable',
            'business_cin' => 'nullable',
            'business_email' => 'nullable',
            'business_mobile' => 'nullable'
        ]);

        $lastRow = DB::table('business_basic')->get()->first();

        if ($lastRow == '') {
            DB::table('business_basic')->insert([
                'business_name' => $request->business_name,
                'business_gstin' => $request->business_gstin,
                'business_cin' => $request->business_cin,
                'business_email' => $request->business_email,
                'business_mobile' => $request->business_mobile,
                'business_updated_at' => Carbon::now()
            ]);
            return back()->with('success', 'Business Info Added successfully!');
        } else {

            DB::table('business_basic')
                ->where('id', $lastRow->id)
                ->update([
                    'business_name' => $request->business_name,
                    'business_gstin' => $request->business_gstin,
                    'business_cin' => $request->business_cin,
                    'business_email' => $request->business_email,
                    'business_mobile' => $request->business_mobile,
                    'business_updated_at' => Carbon::now()
                ]);
            return back()->with('success', 'Business Info Updated successfully!');
        }

    }
    public function business_address(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // exit();


        $request->validate([
            'business_street' => 'required',
            'business_landmark' => 'nullable',
            'business_city' => 'required',
            'business_pincode' => 'nullable',
            'business_country' => 'nullable'
        ]);

        // $lastRow = DB::table('business_basic')->orderBy('id', 'desc')->get('id')->first();
        $lastRow = DB::table('business_basic')->get()->first();

        if ($lastRow == '') {
            DB::table('business_basic')->insert([
                'business_street' => $request->business_street,
                'business_landmark' => $request->business_landmark,
                'business_city' => $request->business_city,
                'business_pincode' => $request->business_pincode,
                'business_country' => $request->business_country,
                'business_updated_at' => Carbon::now()
            ]);
            return back()->with('success', 'Business Address Added successfully!');
        } else {

            DB::table('business_basic')
                ->where('id', $lastRow->id)
                ->update([
                    'business_street' => $request->business_street,
                    'business_landmark' => $request->business_landmark,
                    'business_city' => $request->business_city,
                    'business_pincode' => $request->business_pincode,
                    'business_country' => $request->business_country,
                    'business_updated_at' => Carbon::now()
                ]);
            return back()->with('success', 'Business Address Updated successfully!');
        }
    }
    public function business_default(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // exit();

        $request->validate([
            'prefix_invoice' => 'nullable',
            'prefix_estimate' => 'nullable',
            'prefix_paymentIn' => 'nullable',
            'prefix_paymentOut' => 'nullable',
            'prefix_creditNote' => 'nullable'
        ]);

        // Insert the data into the database
        DB::table('business_basic')->insert([
            'business_prefix_invoice' => $request->prefix_invoice,
            'business_prefix_estimate' => $request->prefix_estimate,
            'business_prefix_paymentin' => $request->prefix_paymentIn,
            'business_prefix_paymentout' => $request->prefix_paymentOut,
            'business_prefix_creditnote' => $request->prefix_creditNote,
            'business_updated_at' => Carbon::now()
        ]);
        return back()->with('success', 'Business Defaults Added successfully!');
    }

}
