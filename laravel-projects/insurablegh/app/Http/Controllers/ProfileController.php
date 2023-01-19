<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\HttpResponses;
use App\Http\Controllers\Auth\Storage;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use HttpResponses;

    //Show User Profile


    public function profile(Request $request){
        
        $user = $request->user();
        
        return $this->success([
            'user' => $user
        ]);
    }


    //edit User Profile
    
    
    public function EditProfile(Request $request){

        $request->validate([
            'image' => 'required|image|max:5120',   //store img size= 5MB
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $msg = "record Updated successfully.";
        try{

            $users = $request->user();
            $users->image = $request->image->store('image','public');
            $users->save();

            $user = User::find($users->id)->update([
                'name'=> $request->first_name." ".$request->last_name,
                'phone'=> $request->phone,
                'username'=> $request->username,
                'image'=> \Storage::url($users->image),
                
            ]);

        }
        catch(\Exception $e){
            $msg = $e->getmessage();
        }

        
        return $this->success([
            'user' =>$users
            ], $msg);
    } 
    
    /**change Passwosrd for user*/

    public function ChangePassword(Request $request){
        
        
        $validator = Validator::make($request->all(), [
            'email' =>  'required|email|exists:users',
            'old_password' => 'required',
            'password' =>  'required|confirmed',
        ]);

        
    
        if($validator->fails())
        {
            return $this->error([], $validator->errors()->first());
        }
            
        $user = User::where('email', $request->email)->where('otp', $request->otp);
    
        if($user->exists()){
            $msg = "Password Changed successfully";
            $user = $user->first();

            
                $user->update([
                    'email_verified_at'   => now(),
                    'otp'   =>  null,
                    'password' => bcrypt($request->password),
                ]);
            
    
            return $this->success([
                'user' => $user,
                'token' => $user->createToken('API Token of'. $user->name)->plainTextToken
            ], $msg);
        }
        else
        {
            $msg = "Otp Not Matched";
            return $this->success([], $msg);
        }
    }

}
