$(document).ready(function(){ 
 $('input[type="checkbox"]').click(function(){
    var name = $(this).attr('name'),
        id = '#'+name;
     if($(this).is(":checked")){           
        $(id).attr('required','required');
        }
     else if($(this).is(":not(:checked)")){
       $(id).removeAttr("required");
       $(id).val("");
        }
     });
 $('input[type="number"]').keyup(function(){
    var name = $(this).attr('id'),
        value = $(this).val(),
        checkbox = '.'+name;
     if(value === ''){  
        $(checkbox).removeAttr("checked");
        $(this).removeAttr("required"); 
          }
     else{      
       $(checkbox).prop("checked","checked");
       $(this).attr('required','required');
        }
     }); 
$(".chosen-select").chosen(); 
});
 