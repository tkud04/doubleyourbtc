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

class AdminController extends Controller {

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
	public function getDashboard()
    {
    	$latestDeposits = $this->helpers->getLatestDeposits();
        $latestPayouts = $this->helpers->getLatestPayouts();
        $totalDepositAccounts = count($this->helpers->getDeposits());
        $totalPayoutTransactions = count($this->helpers->getPayouts());
    	return view('admin.index', compact(['latestDeposits', 'latestPayouts','totalDepositAccounts', 'totalPayoutTransactions']));    	
    }
    
    /**
	 * Show the application deposits screen to the user.
	 *
	 * @return Response
	 */
	public function getDeposits()
    {
    	$latestDeposits = $this->helpers->getDeposits();
    	return view('admin.deposits', compact(['latestDeposits']));    	
    }
    
    /**
	 * Show the application payouts screen to the user.
	 *
	 * @return Response
	 */
	public function getPayouts()
    {
    	$latestPayouts = $this->helpers->getPayouts();
    	return view('admin.payouts', compact(['latestPayouts']));    	
    }
    
    
    public function postChangeDepositStatus(Request $request)
	{
           $req = $request->all();
          # dd($req);
               
                $validator = Validator::make($req, [
                             'dep-num' => 'required|alpha_num',
                             'status' => 'required|not_in:none'
                   ]);
         
                 if($validator->fails())
                  {
                       $messages = $validator->messages();
                      //dd($messages);
             
                      return redirect()->back()->withInput()->with('errors',$messages);
                 }
                
                 else
                 { 
                     $d = Deposits::where('deposit_id',$req['dep-num'])->first();
                     
                     if($d != null){
                        $d->update(['status' => $req['status'] ]);
                     } 
                     Session::flash("change-status", "success");
                     return redirect()->intended('admin/dashboard');                           
                 }
                                       
	}
	
	
	public function postAddPayout(Request $request)
	{
           $req = $request->all();
          # dd($req);
               
                $validator = Validator::make($req, [
                             'wallet' => 'required|alpha_num',
                             'amount' => 'required|numeric'
                   ]);
         
                 if($validator->fails())
                  {
                       $messages = $validator->messages();
                      //dd($messages);
             
                      return redirect()->back()->withInput()->with('errors',$messages);
                 }
                
                 else
                 { 
                     $arr = ['amount' => $req['amount'], 'wallet' => $req['wallet'], 'status' => "pending"];
                     $this->helpers->addPayout($arr);

                     Session::flash("add-payout-status", "success");
                     return redirect()->intended('admin/dashboard');                           
                 }
                                       
	}
	
	public function postChangePayoutStatus(Request $request)
	{
           $req = $request->all();
          # dd($req);
               
                $validator = Validator::make($req, [
                             'pay-num' => 'required|alpha_num',
                             'status' => 'required|not_in:none'
                   ]);
         
                 if($validator->fails())
                  {
                       $messages = $validator->messages();
                      //dd($messages);
             
                      return redirect()->back()->withInput()->with('errors',$messages);
                 }
                
                 else
                 { 
                     $p = Payouts::where('payout_id',$req['pay-num'])->first();
                     
                     if($p != null){
                        $p->update(['status' => $req['status'] ]);
                     } 
                     Session::flash("change-status", "success");
                     return redirect()->intended('admin/dashboard');                           
                 }
                                       
	}

}
