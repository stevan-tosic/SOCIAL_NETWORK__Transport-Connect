$(document).ready(function(){
  $("#login").click(function(){ // navigation link with value login
    $("#div1").load('/account/create', function() {
      $('form#regForm').on('submit', function(){


/*******  Get Action and Method from regular Form Atributes  ****************************/
        
        var form    = $(this),
            url     = form.attr('action'),
            method  = form.attr('method'),
            data    = {};

/****************************************************************************************/
/* Finding all inputs with name atribute and making JSON array with name:value relation */        
/****************************************************************************************/
        form.find('[name]').each(function(index, value) {
        var form    = $(this),
            name    = form.attr('name'),
            value   = form.val();

        data[name]  = value;
        });

/****************************************************************************************/
/*******  JS Form Validation  ***********************************************************/

        var val_err = $('.regResponse');
        var error   = false;
                
        if (data['password'] !== data['pass_again']) {
          val_err.html('Your password are not matched!');
          error = true;
        }
        if (data['password'].length < 6) {
          val_err.html('Password is too weak, it must contain at least 6 character');
          error = true;
        }
        if (data['email'].indexOf('@') === -1) {
          val_err.html('Incorect Email');
          error = true;
        }
        if (data['username'].length < 4) {
          val_err.html('Username must be at least 4 character');
          error = true;
        }
        if (data['lName'].length < 3) {
          val_err.html('Check your Last name ');
          error = true;
        }
        if (data['fName'] === '' || data['fName'].length < 3){
          val_err.html('You must enter first name');
          error = true;
        }
        if(error === true) {
          val_err.stop().fadeIn(400).delay(1400).fadeOut(800);
          return false;

/*****************************************************************************************/          
        } else {
          $('#form').fadeOut(0).delay(400).fadeIn(function(){ // hiding form if data is submited
          $('#reg_form').fadeOut(0);
          $('#Succes_msg_reg').html('Please wait. . . <br>We are processing your data. . . <br><br><img src="images/loading-bar-big.gif">');

/*******  Sending form data to php file via AJAX  ****************************************/

          $.ajax({
            url: url,
            type: method,
            data: data,
            success: function(response) {
              if (response = '1') {
                $('#Succes_msg_reg').html('Thanks for registering! You got one more step, we are sent activational mail to you, please activate your acount.').css("color", "LimeGreen");
                setTimeout(function(){
                  window.location.href = '/';
                }, 3000);
              } else {
                $('#Succes_msg_reg').html('Whoops. . . <br>Something went wrong!').css("color", "red");
              }
             }
            });
/******************************************************************************************/          
          });
        }
        return false;
      }); 

      $('form#log_form').on('submit', function(){

        var form    = $(this),
            url     = form.attr('action'),
            method  = form.attr('method'),
            data    = {};


        form.find('[name]').each(function(index, value) {
        var form    = $(this),
            name    = form.attr('name'),
            value   = form.val();

        data[name]  = value;
        });

        var val_err = $('.logResponse');
        var error   = false;

        if (data['logPass'].length < 6) {
          val_err.html('Password is too weak, it must contain at least 6 character');
          error = true;
        }
         if (data['logPass'] === '') {
          val_err.html('You must enter a password');
          error = true;
        }
        if (data['logUsername'].length < 4) {
          val_err.html('Username must be at least 4 character');
          error = true;
        }
        if (data['logUsername'] === '') {
          val_err.html('You must enter username!');
          error = true;
        }
        if(error === true) {
        val_err.stop().fadeIn(400).delay(1400).fadeOut(800);
        return false;
        } else {
          $('#form').fadeOut(0).delay(400).fadeIn(function(){
          $('#log_form').fadeOut(0);
          $('#Succes_msg_log').html('Please wait. . . <br>We are processing your data. . . <br><br><img src="images/loading-bar-big.gif">');
 
          
          $.ajax({
            url: url,
            type: method,
            data: data,
            success: function(response) {
            if (response = '1') {
              $('#Succes_msg_log').html('Loged in!');
              location.href = '/home';
            } else {
              $('#Succes_msg_log').html('Whoops. . . <br>Something went wrong!').css("color", "red");
              }
             }
            });          
          });
         }        
        return false;
      }); 
    });    
  });
});