                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Payouts <a class="pull-right" href="#" style="border: 1px dashed #0f0; padding: 3px; font-style: italic;" id="add-payout">Add new payout</a></h3>
                            </div>
                            <div class="panel-body">
                            	@if(Session:has("add-payout-status") && Session::get("add-payout-status") == "success")
                                    <div class="alert alert-success">
                                    	Payout added successfully!
                                    </div>
                                @endif 
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Payout #</th>
                                                <th>Date</th>
                                                <th>Wallet</th>
                                                <th>Amount</th>                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@if(isset($latestPayouts) && count($latestPayouts) > 0)
								            @foreach($latestPayouts as $p) 
                                            <tr>
                                                <td>{{$p['payout_id']}}</td>
                                                <td>{{$p['date']}}</td>
                                                <td>{{$p['wallet']}}</td>
                                                <td>&#x0E3F;{{$p['amount']}}</td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="#">View More <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->           