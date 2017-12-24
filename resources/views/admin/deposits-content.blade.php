                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Deposits</h3>
                            </div>
                            <div class="panel-body">
                            <!--------- Input errors -------------->
                              @if (count($errors) > 0)
                               @include('input-errors', ["errors" => $errors])
                             @endif 
                            	@if(Session::has("change-status") && Session::get("change-status") == "success")
                                    <div class="row">
                                      <div class="col-lg-12">
                                        <div class="alert alert-info alert-dismissable">
                                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                           <i class="fa fa-info-circle"></i>  <strong>Deposit status updated successfully!</strong>
                                        </div>
                                     </div>
                                  </div>
                                  <!-- /.row -->
                                @endif        
                        	
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Deposit #</th>
                                                <th>Status</th>
                                                <th>Status #</th>
                                                <th>Date</th>
                                                <th>Email</th>
                                                <th>Wallet</th>
                                                <th>Amount</th>                                              
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@if(isset($latestDeposits) && count($latestDeposits) > 0)
								            @foreach($latestDeposits as $d) 
                                            <tr>
                                                <td>{{$d['deposit_id']}}</td>
                                                <?php
                                                   $class = ""; $txt = ""; $sn = "";
                                                   if($d['status'] == "pending"){
                                                 	$class = "label label-warning"; $txt = "PENDING";
                                                   }
                                             
                                                  else if($d['status'] == "active"){
                                                	$class = "label label-success"; $txt = "ACTIVE";
                                                  }
                                                  
                                                  if($d['status_number'] == "") $sn = "none";
                                                  else $sn = $d['status_number'];
                                                ?>
                                                <td><span class="{{$class}}">{{$txt}}</span></td>
                                                <td><span class="">{{$sn}}</span></td>
                                                <td>{{$d['date']}}</td>
                                                <td>{{$d['email']}}</td>
                                                <td>{{$d['wallet']}}</td>
                                                <td>&#x0E3F;{{$d['amount']}}</td>
                                                
                                                <td><a href="#" data-id="{{$d['deposit_id']}}" class="btn btn-danger shabba">Change status</a></td>
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