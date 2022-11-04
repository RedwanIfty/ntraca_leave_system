<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ScanController extends Controller
{
    public function scanedUser($id){
        //
        $parameter= Crypt::decrypt($id);
//        $parameter= Crypt::decrypt($id);
        return $parameter;
    }
}
