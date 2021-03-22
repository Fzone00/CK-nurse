<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Http\Request;
use Hash;

class SettingController extends Controller
{
    public function index()
    {
        return view('settings.change_password');
    }

    public function edit_profile(){
    	$user=auth()->user();
    	$data['user']=$user;
    	return view('settings.edit',$data);
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        foreach ($data as $key => $value) {
            $setting = Setting::firstOrCreate(['key' => $key]);
            $setting->value = $value;
            $setting->save();
        }

        return redirect()->route('settings.index');
    }

    public function change_password(){ 
        return view('settings.change_password');
    }


    public function update_password(Request $request){
        $request->validate([
        'old_password'=>'required|min:6|max:100',
        'new_password'=>'required|min:6|max:100',
        'confirm_password'=>'required|same:new_password'
        ]);

        $current_user=auth()->user();

        if(Hash::check($request->old_password,$current_user->password)){

            $current_user->update([
                'password'=>bcrypt($request->new_password)
            ]);

            return redirect()->back()->with('success','Password successfully updated.');

        }else{
            return redirect()->back()->with('error','Old password does not matched.');
        }



    }
}
