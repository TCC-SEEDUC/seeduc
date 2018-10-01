<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator, DB, Hash, Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Mail\Message;

class AuthController extends Controller
{
    /**
     * API Register
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $credentials = $request->only(
            'name', 
            'email', 
            'password', 
            'cpf', 
            'full_adress',
            'adress_number',
            'district', 
            'state',
            'city',
            'postal_code',
            'bond_id', 
            'role_id');
        
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required',
            'cpf' => 'required',
            'full_adress' => 'required',
            'adress_number' => 'required',
            'district' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postal_code' => 'required',
            'bond_id' => 'required',
            'role_id' => 'required'
        ];

        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['success'=> false, 'error'=> $validator->messages()]);
        }

        $password = $request->password;

        $name = $request->name;
        $email = $request->email; 
        $password = Hash::make($password); 
        $cpf = $request->cpf;
        $full_adress = $request->full_adress;
        $adress_number = $request->adress_number;
        $district = $request->district;
        $city = $request->city;
        $state = $request->state;
        $postal_code = $request->postal_code;
        $bond_id = $request->bond_id; 
        $role_id = $request->role_id;
        $password = $request->password;
        
        $user = User::create([
            'name' => $name,
            'email' => $email, 
            'password' => Hash::make($password), 
            'cpf' => $cpf,
            'full_adress' => $full_adress,
            'adress_number' => $adress_number,
            'district' => $district,
            'city' => $city,
            'state' => $state,
            'postal_code' => $postal_code,
            'bond_id' => $bond_id, 
            'role_id' => $role_id            
        ]);

        $verification_code = str_random(30); //Generate verification code
        DB::table('user_verifications')->insert(['user_id'=>$user->id,'token'=>$verification_code]);
        $subject = "Please verify your email address.";
        Mail::send('email.verify', ['name' => $name, 'verification_code' => $verification_code],
            function($mail) use ($email, $name, $subject){
                $mail->from(getenv('FROM_EMAIL_ADDRESS'), "From User/Company Name Goes Here");
                $mail->to($email, $name);
                $mail->subject($subject);
            });
        return response()->json(['success'=> true, 'message'=> 'Thanks for signing up! Please check your email to complete your registration.']);
    }

    /**
     * API Verify User
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verifyUser($verification_code)
    {
        $check = DB::table('user_verifications')->where('token',$verification_code)->first();
        if(!is_null($check)){
            $user = User::find($check->user_id);
            if($user->is_verified == 1){
                return response()->json([
                    'success'=> true,
                    'message'=> 'Account already verified..'
                ]);
            }
            $user->update(['is_verified' => 1]);
            DB::table('user_verifications')->where('token',$verification_code)->delete();
            return response()->json([
                'success'=> true,
                'message'=> 'You have successfully verified your email address.'
            ]);
        }
        return response()->json(['success'=> false, 'error'=> "Verification code is invalid."]);
    }


    /* API Login, on success return JWT Auth token
    *
    * @param Request $request
    * @return \Illuminate\Http\JsonResponse
    */
   public function login(Request $request)
   {
       $credentials = $request->only('email', 'password');
       
       $rules = [
           'email' => 'required|email',
           'password' => 'required'
       ];

       $validator = Validator::make($credentials, $rules);
       if($validator->fails()) {
           return response()->json(['success'=> false, 'error'=> $validator->messages()], 401);
       }
       
       $credentials['is_verified'] = 1;
       
       try {
           // attempt to verify the credentials and create a token for the user
           if (! $token = JWTAuth::attempt($credentials)) {
               return response()->json(['success' => false, 'error' => 'We cant find an account with this credentials. Please make sure you entered the right information and you have verified your email address.'], 404);
           }
       } catch (JWTException $e) {
           // something went wrong whilst attempting to encode the token
           return response()->json(['success' => false, 'error' => 'Failed to login, please try again.'], 500);
       }
       // all good so return the token
       return response()->json(['success' => true, 'data'=> [ 'token' => $token ]], 200);
   }
   /**
    * Log out
    * Invalidate the token, so user cannot use it anymore
    * They have to relogin to get a new token
    *
    * @param Request $request
    */
   public function logout(Request $request) {
       $this->validate($request, ['token' => 'required']);
       
       try {
           JWTAuth::invalidate($request->input('token'));
           return response()->json(['success' => true, 'message'=> "You have successfully logged out."]);
       } catch (JWTException $e) {
           // something went wrong whilst attempting to encode the token
           return response()->json(['success' => false, 'error' => 'Failed to logout, please try again.'], 500);
       }
   }


   /**
     * API Recover Password
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function recover(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            $error_message = "Your email address was not found.";
            return response()->json(['success' => false, 'error' => ['email'=> $error_message]], 401);
        }
        try {
            Password::sendResetLink($request->only('email'), function (Message $message) {
                $message->subject('Your Password Reset Link');
            });
        } catch (\Exception $e) {
            //Return with error
            $error_message = $e->getMessage();
            return response()->json(['success' => false, 'error' => $error_message], 401);
        }
        return response()->json([
            'success' => true, 'data'=> ['message'=> 'A reset email has been sent! Please check your email.']
        ]);
    }
}