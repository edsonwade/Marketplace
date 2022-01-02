<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\User;
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

    function create()
    {
        $users = User::all(['id', 'name']);
        return view('admin.stores.create', compact('users'));
    }

    function store(Request $request)
    {
        $request->validate(

            [
                'name' => 'required|string|min:5',
                'slug' => 'required|string|min:10',
                'phone' => 'required|min:9',
                'description' => 'required'
            ]);
        $user = User::find(20);
        $store = $user->store()->create([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'phone' => $request->input('phone'),
            'description' => $request->input('description'),

        ]);
        return redirect()->route('admin.index')->with('message', 'new store created with success!!');

    }

    function edit($store)
    {
        $store = Store::find($store);

        return view('admin.stores.edit', compact('store'));
    }

    function update(Request $request, Store $store)
    {
        $request->validate(

            [
                'name' => 'required|string|min:5',
                'slug' => 'required|string|min:10',
                'phone' => 'required|min:9',
                'description' => 'required'
            ]);
        $user = User::find(20);
        $store = $user->store()->update([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'phone' => $request->input('phone'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('admin.index')->with('message', ' store updated with success!!');
    }

    function destroy($store)
    {
        $store = Store::find($store);
        $store->delete();
        return redirect()->route('admin.index')->with('message', 'Store deleted Successfully');
    }
}
