<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    function index()
    {
        $stores = Store::paginate(10);


        /*if ($data) {
            $data['status'] = "ok";
            $data['msg'] = "loading store data with success!!";
            return response()->json($data);
        } else {
            $data['status'] = "error";
            $data['msg'] = "cannot loading the store data with";
        }*/
        return view('admin.stores.index', compact('stores'));
    }
}
