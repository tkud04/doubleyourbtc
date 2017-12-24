            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
        <!--Modal box-->
    <div class="modal fade" id="changeStatusModal" role="dialog">
      <div class="modal-dialog modal-sm">
      
        <!-- Modal content no 1-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center form-title">Change Deposit Status</h4>
          </div>
          <div class="modal-body padtrbl">

            <div class="login-box-body">
              <p class="">Change status for deposit number <span id="dep-num-display"></span></p>                  
              <div class="form-group">
                <form name="" method="post" action="{{url('admin/change-deposit-status')}}">
                	<input type="hidden" id = "token" name="_token" value="{{ csrf_token() }}">
                	<input type="hidden" id = "dep-num" name="dep-num" value="">
                 <div class="form-group has-feedback"> <!----- username -------------->
                      <label>Status*</label>
                      <select class="form-control" name="status">
                      	<option value="none">Select new status</option>
                          <option value="active">Active</option>
                          <option value="pending">Pending</option>
                      </select>                    
                  </div>
                  <div class="row">
     
                      <div class="col-xs-12">
                          <button type="submit" class="btn btn-green btn-block btn-flat">Submit</button>
                      </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!--/ Modal box-->
    
    <!--Modal box-->
    <div class="modal fade" id="changePayoutStatusModal" role="dialog">
      <div class="modal-dialog modal-sm">
      
        <!-- Modal content no 1-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center form-title">Change Payout Status</h4>
          </div>
          <div class="modal-body padtrbl">

            <div class="login-box-body">
              <p class="">Change status for payout number <span id="pay-num-display"></span></p>                  
              <div class="form-group">
                <form name="" method="post" action="{{url('admin/change-payout-status')}}">
                	<input type="hidden" id = "token" name="_token" value="{{ csrf_token() }}">
                	<input type="hidden" id = "pay-num" name="pay-num" value="">
                 <div class="form-group has-feedback"> <!----- username -------------->
                      <label>Status*</label>
                      <select class="form-control" name="status">
                      	<option value="none">Select new status</option>
                          <option value="processing">Processinh</option>
                          <option value="paid">Paid</option>
                      </select>                    
                  </div>
                  <div class="row">
     
                      <div class="col-xs-12">
                          <button type="submit" class="btn btn-green btn-block btn-flat">Submit</button>
                      </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!--/ Modal box-->
    
    
    <!--Modal box-->
    <div class="modal fade" id="addPayoutModal" role="dialog">
      <div class="modal-dialog modal-sm">
      
        <!-- Modal content no 1-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center form-title">Add New Payout</h4>
          </div>
          <div class="modal-body padtrbl">

            <div class="login-box-body">
              <p class="">Add new profit payout to the system </p>             
              <div class="form-group">
                <form name="" method="post" action="{{url('admin/add-payout')}}">
                	<input type="hidden" id = "token" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group has-feedback">
                      <label>Email *</label>
                      <input class="form-control" type="text" name="email" placeholder="Email address.." required>                  
                  </div>
                 <div class="form-group has-feedback">
                      <label>Wallet *</label>
                      <input class="form-control" type="text" name="wallet" placeholder="Wallet address.." required>                  
                  </div>
                  
                 <div class="form-group has-feedback">
                      <label>Amount (&#x0E3F;) *</label>
                      <input class="form-control" type="text" name="amount" placeholder="Amount.." required>                              
                  </div>                  
                  <div class="row">
     
                      <div class="col-xs-12">
                          <button type="submit" class="btn btn-green btn-block btn-flat">Submit</button>
                      </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!--/ Modal box-->
