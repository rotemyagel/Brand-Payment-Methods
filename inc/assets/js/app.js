jQuery(function($) {

    if($('.payment-method-table').length){
        $('.payment-method-table').footable({
            filtering: {
              enabled: false
            }
          });

    }

    



 // Creating a cookie after the document is ready 
    createCookie("current_visitor", JSON.stringify(payment_params), "30"); 
   
// Function to create the cookie 
function createCookie(name, value, days) { 
    var expires; 
      
    if (days) { 
        var date = new Date(); 
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000)); 
        expires = "; expires=" + date.toGMTString(); 
    } 
    else { 
        expires = ""; 
    } 
      
    document.cookie = escape(name) + "=" +  
        escape(value) + expires + "; path=/"; 
} 


  });


  
  
  