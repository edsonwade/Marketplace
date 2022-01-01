<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    function index()
    {
        $data['data'] = Store::all();


        if ($data) {
            $data['status'] = "ok";
            $data['msg'] = "loading store data with success!!";
            return response()->json($data);
        } else {
            $data['status'] = "error";
            $data['msg'] = "cannot loading the store data with";
        }
        return response()->json($data);
    }
}
