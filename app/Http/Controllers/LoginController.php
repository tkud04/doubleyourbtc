<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Helpers\Contracts\HelperContract; 
use Auth;
use App\Deposits;
use App\Payouts;
use App\User;
use Session; 
use Validator; 
use Carbon\Carbon; 

class LoginController extends Controller {

	protected $helpers; //Helpers implementation
    
    public function __construct(HelperContract $h)
    {
    	$this->helpers = $h;            
    }
    
    
    public function getLogin()
    {
         return view('admin.login');
    }
    
    
    public function postLogin(Request $request)
    {
        $req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'pass' => 'required|min:6',
                             'username' => 'required|min:5|exists:users'
         ]);
         
         if($validator->fails())
         {
             //$messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
             //dd($messages);
             
            $ret = "<div class='alert alert-danger'><strong>Whoops!</strong> There were some problems signing you in.<br><br>";
            $ret .= "<ul>";
					
             foreach($messages->all() as $error) $ret .= "<li>".$error."</li>";
            
             $ret .= "</ul></div>";
         }
         
         else
         {
         	//authenticate this login
            if(Auth::attempt(['username' => $req['username'],'password' => $req['pass']]))
            {
            	//Login successful
                
               $user = Auth::user();                      
              return redirect()->intended('admin/dashboard');    
            }
            
            else
            {
            	Session::flash("login-status", "fail");
                return redirect()->back()->withInput();
            } 
         }                 
    }
    
    
    public function getLogout()
    {
        if(Auth::check())
        {
           //$req = $request->all();
           $user = Auth::user();
           Auth::logout();       	
        }
        
        return redirect()->intended('/');
    }

}
