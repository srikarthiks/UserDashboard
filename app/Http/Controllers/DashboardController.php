<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\UserAddress;

class DashboardController extends Controller
{
    /**
     * Update the user's password.
     */
    public function index()
    {
        $user = auth()->user();
        $profile = $user->profile;
        $addresses = $user->addresses;

        return view('dashboard', compact('user', 'profile', 'addresses'));
    }



public function updateProfile(Request $request)
{
    $user = auth()->user();

    $request->validate([
        'father_name' => 'required|string|max:255',
        'mother_name' => 'required|string|max:255',
    ]);

    $profile = UserProfile::updateOrCreate(
        ['user_id' => $user->id],
        [
            'father_name' => $request->input('father_name'),
            'mother_name' => $request->input('mother_name'),
        ]
    );
    $profile->user_id = $user->id;
    $profile->save();

    return redirect()->route('dashboard')->with('success', 'Profile updated successfully');
}


    public function createAddress()
    {
        return view('create_address');
    }
    public function storeAddress(Request $request)
    {
        $request->validate([
            'address1' => 'required|string|max:255',
            'address2' => 'required|string|max:255',
            'pincode' => 'required|string|max:10',
        ]);

        $user = auth()->user();

        // Create the address associated with the authenticated user
        $address = UserAddress::create([
            'user_id' => $user->id,
            'address1' => $request->input('address1'),
            'address2' => $request->input('address2'),
            'pincode' => $request->input('pincode'),
        ]);


        return redirect()->route('dashboard')->with('success', 'Address added successfully');
    }

    public function editAddress(UserAddress $address)
        {

            return view('edit_address', compact('address'));

        }
        public function updateAddress(Request $request, UserAddress $address)
{
    $request->validate([
        'address1' => 'required|string|max:255',
        'address2' => 'required|string|max:255',
        'pincode' => 'required|string|max:10',
    ]);

    $address->update([
        'address1' => $request->input('address1'),
        'address2' => $request->input('address2'),
        'pincode' => $request->input('pincode'),
    ]);

    return redirect()->route('dashboard')->with('success', 'Address updated successfully');
}




}
