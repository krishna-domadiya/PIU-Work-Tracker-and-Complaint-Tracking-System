var allowsubmit = false;
$(function(){
    //on keypress 
    $('#rpassword').keyup(function(e){
        //get values 
        var pass = $('#password').val();
        var confpass = $(this).val();
        
        //check the strings
        if(pass == confpass){
            //if both are same remove the error and allow to submit
            $('.error').text('');
            allowsubmit = true;
        }else{
            //if not matching show error and not allow to submit
            $('.error').text('Password not matching');
            allowsubmit = false;
        }
    });
    
    //jquery form submit
    $('#form').submit(function(){
    
        var pass = $('#password').val();
        var confpass = $('#rpassword').val();

        //just to make sure once again during submit
        //if both are true then only allow submit
        if(pass == confpass){
            allowsubmit = true;
        }
        if(allowsubmit){
            return true;
        }else{
            alert('password and confirm password do not match');
            return false;
        }
    });
});

function myFunction() 
{
    var x = document.getElementById("password");
    var y = document.getElementById("rpassword");
    if (x.type === "password" && y.type === "password") 
    {
       x.type = "text";
       y.type = "text";

    }
    else 
    {
        x.type = "password";
        y.type = "password";
    }
}