<?php

namespace Modules\Suadmin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Carbon\Carbon;
use Str;


class UserController extends Controller
{
    public function create()
    {
        return view('suadmin::user.registration');
    }
    public function create_post(Request $request)
    {
        $request->validate([
            'user_type' => 'required',
            'user_name' => 'required',
            'user_id' => 'required',
            'user_email' => 'required',
            'user_pwd' => 'required',
            'user_mobile' => 'required',
            'user_address' => 'required',
            'user_id_proof' => 'required',
            'user_id_proof_image' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);

        // Handle the file upload
        if ($request->hasFile('user_id_proof_image')) {
            $file = $request->file('user_id_proof_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = 'uploads';
            $file->move($destinationPath, $filename);

            // The full path to the uploaded file
            $filePath = $destinationPath . '/' . $filename;
        } else {
            return back()->withErrors(['user_id_proof_image' => 'File upload failed.']);
        }

        // Insert the data into the database
        DB::table('su_user')->insert([
            'user_type' => $request->user_type,
            'user_name' => $request->user_name,
            'user_id' => $request->user_id,
            'user_email' => $request->user_email,
            'user_pwd' => bcrypt($request->user_pwd), // Hash the password
            'user_mobile' => $request->user_mobile,
            'user_address' => $request->user_address,
            'user_id_proof' => $request->user_id_proof,
            'user_id_proof_image' => $filePath, // Store the file path in the database
            'user_created_on' => Carbon::now(),
            'user_updated_on' => Carbon::now(),
            'user_otp_status' => 0,
            'user_status' => 0
        ]);

        // Redirect with success message
        return redirect(url('suadmin/user.registration'))->with("success", "User registered successfully!");
    }

    public function admin_list()
    {
        $admin_list = DB::table('su_user')
            ->where('user_type', 'admin')
            ->get();
        return view('suadmin::user.admin_list', compact('admin_list'));
    }
    public function user_list()
    {
        $user_list = DB::table('su_user')
            ->where('user_type', 'user')
            ->get();
        return view('suadmin::user.user_list', compact('user_list'));
    }

    public function user_status_change($user_id, $user_status)
    {
        if ($user_status == 1) {
            DB::table('su_user')->where('user_id', $user_id)->update(['user_status' => 0, 'user_updated_on' => Carbon::now()]);
            return redirect()->back();
        } elseif ($user_status == 0) {
            DB::table('su_user')->where('user_id', $user_id)->update(['user_status' => 1, 'user_updated_on' => Carbon::now()]);
            return redirect()->back();
        } else {
            DB::table('su_user')->where('user_id', $user_id)->update(['user_status' => 0, 'user_updated_on' => Carbon::now()]);
            return redirect()->back();
        }
    }

    public function user_edit($user_id)
    {
        $user = DB::table('su_user')
            ->where('user_id', $user_id)
            ->get()
            ->first();

        return view('suadmin::user.user_edit', compact('user'));

    }

    function user_edit_post(Request $request)
    {

        $request->validate([
            'user_type' => 'required',
            'user_name' => 'required',
            'user_id' => 'required',
            'user_email' => 'required',
            'user_mobile' => 'required',
            'user_address' => 'required',
            'user_id_proof' => 'required'
            // 'user_id_proof_image' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);
        $user_id = $request->user_id;

        // Handle the file upload
        if ($request->hasFile('user_id_proof_image')) {
            $file = $request->file('user_id_proof_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = 'uploads';
            $file->move($destinationPath, $filename);

            // The full path to the uploaded file
            $filePath = $destinationPath . '/' . $filename;

            // File Delete
            $old_img = $request->old_user_id_proof_image;
            $img_path = public_path($old_img);
            if (file_exists($img_path)) {
                unlink($img_path);
            }

            DB::table('su_user')
                ->where('user_id', $user_id)
                ->update([
                    'user_type' => $request->user_type,
                    'user_name' => $request->user_name,
                    'user_email' => $request->user_email,
                    'user_mobile' => $request->user_mobile,
                    'user_address' => $request->user_address,
                    'user_id_proof' => $request->user_id_proof,
                    'user_id_proof_image' => $filePath, // Store the file path in the database
                    'user_updated_on' => Carbon::now(),
                ]);
            return redirect()->back()->with('success', $user_id . ' Updated Successfully!.');
        } else {
            $filePath = $request->old_user_id_proof_image;
            DB::table('su_user')
                ->where('user_id', $user_id)
                ->update([
                    'user_type' => $request->user_type,
                    'user_name' => $request->user_name,
                    'user_email' => $request->user_email,
                    'user_mobile' => $request->user_mobile,
                    'user_address' => $request->user_address,
                    'user_id_proof' => $request->user_id_proof,
                    'user_id_proof_image' => $filePath, // Store the file path in the database
                    'user_updated_on' => Carbon::now()
                ]);
            return redirect()->back()->with('success', $user_id . ' Updated Successfully!.');
        }
    }

    function user_delete($user_id, $user_name)
    {
        DB::table('su_user')->where('user_id', $user_id)->get(['user_id_proof_image']);
        $img_path = public_path('user_id_proof_image');
        if (file_exists($img_path)) {
            unlink($img_path);
        }
        $result = DB::table('su_user')->where('user_id', $user_id)->delete();
        return redirect()->back()->with('success', $user_name . ' Successfully Deleted');
    }
}


