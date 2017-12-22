<!-- Start Feature Area -->
			<section class="featured-area">
				<div class="container">
					<div class="row">
						<center>
							<div class="col-md-6">
								<img class="img img-responsive" src="{{asset('img/dc.png')}}" alt="DoubleYourBTC 24 Hours Instant Payment"><>
                            </div>
                        </center>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="single-feature d-flex flex-wrap justify-content-between">
								<div class="icon d-flex align-items-center justify-content-center">
									<span class="lnr lnr-sun"></span>
								</div>
								<div class="desc">
									<h6 class="title text-uppercase">24 Hours</h6>
									<p>Instant payment after 24 hours. <br> Min - &#x0e3f;0.001 | Max - &#x0e3f;0.9999</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="single-feature d-flex flex-wrap justify-content-between">
								<div class="icon d-flex align-items-center justify-content-center">
									<span class="lnr lnr-code"></span>
								</div>
								<div class="desc">
									<h6 class="title text-uppercase">{{$totalDeposit}} BTC</h6>
									<p>Total Deposit <br>{{$totalDepositAccounts}} Total accounts</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="single-feature d-flex flex-wrap justify-content-between">
								<div class="icon d-flex align-items-center justify-content-center">
									<span class="lnr lnr-clock"></span>
								</div>
								<div class="desc">
									<h6 class="title text-uppercase">{{$totalPayout}} BTC</h6>
									<p>Total Paid<br>{{$totalPayoutTransactions}}  Total paid transactions</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End Feature Area -->