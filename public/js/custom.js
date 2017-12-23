function submitDouble()
    {  
   var data = $("#form-double").serialize();
    
   $.ajax({
    
   type : 'POST',
   url  : "{{url('double')}}",
   data : data,
   beforeSend: function()
   { 
    $("#error").fadeOut();
    $("#working").html('<br><br><div class="alert alert-info" role="alert" style=" text-align: center;"><strong class="block" style="font-weight: bold;">  <i class = "fa fa-spinner fa-2x slow-spin"></i>  Processing.... </strong></div>');
   },
   success :  function(ret)
      {      
      var response = JSON.parse(ret);
        $("#working").hide();
        
     if(response.mode =="error"){
      $("#error").html(response.error);
      $("#error").hide();
     }
     else if(response.mode=="done-before"){
      $("#confirm-email").val(response.email);
      $("#confirm-amount").val(response.amount);
      $("#tamount").html(response.amount);
      $("#confirm-wallet").val(response.wallet);
      
      $("#notif-content").hide();
      $("#confirm-content").show();
      $("#userModal").modal("show");
     }
     else if(response.mode=="processing"){
      $("#notif").html('<div class="alert alert-info alert-dismissable"><strong class="block"> <i class="fa fa-circle"></i> &nbsp; Your payment is being processed, please check back again later.</strong></div>');
      $("#confirm-content").hide();
      $("#notif-content").show();
      $("#userModal").modal("show");
     }     
     else if(response.mode=="too-high" || response.mode=="too-low"){
      if(response.mode=="too-high"){ $("#notif").html('<div class="alert alert-warning alert-dismissable"><strong class="block"> <i class="fa fa-circle"></i> &nbsp; The highest amount you can invest is & #x0E3F;0.999</strong></div>'); }
      if(response.mode=="too-low"){ $("#notif").html('<div class="alert alert-warning alert-dismissable"><strong class="block"> <i class="fa fa-circle"></i> &nbsp; The lowest amount you can invest is & #x0E3F;0.0001</strong></div>'); }
      $("#confirm-content").hide();
      $("#notif-content").show();
      $("#userModal").modal("show");
     }
     else if(response=="first-time"){
      $("#confirm-email").val(response.email);
      $("#confirm-amount").val(response.amount);
      $("#tamount").html(response.amount);
      $("#confirm-wallet").val(response.wallet);
      
      $("#notif-content").hide();
      $("#confirm-content").show();
      $("#userModal").modal("show");
     }
     
     }
   });
    return false;
  }


function submitConfirm()
    {  
   var data = $("#form-confirm").serialize();
    
   $.ajax({
    
   type : 'POST',
   url  : "{{url('confirm')}}",
   data : data,
   beforeSend: function()
   { 
    $("#error").fadeOut();
    $("#working").html('<br><br><div class="alert alert-info" role="alert" style=" text-align: center;"><strong class="block" style="font-weight: bold;">  <i class = "fa fa-spinner fa-2x slow-spin"></i>  Processing.... </strong></div>');
   },
   success :  function(ret)
      {      
      var response = JSON.parse(ret);
        $("#working").hide();
        
     if(response.mode =="error"){
      $("#error").html(response.error);
      $("#error").hide();
     }
     else if(response.mode=="paid"){
      $("#notif").html('<div class="alert alert-success alert-dismissable"><strong class="block"> <i class="fa fa-circle"></i> &nbsp; Your payment has been sent to your wallet.</strong></div>');
      $("#confirm-content").hide();
      $("#notif-content").show();
      $("#userModal").modal("show");
     }     
    else if(response.mode=="processing"){
      $("#notif").html('<div class="alert alert-info alert-dismissable"><strong class="block"> <i class="fa fa-circle"></i> &nbsp; Your payment is being processed, please check back again later.</strong></div>');
      $("#confirm-content").hide();
      $("#notif-content").show();
      $("#userModal").modal("show");
     }     
     else if(response.mode=="invalid"){
      $("#notif").html('<div class="alert alert-warning alert-dismissable"><strong class="block"> <i class="fa fa-circle"></i> &nbsp; Invalid transaction</strong></div>');
      $("#confirm-content").hide();
      $("#notif-content").show();
      $("#userModal").modal("show");
     }
     
     }
   });
    return false;
  }
    
    
    
   $(document).ready(function(){ 
  $("#form-double").submit(function(e){
  	e.preventDefault();
     submitDouble();
  });
  
    $("#form-confirm").submit(function(e){
  	e.preventDefault();
     submitConfirm();
  });
});