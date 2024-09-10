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
        return view('suadmin::business.basic');
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

}
