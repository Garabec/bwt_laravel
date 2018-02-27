$(document).on('click', '#new_tag', function(e) {
    
    e.preventDefault();
    
    var block=$("#tag").clone();
    var num=parseInt($("#new_tag").data('num'))+1;
    
    if(typeof $("#new_tag").data('num') == 'undefined'){
        
    var num=0;    
    }else {
        
    var num=parseInt($("#new_tag").data('num'))+1;    
        
    }
    
    console.log(num,parseInt($("#new_tag").data('num')),typeof $("#new_tag").data('num'));
    
    block.find('input').attr("name","tag[]");
    
    block.find('input').removeAttr("disabled");
    
    block.attr('id',"tag-"+num)
    
    block.find("#del").attr("data-id",num);
    block.find("#add").attr("data-id",num);
    
    $("#new_tag").data("num",num)
                            
    block.show();
    
    $("#button_tag").after(block);
    
    
    
})

$(document).on('click', '#del', function(e) {
    
    e.preventDefault();
    
   var id= parseInt($(this).data('id'));
    
  $("#tag-"+id).remove();
    
})

$(document).on('click', '#add', function(e) {
    
    e.preventDefault();
    
   var id= parseInt($(this).data('id'));
    
  $("#tag-"+id).find('input').val($("#tag-"+id).find('select').val());
    
})


$(document).on('click', '#button_user_edit', function(e) {
    
    e.preventDefault();
    
    $("#confirm-password").show();
    $("#password").show();
    
    $("#button-block").hide();
    
    
    
})




 $(document).ready(function() {
     
     
 
     
     
     
     
 $("form").validate({
              submitHandler: function(form) {
    form.submit();
  },
  ignore: [],
             
           rules: {   
            name: {
              required: true,
              minlength: 4,
              maxlength: 100,
            },
            price:  {
              required: true,
              number: true,
              
            },
            description: {
              required: true,
              minlength: 4,
              maxlength: 1000,
            },
            
            role: {
              required: true,
            },
             email: {
              required: true,
              email: true,
            },
            
            
            "tag[]":"required"
            
            
           },
            // messages: {
            //   name: {
            //              required: "Please enter your firstname",
            //              min: "Enter at least {0} characters",
            //              max: jQuery.format("{0} is already in use")
            // },  
            //   firstname: "Please enter your firstname",
            //   lastname: "please enter your",
            //   post_town: "please enter your town",
            //   postcode: "please enter your postcode",
            //   moile: "please enter your mobile number"
            // }
          });
         });
         
   function confirmDelete(){
    if ( confirm("Вы действительно хотите удалить?") ){
        return true;
    } else {
        return false;
    }
}
