$(document).ready(function(){ 
 $("select[name=filter]").change(function(){
    var value = $("select[name=filter]").val();
    if(value =='to'){
        $("input#new_value").attr('placeholder','Enter phone number');
    }
    else if(value =='from'){
        $("input#new_value").attr('placeholder','Enter phone number');
    }
    else if(value =='name'){
        $("input#new_value").attr('placeholder','Enter First/Last Name');
    }
     else if(value =='account'){
        $("input#new_value").attr('placeholder','Corrlinks Account');
    }
    else if(value =='email'){
        $("input#new_value").attr('type','email');
        $("input#new_value").attr('placeholder','Enter Email');
    }
    else if(value =='date'){
        $("input#new_value").attr("placeholder","pick date");
        $("input#new_value").datepicker({dateFormat: 'yy-mm-dd'});
    }
    else if(value =='daterange'){
        $("input#new_value").attr("placeholder","start date");
        $("input#new_value2").attr("type","text");
        $("input#new_value2").attr("placeholder","end date");
        $("input#new_value").datepicker({dateFormat: 'yy-mm-dd'});
        $("input#new_value2").datepicker({dateFormat: 'yy-mm-dd'});
    }
    else if(value =='ref'){
        $("input#new_value").attr('placeholder','Enter Reference');
    }
    else if(value =='service'){
        $("input#new_value").attr('placeholder','(texting, pictures, texting with pictures,numbers,international)');
    }
    else if(value =='status'){
        $("input#new_value").attr('placeholder','(e.g. active, inactive ,rep)');
    }
    else if(value =='prison'){
        $("input#new_value").attr('placeholder','Enter Institution Name');
    }
    else if(value =='number'){
        $("input#new_value").attr('placeholder','Enter Local Number');
    }
    else if(value =='inmateid'){
        $("input#new_value").attr('placeholder','Enter Inmate ID');
    }
     else if(value =='balance'){
        $("input#new_value").attr('placeholder','Enter Photo Balance');
    }
 });

$("input#datepicker").datepicker({dateFormat: 'yy-mm-dd 00:00:00'});
$("input#datepicker1").datepicker({dateFormat: 'dd-mm-yy 00:00:00'});
$("input#datepicker2").datepicker({dateFormat: 'yy-mm-dd 00:00:00'});
});
 