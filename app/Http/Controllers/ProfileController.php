<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function update(ProfileRequest $request)
    {
        try {


            $user = Auth::user();
            $user->update([
                'email' => $request->email
            ]);

            $user->profile->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
            ]);

            if ($request->password)
                $user->fill([
                    'password' => Hash::make($request->password)
                ])->save();
        } catch (\Exception $e) {

            return redirect()->route('cabinet')->with(['error' => 'Щось пішло не так!']);
        }

        return redirect()->route('cabinet')->with(['success' => 'Успішно змінено!']);
    }


}
