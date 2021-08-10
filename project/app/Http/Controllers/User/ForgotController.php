<?php

namespace App\Http\Controllers\User;

use App\Models\Generalsetting;
use App\Models\User;
use Illuminate\Http\Request;
use App\Classes\GeniusMailer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Validator;

class ForgotController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showForgotForm()
    {
      Log::Info("asdf");
      return view('user.forgot');
    }

    public function forgot(Request $request)
    {
      $gs = Generalsetting::findOrFail(1);
      $input =  $request->all();
      if (User::where('email', '=', $request->email)->count() > 0) {
      // user found
      $admin = User::where('email', '=', $request->email)->firstOrFail();
      $autopass = str_random(8);
      $input['password'] = bcrypt($autopass);
      $admin->update($input);

      $subject = "Reset Password";
      $msg = "Your New Password is : <h2>".$autopass.'</h2>';
      $button_text = "Access EarnCrypto7";
      $cheers = "Cheers";
      
      if(Session::get('language') == 12)
      {
        $subject = "Redefinir Contraseña";
        $msg = "Tu nueva contraseña es : <h2>".$autopass.'</h2>';
        $button_text = "Acceda a EarnCrypto7";
        $cheers = "Gracias";
      }
      else if(Session::get('language') == 13)
      {
        $subject = "Redefinir Senha";
        $msg = "Sua nova senha é : <h2>".$autopass.'</h2>';
        $button_text = "Acessar EarnCrypto7";
        $cheers = "Abraço";
      }

      if($gs->is_smtp == 1)
      {
          $data = [
                  'to' => $request->email,
                  'subject' => $subject,
                  'body' => $msg,
                  'button_text' => $button_text,
                  'cheers' => $cheers
          ];

          $mailer = new GeniusMailer();
          $mailer->sendCustomMail($data);                
      }
      else
      {
          $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
          mail($request->email,$subject,$msg,$headers);            
      }
      return response()->json('Your Password Reseted Successfully. Please Check your email for new Password.');
      }
      else{
      // user not found
      return response()->json(array('errors' => [ 0 => 'No Account Found With This Email.' ]));    
      }  
    }

}
