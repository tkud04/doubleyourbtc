<div class="banner-area" id="banner">
				<div class="container">
					<div class="row justify-content-center height align-items-center">
						<div class="col-lg-8">
							@if(Session::has("deposit-status") && Session::get("deposit-status") == "success") 
								    <?php 
								       $amount = Session::get("amount");
								       $wallet = Session::get("wallet");
                                    ?>
                                     <div class="story-area">
								    <div class="story-box">
									 <h3>Request was successful!</h3> 
                                     <p>Your deposit will be marked as <strong>PENDING</strong> until your payment is confirmed</p>
									 <p>For your payment to be confirmed, send &#x0E3F;{{$amount}} to our Bitcoin wallet: <strong>{{$wallet}}</strong></p>
									 <p>Once your payment has been confirmed 3 times by the blockchain your deposit will be marked as <strong>ACTIVE</strong> and you will receive &#x0E3F;{{$amount * 2}} automatically in 24 hours!</p>
                                    </div>
                                    </div>
						            <br>
						        @endif
							<div class="banner-content text-center">
								<span class="text-white top text-uppercase">Instant Payment within 24 hours</span>
								<h1 class="text-white text-uppercase">We grow bitcoin, Guaranteed</h1>
								<a href="#story" class="primary-btn d-inline-flex align-items-center"><span class="mr-10">Double your bitcoins</span><span class="lnr lnr-arrow-right"></span></a>
							</div>
						</div>
					</div>
				</div>
			</div>