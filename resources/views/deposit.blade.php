@extends("layout")

@section('title',"Deposit")

@section('content') 
<section class="banner-area">DoubleYourBTC<br><br><br></section>
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
                               <div> <img src="https://blockchain.info/qr?data=1EmRKUyBUY4eqcV8vRZ6BtYiH7AU9xLrkq&amp;size=150"></div><br><br>
								<strong style="color:green">
                                    1EmRKUyBUY4eqcV8vRZ6BtYiH7AU9xLrkq</strong><br><strong style="color:#000080">Min: ANY AMOUNT , Max: ANY AMOUNT<br><br></strong>		
      							<b><a href="bitcoin:1EmRKUyBUY4eqcV8vRZ6BtYiH7AU9xLrkq">Click here to make deposit</a></b><br><br>
                                <p><img src="{{asset('img/loading-blue.gif')}}" width="40"><br>
	                                <b>STATUS:</b> Waiting for deposit...<br>
									( 0 / 2 confirmations )
                                </p><br><br>        
                                <div>                  
                                 <h3>Financial Support</h3>
                                 <p>Double your investment within 24 hours guaranteed.</p>
                                 <ul class="">
                                    <li class="text-info"><span>01</span>  DEPOSIT BTC TO THE ADDRESS ABOVE (ANY AMOUNT)<hr></li>
                                    <li class="text-info"><span>02</span> YOUR DEPOSIT WILL APPEAR IN THE TRANSACTIONS TABLE(after 2 confirmations from the network) <hr></li>
                                    <li class="text-info"><span>03</span> Promo today : Just invest ANY AMOUNT OF BTC and you will get 0.5 BTC FREE after 1 hour <hr></li>
                                 </ul>
							  </div>
						   </div>
					   </div>
					</div>
				</div>
			</section>
			<!-- End Story Area -->
@stop