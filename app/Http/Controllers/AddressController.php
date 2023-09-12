<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\address;
use Illuminate\Support\Facades\Auth;


class addressController extends Controller
{
    public function address($id)
    {
        $loggedRoleUser = Auth::user()->toArray()['role'];

        if (Auth::user()->id == $id || $loggedRoleUser == '4') {

            $address = address::where('user_id', $id)->get();

            if (empty($address->toArray())) {
                $address = "";
            } else {
                $address = $address->toArray()[0];
            }
            return view('pages.register_address', compact('address', 'id'));
        } else {
            return redirect('/');
        }
    }

    public function save_address(Request $request)
    {
        $address = new address;
        $address->street = $request['street'];
        $address->number = $request['number'];
        $address->neighborhood = $request['neighborhood'];
        $address->complement = $request['complement'];
        $address->zip_code = $request['zip_code'];
        $address->user_id = $request['user_id'];

        $address->save();
        return response()->json(['success' => 'addressregistered successfully!']);
    }

    public function update_address(Request $request)
    {
        $user_id = $request['user_id'];
        $address = Address::where('user_id', $user_id)->first();
    
        if (!$address) {
            return response()->json(['error' => 'Address not found for this user.']);
        }
    
        $address->street = $request['street'];
        $address->number = $request['number'];
        $address->neighborhood = $request['neighborhood'];
        $address->complement = $request['complement'];
        $address->zip_code = $request['zip_code'];
        $address->user_id = $user_id;
    
        $address->save();
    
        return response()->json(['success' => 'Address updated successfully!']);
    }
    
}
