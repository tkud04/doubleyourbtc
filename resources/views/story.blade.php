<!-- Start Story Area -->
			<section class="story-area" id="story">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-3" id="story_title">
							<div class="story-title">
								@if(Session::has("deposit-status") && Session::get("deposit-status") == "success") 
								    <?php 
								       $amount = Session::get("amount");
								       $wallet = Session::get("wallet");
                                    ?>
								    <div style="border: 1px dashed #fff;" class="text-white">
									 Request was successful! Your deposit will be marked as <strong>PENDING</strong> until your payment is confirmed<br>
									 Send &#x0E3F;{{$amount}} to the following wallet: <strong>{{$wallet}}</strong><br>
									 Once your payment is confirmed your deposit will be marked as <strong>ACTIVE</strong>
                                    </div>
						            <br>
						        @endif
								<h3 class="text-white">Enter your receiving Bitcoin wallet address</h3>
								<span class="text-uppercase text-white">Send Bitcoin amount you want to double: (Min - &#x0e3f;0. 001)</span>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="story-box">
								<!--------- Input errors -------------->
                    @if (count($errors) > 0)
                          @include('input-errors', ["errors" => $errors])
                     @endif     
								<form method="post" action="{{url('double')}}">
									{{ csrf_field() }}          
									<input type="text" name="amount" placeholder="Deposit amount" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Deposit amount'" required class="single-input-primary" value="{{old('amount')}}"><br>
									<input type="text" name="wallet_address" placeholder="Your personal wallet (we will send profits here)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your personal wallet (we will send profits here)'" required class="single-input-primary" value="{{old('wallet_address')}}"><br>
									<button type="submit" class="genric-btn primary radius">Let's double it!</button>
								</form><br>
								<p><strong>Please Note:</strong> All Investment that is below Minimum & More than Maximum will count as donation on DoubleYourBTC System.</p>
                                <p>DoubleYourBTC is the most guaranteed Bitcoin Doubler, our System only takes 24 hours to double your investment.</p> 
                                <p>You just need to transfer your desired Bitcoin investment to our Address & wait for 24 hours only. All work is automated once 24 hours is completed;<br> You will get just double Bitcoin on your payout wallet Address. <strong>GUARANTEED</strong>.</p>
							</div><br>
							<div class="story-box">
								<h3 class="text-uppercase">How to Invest On DoubleYourBTC</h3>
								<p>Investment on DoubleYourBTC is pretty simple. You just need to provide us your Bitcoin payout address and the amount you want to invest, and then just click on "Let's Double It!" button.</p>
								<p>Then after submitting, an alert will show with our Bitcoin address. Now you just need to transfer your desire investment amount on our Bitcoin address & wait for blockchain confirmation.</p>
								<p>Before blockchain confirmation, your deposit will display on our site as PENDING. Once it has been confirmed 3 times via blockchain, your deposit will be marked as ACTIVE and you will receive double of your investment automatically within 24 hours! </p><br>
								
								<h3 class="text-uppercase">How DoubleYourBTC Works</h3>
								<p>DoubleYourBTC is specifically designed to predict Bitcoin prices from different Bitcoin Exchanges; we use high frequency auto trading bots to buy/sell Bitcoin on price difference & gain lots of profit!</p>
								<p>We also sell Bitcoin by converting it in local currency at high rates and then buy back Bitcoin at less rates using other exchanges.</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End Story Area -->