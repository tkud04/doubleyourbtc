                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Deposits</h3>
                            </div>
                            <div class="panel-body">
                            	@if(Session:has("change-status") && Session::get("change-status") == "success")
                                    <div class="alert alert-success">
                                    	Deposit status updated successfully!
                                    </div>
                                @endif                             	
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Deposit #</th>
                                                <th>Date</th>
                                                <th>Wallet</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@if(isset($latestDeposits) && count($latestDeposits) > 0)
								            @foreach($latestDeposits as $d) 
                                            <tr>
                                                <td>{{$d['deposit_id']}}</td>
                                                <td>{{$d['date']}}</td>
                                                <td>{{$d['wallet']}}</td>
                                                <td>&#x0E3F;{{$d['amount']}}</td>
                                                <?php
                                                   $class = ""; $txt = "";
                                                   if($d['status'] == "pending"){
                                                 	$class = "badge badge-warning"; $txt = "PENDING";
                                                   }
                                             
                                                  else if($d['status'] == "active"){
                                                	$class = "badge badge-success"; $txt = "ACTIVE";
                                                  }
                                                ?>
                                                <td><span class="{{$class}}">{{$txt}}</span></td>
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