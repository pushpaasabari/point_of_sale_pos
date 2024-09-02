<?php

namespace Modules\Suadmin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Carbon\Carbon;

class FrimController extends Controller
{
    public function frim()
    {
        return view('suadmin::frim.add');
    }
}
