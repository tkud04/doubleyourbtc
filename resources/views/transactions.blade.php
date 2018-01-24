@extends("layout")

@section('title',"Transactions")

@section('content') 
<section class="banner-area" style="z-index:200;"><br><br><br><br><br></section>
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
                     
                     @if($status == "find") 
                               <form method="post" action="{{url('transactions')}}">
									<img src = "{{asset('img/loading.gif')}}" width="70" height="70" class="img img-responsive loading-gif">
									{{ csrf_field() }}   
                                    <h4>Enter your wallet address</h4>       
									<input type="text" name="wallet" placeholder="Enter your wallet address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your wallet address'" required class="single-input-primary" value="{{old('wallet')}}"><br>
					
									<button type="submit" class="genric-btn primary radius">Submit</button>
								</form>
					@elseif($status == "view")
					        <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Amount</th>                                             
                                                <th>Status</th>    
                                                <th>Date</th>               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@if(isset($ret) && count($ret) > 0)
								            @foreach($ret as $p) 
								             <?php
								                 $types = ["deposits", "payouts"];
											    $type = shuffle($types); 
											    if(isset($p["deposit_id"])) $type = "deposits";
											    else if(isset($p["payout_id"])) $type = "payouts";
											
											    if($type == "payouts"){ 
												   
                                                  $tclass = "label label-success"; $ttxt = "PAYOUT";                                                  
                                                  }                                                  
												
								                else if($type == "deposits"){ 
												  $tclass = "label label-info"; $ttxt = "DEPOSIT";
												
											    } 
											
											    $sclass = ""; $stxt = ""; $sn = "";
                                                   if($p['status'] == "processing"){
                                                 	$sclass = "label label-info"; $stxt = "PROCESSING";
                                                   }
                                             
                                                  else if($p['status'] == "paid"){
                                                	$sclass = "label label-success"; $stxt = "PAID";
                                                 } 
                                                 
                                                 else if($p['status'] == "pending"){
                                                 	$sclass = "label label-warning"; $stxt = "PENDING";
                                                   }
                                             
                                                  else if($p['status'] == "active"){
                                                	$sclass = "label label-success"; $stxt = "ACTIVE";
                                                  }
                                             ?>
                                            <tr>
                                                <td><span class="{{$tclass}}">{{$ttxt}}</span></td>
                                                <td>&#x0E3F;{{$p['amount']}}</td>
                                                <td><span class="{{$sclass}}">{{$stxt}}</span></td>                                              
                                                <td>{{$p['date']}}</td>
                                            </tr>
                                            @endforeach
                                            @else
                                              <div class="alert alert-info">No data available</div>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
					@endif
                           <br>
						   </div>
					   </div>
					</div>
				</div>
			</section>
			<!-- End Story Area -->
@stop