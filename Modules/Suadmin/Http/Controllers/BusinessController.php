<?php

namespace Modules\Suadmin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Carbon\Carbon;

class BusinessController extends Controller
{
    public function business_basic()
    {
        return view('suadmin::business.basic');
    }
}
