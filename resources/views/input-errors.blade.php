                    <div class="alert alert-danger alert-dismissible" role="alert" style="margin-top: 60px; !important">
                       <p><strong>Whoops!</strong> There were some problems with your input.</p>
                       <button class="close" data-dismiss="alert">x</button>
                       <div class="clearfix"></div>
                       <br><br>
                       <ul>                       	
                       	@foreach ($errors->all() as $error)
                              @if($error == "The g-recaptcha-response field is required.")
							    <li>You must fill the captcha to continue.</li>
						      @else
						        <li>{{ $error }}</li>
						      @endif
						   @endforeach
                       </ul>
                     </div>