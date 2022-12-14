<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

    public function edit()
    {
        return view('Settings');
        $userRoles = auth()->user()->getRoleNames();
//        switch ($userRoles[0])
//        {
//            case 'admin' : return view('admin.AdminDashobard');
//            break;
//            case 'vendor' : return view('admin.AdminDashobard');
//            break;
//            default:  return view('admin.AdminDashobard');
//        }

    }

    public function update(Request $request)
        {
            $user = User::find($request->user_id);
            $this->validate($request, array(
                'name' => 'required|string|max:255',
                'email' => [
                    'required','string','email','max:255',
                ],
            ));
            try {
                $user->name = $request->name;
                $user->email = $request->email;
                $user->address = $request->address;
                $user->phone = $request->phone;
                if($request->password)
                {
                    $this->validate($request, array(
                        'password' => 'required|string|min:6|confirmed',
                    ));
                    $user->password = bcrypt($request->password);
                }
                $user->save();
                return redirect()->back()->with('updated','your profile has been updated successfully');
            }catch (\Exception $e)
            {
                return redirect()->back()->with('error',$e->getMessage());
            }

        }
}
