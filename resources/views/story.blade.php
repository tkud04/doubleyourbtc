<!-- Start Story Area -->
			<section class="story-area" id="story">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-3">
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
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End Story Area -->