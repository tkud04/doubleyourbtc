<!-- Start Story Area -->
			<section class="story-area" id="story">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-12">
							<div class="story-box">
								<!--------- Input errors -------------->
                    @if (count($errors) > 0)
                          @include('input-errors', ["errors" => $errors])
                     @elseif(Session::has("input-error")) 
                        @if(Session::get("input-error") == "wallet")
                         <div class="alert alert-danger">Please enter a valid wallet address</div><br>
                        @if(Session::get("input-error") == "amount")
                         <div class="alert alert-danger">Please enter a valid amount</div><br>
                     @endif     
                               
								<form method="post" action="{{url('double')}}">
									<img src = "{{asset('img/loading.gif')}}" width="70" height="70" class="img img-responsive loading-gif">
									{{ csrf_field() }}   
                                    <h4>Enter your bitcoin wallet address:</h4>       
									<input type="text" name="wallet" placeholder="Enter your bitcoin address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your bitcoin address'" required class="single-input-primary" value="{{old('wallet')}}"><br>
									<h4>Amount to invest (Minimum: <b>&#x0E3F;0.05</b>):</h4>       
									<input type="text" name="amount" placeholder="Enter amount" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter amount'" required class="single-input-primary" value="{{old('amount')}}"><br>
					
									<button type="submit" class="genric-btn primary radius">Let's double it!</button>
								</form><br>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End Story Area -->