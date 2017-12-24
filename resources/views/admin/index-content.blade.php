              <!--------- Input errors -------------->
                              @if (count($errors) > 0)
                               @include('input-errors', ["errors" => $errors])
                             @endif 
                            	@if(Session::has("change-status") && Session::get("change-status") == "success")
                                    <div class="row">
                                      <div class="col-lg-12">
                                        <div class="alert alert-info alert-dismissable">
                                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                           <i class="fa fa-info-circle"></i>  <strong>Status updated successfully!</strong>
                                        </div>
                                     </div>
                                  </div>
                                  <!-- /.row -->
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

                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$totalDepositAccounts}}</div>
                                        <div>Total Deposits!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{url('admin/deposits')}}">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$totalPayoutTransactions}}</div>
                                        <div>Total Payouts!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{url('admin/payouts')}}">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Deposits</h3>
                            </div>
                            <div class="panel-body">
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
                                <div class="text-right">
                                    <a href="{{url('admin/deposits')}}">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Payouts <a class="pull-right" href="{{url('admin/add-payout')}}" style="border: 1px dashed #0f0; padding: 3px; font-style: italic;" id="add-payout">Add new payout</a></h3>
                            </div>
                            <div class="panel-body">
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
                                                 	$class = "label label-info"; $txt = "PROCESSING";
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
                                <div class="text-right">
                                    <a href="{{url('admin/payouts')}}">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->           
