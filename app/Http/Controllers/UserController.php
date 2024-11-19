<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Place;
use App\Models\Rak;
use App\Models\Shap;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'email' => 'required|email',
            'password' => ['required', 'string', 'min:6', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[!@#$%^&*(),.?":{}|<>]/'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->file('image')) {
            $image = $request->file('image');
            $new_profile_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_profile_image);
            $request->request->add(['image' => $new_profile_image]);
        } else {
            $new_profile_image = 'admin.jpg';
        }
        $user = new User();
        $user->name = $request->input('first_name') . $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->image = $new_profile_image;
        $user->save();

        return redirect()->back()->with('success_add_new_user', 'Berhasil menambahkan data user baru!');
    }
}
