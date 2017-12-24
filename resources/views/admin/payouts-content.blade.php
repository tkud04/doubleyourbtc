                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Payouts <a class="pull-right" href="#" style="border: 1px dashed #0f0; padding: 3px; font-style: italic;" id="add-payout">Add new payout</a></h3>
                            </div>
                            <div class="panel-body">
                            	<!--------- Input errors -------------->
                              @if (count($errors) > 0)
                               @include('input-errors', ["errors" => $errors])
                             @endif 
                            	@if(Session::has("add-payout-status") && Session::get("add-payout-status") == "success")
                                    <div class="row">
                                      <div class="col-lg-12">
                                        <div class="alert alert-info alert-dismissable">
                                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                           <i class="fa fa-info-circle"></i>  <strong>Payout added successfully!</strong>
                                        </div>
                                     </div>
                                  </div>
                                  <!-- /.row -->
                                @endif        
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Payout #</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Email</th>
                                                <th>Wallet</th>
                                                <th>Amount</th>    
                                                <th>Action</th>               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@if(isset($latestPayouts) && count($latestPayouts) > 0)
								            @foreach($latestPayouts as $p) 
                                            <tr>
                                                <td>{{$p['payout_id']}}</td>
                                                <?php
                                                   $class = ""; $txt = ""; $sn = "";
                                                   if($p['status'] == "processing"){
                                                 	$class = "label label-ibfo"; $txt = "PROCESSING";
                                                   }
                                             
                                                  else if($p['status'] == "paid"){
                                                	$class = "label label-success"; $txt = "PAID";
                                                  }
                                                  
                                                ?>
                                                <td><span class="{{$class}}">{{$txt}}</span></td>
                                                <td>{{$p['date']}}</td>
                                                <td>{{$p['email']}}</td>
                                                <td>{{$p['wallet']}}</td>
                                                <td>&#x0E3F;{{$p['amount']}}</td>
                                                <td><a href="#" data-id="{{$p['payout_id']}}" class="btn btn-danger shepeteri">Change status</a></td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->           