@extends("layout")
@section('title', $title)

@section('content') 
<!-- Start Story Area -->
			<section class="story-area">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-12">
							<div class="story-box">
								<!--------- Input errors -------------->
                    @if (count($errors) > 0)
                          @include('input-errors', ["errors" => $errors])
                     @endif     
                               <p>SEND BITCOINS TO:</p>
                               <div> <img src="https://blockchain.info/qr?data=1EmRKUyBUY4eqcV8vRZ6BtYiH7AU9xLrkq&amp;size=150"></div>
								<strong style="color:green">
                                    1EmRKUyBUY4eqcV8vRZ6BtYiH7AU9xLrkq</strong><br><strong style="color:#000080">Min: ANY AMOUNT , Max: ANY AMOUNT<br></strong>		
      							<b><a href="bitcoin:1EmRKUyBUY4eqcV8vRZ6BtYiH7AU9xLrkq">Click here to make deposit</a></b><br>
                                <p><img src="{{asset('img/loading-blue.gif')}}" width="40"><br>
	                                <b>STATUS:</b> Waiting for deposit...<br>
									( 0 / 2 confirmations )
                                </p>
                              <?php
                                 $m = "deposit";
                                if(Session::has($m)) $m = Session::get($m);
                             ?>
                            <div>
                            	@if($m == "dashboard") 
                                <h3>WHEN YOU MAKE DEPOSIT DASHBOARD IS REFRESHED<span class="trd-highlight-text"></span></h3>
                               <p>Your deposits:</p>
                               
                               @elseif($m == "deposit")
                                 <h3>Financial Support</h3>
                                 <p>Double le your investment within 24 hours guaranteed.</p>
                                 <ul class="">
                                    <li class="text-info"><span>01</span>  DEPOSIT BTC TO THE ADDRESS ABOVE (ANY AMOUNT)</li>
                                    <li class="text-info"><span>02</span> YOUR DEPOSIT WILL APPEAR IN THE TRANSACTIONS TABLE(after 2 confirmations from the network)</li>
                                    <li class="text-info"><span>03</span> Promo today : Just invest ANY AMOUNT OF BTC and you will get 0.5 BTC FREE after 1 hour.</li>
                                 </ul>
                               @endif
							</div>
							
						   </div>
						</div>
					</div>
				</div>
			</section>
			<!-- End Story Area -->
@stop