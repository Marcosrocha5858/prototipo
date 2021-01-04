<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;

class TenantController extends Controller{

public function index(){

    return view ('tenant.home.index');
}


}
