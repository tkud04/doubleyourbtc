$(document).ready(function(){
   $('a.shabba').click(function(e){
      depNum = $(this).attr("data-id");
      console.log(depNum);
      $('#dep-num-display').html(depNum);
      $('#dep-num').val(depNum);
      
      $('#changeStatusModal').modal("show");
      e.preventDefault();
   });
   
   $('#add-payout').click(function(e){
      $('#addPayoutModal').modal("show");
      e.preventDefault();
   });
});