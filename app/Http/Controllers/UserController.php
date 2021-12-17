<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attr = $request->all();
        $attr['password'] = bcrypt($request->password);
        User::create($attr);

        return back()->with('success', 'Berhasil menambahkan admin baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // ()->validate([
            // 'name' => 'required',
            // 'email' => 'required|email',
            // 'phone' => 'required|numeric'
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {   
        $address = Address::where('user_id', $user->id)->first();
        if ($user->type === 3) {
            return view('users.edit', compact('user', 'address'));
        }
        if ($user->type === 2) {
            return view('users.artists.edit', compact('user', 'address'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($request->code == 1) {
            $userAttr = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|numeric',
            ]);
            $user->update($userAttr);
    
            $addressAttr = $request->validate([
                'street' => 'required',
                'city' => 'required',
                'region' => 'required',
                'zipcode' => 'required|numeric',
            ]);
            $user->address->update($addressAttr);

            return back()->with('success', 'Profile berhasil diperbarui.');
        }
        if ($request->code == 2) {
            if ($request->password === $request->repassword) {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
                return back()->with('success', 'Password berhasil diperbarui');
            } else {
                // throw ValidationException::withMessages([
                //     'repassword' => 'Password yang Anda masukkan tidak sama',
                // ]);
                return back()->with('error', 'Password yang Anda masukkan tidak sama');
            }
        }

        $attr = $request->all();
        if ($request->password == null) {
            $attr['password'] = $user->password;
        } else {
            $attr['password'] = bcrypt($request->password);
        }
        $user->update($attr);
        return back()->with('success', 'Informasi berhasil diperbarui');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'Berhasil menghapus' + $user->name + ' dari daftar.');
    }

}
