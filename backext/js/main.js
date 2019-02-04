$('#register').submit(function(e){ // if #register form submits
    e.preventDefault(); // prevent default function of form submit
    console.log("form submitted");
    $.ajax({
        type: 'POST',
        url: 'processRegister.php',
        data: $(this).serialize(), 
        success: function(response) { // if success return response from checkLogin.php
            alert(response);
        }
    });
});