<!-- Start Footer Widget Area -->
			<section class="footer-widget-area">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<div class="single-widget d-flex flex-wrap justify-content-between">
								<div class="icon d-flex align-items-center justify-content-center">
									<span class="fa fa-money"></span>
								</div>
								<div class="desc">
									<h6 class="title text-uppercase">Instant Payment</h6>
									<p>At DoubleYourBTC everything is automated. We are using fast and reliable VPS Cloud Hosting so our server can handle everything, so there are no delays in our system.</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="single-widget d-flex flex-wrap justify-content-between">
								<div class="icon d-flex align-items-center justify-content-center">
									<span class="fa fa-calendar"></span>
								</div>
								<div class="desc">
									<h6 class="title text-uppercase">100% Profit in 48 hours</h6>
									<p>You get double of what you donate within 48 hours. No storirs, no delayed transactions. This is why thousands of users from all around the globe visit our site today. Just check our statistics and profit payouts and see for yourself.</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="single-widget d-flex flex-wrap justify-content-between">
								<div class="icon d-flex align-items-center justify-content-center">
									<span class="fa fa-support"></span>
								</div>
								<div class="desc">
									<h6 class="title text-uppercase">100% Support</h6>
									<p>We'd like to hear from you! You can contact us through the following channels below. Please note that international call rates apply.</p>
									<div class="contact">
										<i class="fa fa-phone"></i> Telephone: <a href="tel:5132792867">(513) 279-2867</a> <br>
										<i class="fa fa-envelope"></i> Email address: <a href="mailto:info@doubleyourbtc.com">info@doubleyourbtc.com</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End Footer Widget Area -->
			<!-- Start footer Area -->
			<footer>
				<div class="container">
					<div class="footer-content d-flex justify-content-between align-items-center flex-wrap">
						<div class="logo">
							<img src="{{asset('img/newlogo.png')}}" alt="" width="100" height="30">
						</div>
						<div class="copy-right-text">Copyright &copy; 2017  |  All rights reserved to DoubleYourBTC Inc. Built by <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">DoubleYourBTC</a></div>
						<div class="footer-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-instagram"></i></a>
						</div>
					</div>
				</div>
			</footer>
			<!-- End footer Area -->
				
			<!--Modal box-->
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-sm" role="document">
      
        <!-- Modal content no 1-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <center><h4 class="modal-title text-center form-title">Confirm Payment</h4></center>
          </div>
          <div class="modal-body padtrbl">
            
              
            <!-- content 2-->
            <div id="confirm-content" style="">
               <h5>Request was successful!</h5> 
                                     <p>Your deposit is marked as <strong>PENDING</strong> until your payment is confirmed</p>
									 <p>For your payment to be confirmed, send &#x0E3F;<span id="tamount"></span> to our Bitcoin wallet: <br><center><h6>1EmRKUyBUY4eqcV8vRZ6BtYiH7AU9xLrkq</h6></center></p>
									 <p>Once your payment has been confirmed 3 times by the blockchain your deposit will be marked as <strong>ACTIVE</strong> you will receive an email from us containing your verification code. Enter the code below to double your bitcoins!</p><br>
									<p style="color: #f00;">NOTE: If you have not received your verification code, please be patient. If you truly sent bitcoins to the above address and the transaction is confirmed 3 times, you will get the code.</p>
              <div class="form-group">
              	<div id="error"></div><br>
                               <div id="working"></div>
                <form id="form-confirm">
                	<img src = "{{asset('img/loading.gif')}}" width="70" height="70" class="img img-responsive loading-gif">
                     {{ csrf_field() }}   
                	<input type="hidden" id = "confirm-email" name="email" value="">
                	<input type="hidden" id = "confirm-amount" name="amount" value="">
                	<input type="hidden" id = "confirm-wallet" name="profit_wallet" value="">
                 <div class="form-group has-feedback"> <!----- username -------------->
                      <label>Verification Code*</label>
                      <input type="text" class="form-control" name="status_number" placeholder="Verification code.."> 
                  </div>
                  <div class="form-group has-feedback"> <!----- username -------------->
                      <label>Your wallet address*</label>
                      <input type="text" class="form-control" name="wallet" placeholder="Wallet address (we'll send profits here)"> 
                  </div>
                  <div class="row">     
                      <div class="col-xs-12">
                          <button type="submit" class="btn btn-green btn-block btn-flat">Submit</button>
                      </div>
                  </div>
                </form>
              </div>
            </div>
            
            <!-- content 3-->
            <div id="notif-content">
              <p class="">Notification</p>                  
              <div class="jumbotron" id="notif">
              
              <br><button class="btn btn-primary notif-close">Close</button>
              </div>
            </div>
            
          </div>         
        </div>
        <!-- /Modal content no 1-->

      </div>
    </div>
    <!--/ Modal box-->