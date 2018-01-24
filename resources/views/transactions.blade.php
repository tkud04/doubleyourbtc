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
                                    <h4>Enter your email address</h4>       
									<input type="text" name="email" placeholder="Enter your email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your email address'" required class="single-input-primary" value="{{old('email')}}"><br>
					
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
                                        	@if(isset($payouts) && isset($deposits) && count($payouts) > 0 && count($deposits) > 0)
                                             <?php $total = count($payouts) + count($deposits);  ?>
								            @for($i = 0; $i < $total; $i++) 
								             <?php
											    $type = shuffle(["deposits", "payouts"]); 
											    if($type == "payouts" && !isset($payouts[$i])) $type = "deposits";
											    else if($type == "deposits" && !isset($deposits[$i])) $type = "payouts";
											    $p = [];
											
											    if($type == "payouts"){ 
												   $p = $payouts[$i];
                                                  $tclass = "label label-success"; $ttxt = "PAYOUT";                                                  
                                                  }                                                  
												
								                else if($type == "deposit"){ 
												  $tclass = "label label-info"; $ttxt = "DEPOSIT";
												  $p = $deposits[$i];
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
                                            @endfor
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