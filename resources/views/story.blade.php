<!-- Start Story Area -->
			<section class="story-area" id="story">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-3" id="story_title">
							<div class="story-title">
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
                               <div id="error"></div><br>
                               <div id="working"></div>
								<form id="form-double">
									{{ csrf_field() }}   
                                    <h4>How much do you want to invest? </h4>       
									<input type="text" name="amount" placeholder="Amount to invest?" onfocus="this.placeholder = ''" onblur="this.placeholder = 'How much do you want to invest?'" required class="single-input-primary" value="{{old('amount')}}"><br>
									<h4>Your email address</h4>       
									<input type="email" name="email" placeholder="Your email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email address'" required class="single-input-primary" value="{{old('email')}}"><br>
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