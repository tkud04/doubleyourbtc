<!-- Start Amazing Works Area -->
		</div>
		<div class="main-wrapper">
			<section class="amazing-works-area">
					<div class="row justify-content-center">
						<div class="col-lg-8">
							<div class="section-title text-center">
								<h3>New members who are doubling right now</h3>
								<span class="text-uppercase">Check the latest deposits and profit payments on this live data table</span>
							</div>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-lg-8">
							<ul class="nav nav-tabs">
<li class="active nav-item">
<a class="nav-link" data-toggle="tab" href="#tabDeposits">Latest Deposits</a>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#tabPayouts">Profit Payouts</a>
</li>
</ul>

<div class="tab-content">
   <!----------Tab----------->
   <div class="tab-pane active" id="tabDeposits">
      <div class="row justify-content-center">
         <div class="col-md-12">
         	<div class="progress-table-wrap">
							<div class="progress-table">
								<div class="table-head">
									<div class="transaction-id">#</div>
									<div class="date">Time</div>
									<div class="wallet-address">Wallet</div>
									<div class="amount">Amount</div>
									<div class="status">Status</div>
								</div>
								
								@if(isset($latestDeposits) && count($latestDeposits) > 0)
								@foreach($latestDeposits as $d) 
								<div class="table-row">
									<div class="transaction-id">{{$d['deposit_id']}}</div>
									<div class="date">{{$d['date']}}</div>
									<div class="wallet-address">{{$d['wallet']}}</div>
									<div class="amount">&#x0e3f;{{$d['amount']}}</div>
									<div class="status">
										<?php
                                           $class = ""; $txt = "";
                                           if($d['status'] == "pending"){
                                           	$class = "label label-warning"; $txt = "PENDING";
                                           }
                                           
                                           else if($d['status'] == "active"){
                                           	$class = "label label-primary"; $txt = "ACTIVE";
                                           }
                                        ?>
										<span class="{{$class}}">{{$txt}}</span>
									</div>
								</div>
								@endforeach
								@endif 
							</div>
						</div>
         </div>
      </div>
   </div>
   <!----------/Tab----------->
   	
   <!----------Tab----------->
   <div class="tab-pane" id="tabPayouts">
      <div class="row justify-content-center">
         <div class="col-md-12">
         	<div class="progress-table-wrap">
							<div class="progress-table">
								<div class="table-head">
									<div class="transaction-id">#</div>
									<div class="date">Time</div>
									<div class="wallet-address">Wallet</div>
									<div class="amount">Amount</div>
								</div>
								
								@if(isset($latestPayouts) && count($latestPayouts) > 0)
								@foreach($latestPayouts as $p) 
								<div class="table-row">
									<div class="transaction-id">{{$p['payout_id']}}</div>
									<div class="date">{{$p['date']}}</div>
									<div class="wallet-address">{{$p['wallet']}}</div>
									<div class="amount">&#x0e3f;{{$p['amount']}}</div>
								</div>
								@endforeach
								@endif 
							</div>
						</div>
         </div>
      </div>
   </div>
   <!----------/Tab----------->
</div>
						</div>
				    </div>
			</section>
		</div>
		<div class="main-wrapper">
			<!-- End Amazing Works Area -->