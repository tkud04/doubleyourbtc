<!-- Start Story Area -->
			<section class="story-area" id="story">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-12">
							<div class="story-box">
								<!--------- Input errors -------------->
                    @if (count($errors) > 0)
                          @include('input-errors', ["errors" => $errors])
                     @elseif(Session::has("input-error") && Session::get("input-error") == "true") 
                         <div class="alert alert-danger">Please enter a valid wallet address</div><br>
                     @endif     
                               
								<form method="post" action="{{url('double')}}">
									<img src = "{{asset('img/loading.gif')}}" width="70" height="70" class="img img-responsive loading-gif">
									{{ csrf_field() }}   
                                    <h4>Enter your bitcoin address</h4>       
									<input type="text" name="wallet" placeholder="Enter your bitcoin address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your bitcoin address'" required class="single-input-primary" value="{{old('wallet')}}"><br>
					
									<button type="submit" class="genric-btn primary radius">Let's double it!</button>
								</form><br>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End Story Area -->