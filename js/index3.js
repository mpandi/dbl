 $(document).ready(function(){
    $("button.button").click(function(){
    var form_id = 'form#'+ $(this).attr('id');
     $.post( "process.php",$(form_id).serialize(),
       function(data) {
         $('.success').text(data);
             }
     );
     return false;
  });
});
 