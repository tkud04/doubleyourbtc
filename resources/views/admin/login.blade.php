@include("admin.index-header")

        <div id="page-wrapper">

            <div class="container-fluid">
            	<div class="row">
            	   <center>
            	   <div class ="col-md-8">
            	     <h2 class="">Login</h2>
            <!--------- Input errors -------------->
                    @if (count($errors) > 0)
                          @include('input-errors', ["errors" => $errors])
                     @endif  
                     
               @if(Session::has("login-status") && Session::get("login-status") == "fail") 
                 <div class="alert alert-danger">Invalid username or password. Please try again.</div>
               @endif
              <div class="form-group">
                <form name="" method="post" action="{{url('admin')}}">
                	<input type="hidden" id = "token" name="_token" value="{{ csrf_token() }}">
                 <div class="form-group has-feedback"> <!----- username -------------->
                      <label>Username*</label>
                      <input type="text" class="form-control" name="username" placeholder="Enter your username" required value="{{old('username')}}">       
                  </div>
                  <div class="form-group has-feedback"> <!----- username -------------->
                      <label>Password*</label>
                      <input type="password" class="form-control" name="pass" placeholder="Enter your password" required>       
                  </div>
                  <div class="row">
     
                      <div class="col-xs-12">
                          <button type="submit" class="btn btn-green btn-block btn-flat">Submit</button>
                      </div>
                  </div>
                </form>
                   </div>
                   </center>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
@include("admin.html-footer")