<?php
/**
 * Created by PhpStorm.
 * User: ShaOn
 * Date: 11/29/2018
 * Time: 12:49 AM
 */

namespace App\Classes;

use App\Models\EmailTemplate;
use App\Models\Generalsetting;
use App\Models\Order;
use PDF;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Config;

class GeniusMailer
{

    public function __construct()
    {
        $gs = Generalsetting::findOrFail(1);
        Config::set('mail.driver', $gs->mail_engine);
        Config::set('mail.host', $gs->smtp_host);
        Config::set('mail.port', $gs->smtp_port);
        Config::set('mail.encryption', $gs->email_encryption);
        Config::set('mail.username', $gs->smtp_user);
        Config::set('mail.password', $gs->smtp_pass);
    }

    public function sendAutoOrderMail(array $mailData,$id)
    {
        $setup = Generalsetting::find(1);
        $temp = EmailTemplate::where('email_type','=',$mailData['type'])->first();

        $body = preg_replace("/{customer_name}/", $mailData['cname'] ,$temp->email_body);
        $body = preg_replace("/{order_amount}/", $mailData['oamount'] ,$body);
        $body = preg_replace("/{admin_name}/", $mailData['aname'] ,$body);
        $body = preg_replace("/{admin_email}/", $mailData['aemail'] ,$body);
        $body = preg_replace("/{order_number}/", $mailData['onumber'] ,$body);
        $body = preg_replace("/{website_title}/", $setup->title ,$body);

        $data = [
            'email_body' => $body
        ];

        $objDemo = new \stdClass();
        $objDemo->to = $mailData['to'];
        $objDemo->from = $setup->from_email;
        $objDemo->title = $setup->from_name;
        $objDemo->subject = $temp->email_subject;

        try{
            Mail::send('admin.email.mailbody',$data, function ($message) use ($objDemo,$id) {
                $message->from($objDemo->from,$objDemo->title);
                $message->to($objDemo->to);
                $message->subject($objDemo->subject);
                $order = Order::findOrFail($id);
                $cart = unserialize(bzdecompress(utf8_decode($order->cart)));
                $fileName = public_path('assets/temp_files/').str_random(4).time().'.pdf';
                $pdf = PDF::loadView('print.order', compact('order', 'cart'))->save($fileName);
                $message->attach($fileName);
            });

        }
        catch (\Exception $e){
             //die($e->getMessage());
        }

        $files = glob('assets/temp_files/*'); //get all file names
        foreach($files as $file){
            if(is_file($file))
            unlink($file); //delete file
        }
    }

    public function sendAutoMail(array $mailData)
    {
        $setup = Generalsetting::find(1);

        $temp = EmailTemplate::where('email_type','=',$mailData['type'])->first();
        $body = preg_replace("/{customer_name}/", $mailData['cname'] ,$temp->email_body);
        $body = preg_replace("/{order_amount}/", $mailData['oamount'] ,$body);
        $body = preg_replace("/{admin_name}/", $mailData['aname'] ,$body);
        $body = preg_replace("/{admin_email}/", $mailData['aemail'] ,$body);
        $body = preg_replace("/{order_number}/", $mailData['onumber'] ,$body);
        if (!empty($mailData['damount'])) {
            $body = preg_replace("/{deposit_amount}/", $mailData['damount'] ,$body);
          }
          if (!empty($mailData['wbalance'])) {
            $body = preg_replace("/{wallet_balance}/", $mailData['wbalance'] ,$body);
          }
        $body = preg_replace("/{website_title}/", $setup->title ,$body);

        $data = [
            'email_body' => $body
        ];

        $objDemo = new \stdClass();
        $objDemo->to = $mailData['to'];
        $objDemo->from = $setup->from_email;
        $objDemo->title = $setup->from_name;
        $objDemo->subject = $temp->email_subject;

        try{
            Mail::send('admin.email.mailbody',$data, function ($message) use ($objDemo) {
                $message->from($objDemo->from,$objDemo->title);
                $message->to($objDemo->to);
                $message->subject($objDemo->subject);
            });
        }
        catch (\Exception $e){
            // die($e->getMessage());
        }
    }

    public function sendCustomMail(array $mailData)
    {
        $setup = Generalsetting::find(1);

        $data = [
            'email_body' => $mailData['body'],
            'subject' => $mailData['subject'],
            'button_text' => $mailData['button_text'],
            'cheers' => $mailData['cheers'],
        ];

        $objDemo = new \stdClass();
        $objDemo->to = $mailData['to'];
        $objDemo->from = $setup->from_email;
        $objDemo->title = $setup->from_name;
        $objDemo->subject = $mailData['subject'];

        try{
            Mail::send('admin.email.mailbody',$data, function ($message) use ($objDemo) {
                $message->from($objDemo->from,$objDemo->title);
                $message->to($objDemo->to);
                $message->subject($objDemo->subject);
            });
        }
        catch (\Exception $e){
            //die($e->getMessage());
            // return $e->getMessage();
            Log::Info($e->getMessage());
        }
        return true;
    }

    public function sendWelcomeMail(array $mailData)
    {

        $welcome = "Welcome,";
        $content = "Thank you for signing up with EarnCrypto7. We strive to help our users earn crypto with our system.";
        $button_text = "Access EarnCrypto7";
        $cheer_text = "Cheers,<br> EarnCrypto7.";

        if($mailData['lang'] == 12)
        {
            $welcome = "Bienvenido,";
            $content = "Gracias por suscribirse a EarnCrypto7. Nos esforzamos por ayudar a nuestros usuarios a obtener criptomonedas con nuestro sistema.";
            $button_text = "Acceder al sistema EarnCrypto7";
            $cheer_text = "Abrazo,<br> EarnCrypto7.";
        }
        else if($mailData['lang'] == 13)
        {
            $welcome = "Bem vindo,";
            $content = "Obrigado por se inscrever no EarnCrypto7. Nós nos esforçamos para ajudar nossos usuários a obter criptomoedas com o nosso sistema.";
            $button_text = "Acesse O Sistema EarnCrypto7";
            $cheer_text = "Abraço,<br> EarnCrypto7.";
        }

        $setup = Generalsetting::find(1);

        $data = [
            'email_body' => $mailData['body'],
            'receiver' => $mailData['name'],
            'welcome' => $welcome,
            'content' => $content,
            'button_text' => $button_text,
            'cheer_text' => $cheer_text,
        ];

        $objDemo = new \stdClass();
        $objDemo->to = $mailData['to'];
        $objDemo->from = $setup->from_email;
        $objDemo->title = $setup->from_name;
        $objDemo->subject = $mailData['subject'];

        try{
            Mail::send('admin.email.welcome',$data, function ($message) use ($objDemo) {
                $message->from($objDemo->from,$objDemo->title);
                $message->to($objDemo->to);
                $message->subject($objDemo->subject);
            });
        }
        catch (\Exception $e){
            //die($e->getMessage());
            // return $e->getMessage();
        }
        return true;
    }


}