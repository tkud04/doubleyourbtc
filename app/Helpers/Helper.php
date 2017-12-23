<?php
namespace App\Helpers;

use App\Helpers\Contracts\HelperContract; 
use Crypt;
use Carbon\Carbon; 
use Mail;
use Auth; 
use App\Deposits;
use App\Payouts;

class Helper implements HelperContract
{

          /**
           * Sends an email(blade view or text) to the recipient
           * @param String $to
           * @param String $subject
           * @param String $data
           * @param String $view
           * @param String $image
           * @param String $type (default = "view")
           **/
           function sendEmail($to,$subject,$data,$view,$type="view")
           {
                   if($type == "view")
                   {
                     Mail::send($view,$data,function($message) use($to,$subject){
                           $message->from('info@worldlotteryusa.com',"DoubleYourBTC");
                           $message->to($to);
                           $message->subject($subject);
                          if(isset($data["has_attachments"]) && $data["has_attachments"] == "yes")
                          {
                          	foreach($data["attachments"] as $a) $message->attach($a);
                          } 
                     });
                   }

                   elseif($type == "raw")
                   {
                     Mail::raw($view,$data,function($message) use($to,$subject){
                           $message->from('info@worldlotteryusa.com',"DoubleYourBTC");
                           $message->to($to);
                           $message->subject($subject);
                           if(isset($data["has_attachments"]) && $data["has_attachments"] == "yes")
                          {
                          	foreach($data["attachments"] as $a) $message->attach($a);
                          } 
                     });
                   }
           }
           
           
           function getTransactionID()
          {
          	$length = 3;
          	$ret = openssl_random_pseudo_bytes($length, $cstrong);
              $ret = bin2hex($ret);
              return $ret;
          }
           
           
           function addDeposit($data)
           {
           	$deposit_id = $this->getTransactionID();
           
           	$ret = Deposits::create(['deposit_id' => $deposit_id, 
                                                      'wallet' => $data['wallet'], 
                                                      'amount' => $data['amount'], 
                                                      'status' => "pending"
                                                      ]);
                  if(isset($data['date'])) $ret->update(['created_at' => $data['date'], 'updated_at' => $data['date'] ]);                                                           
                return $ret;
           } 
           
           
           function addPayout($data)
           {
           	$payout_id = $this->getTransactionID();
           
           	$ret = Payouts::create(['payout_id' => $payout_id, 
                                                      'wallet' => $data['wallet'], 
                                                      'amount' => $data['amount']
                                                      ]);
               if(isset($data['date'])) $ret->update(['created_at' => $data['date'], 'updated_at' => $data['date'] ]);                       
                                                      
                return $ret;
           } 
           
           
           function getDeposits()
          {
          	$ret = [];
          	$deposits = Deposits::orderBy('created_at', 'desc')->get();
          	 if($deposits != null)
              {
              	foreach($deposits as $c){
              	$temp = [];
              	$temp['id'] = $c->id;
                  $temp['deposit_id'] = $c->deposit_id;
                  $temp['wallet'] = $c->wallet;
                  $temp['amount'] = $c->amount;
                  $temp['status'] = $c->status;
                  $temp["date"] = $c->created_at->format("D, jS F Y h:i A");
                  array_push($ret, $temp);
                 } 
              }
              return $ret;
          }
          
          
          function getPayouts()
          {
          	$ret = [];
          	$payouts = Payouts::orderBy('created_at', 'desc')->get();
          	 if($payouts != null)
              {
              	foreach($payouts as $c){
              	$temp = [];
              	$temp['id'] = $c->id;
                  $temp['payout_id'] = $c->payout_id;
                  $temp['wallet'] = $c->wallet;
                  $temp['amount'] = $c->amount;
                  $temp["date"] = $c->created_at->format("D, jS F Y h:i A");
                  array_push($ret, $temp);
                 } 
              }
              return $ret;
          }
           
          
          function getLatestDeposits()
          {
          	$ret = []; $i = 0;
          	$deposits = $this->getDeposits();
          	 if($deposits != null && count($deposits) > 0)
              {
              	if(count($deposits) < 10){
                 	for($i = 0 ; $i < count($deposits); $i++){               
                       array_push($ret, $deposits[$i]);
                     } 
                  } 
                  
                  else{
                 	for($i = 0 ; $i < 10; $i++){               
                       array_push($ret, $deposits[$i]);
                     } 
                  } 
              }
              return $ret;
          }
          
          
          function getLatestPayouts()
          {
          	$ret = [];
          	$payouts = $this->getPayouts();
          	 if($payouts != null && count($payouts) > 0)
              {
              	if(count($payouts) < 10){
                 	for($i = 0 ; $i < count($payouts); $i++){               
                       array_push($ret, $payouts[$i]);
                     } 
                  } 
                  
                  else{
                 	for($i = 0 ; $i < 10; $i++){               
                       array_push($ret, $payouts[$i]);
                     } 
                  } 
              }
              return $ret;
          }
   
}
?>