$( document ).ready( function() {
      //var d= new Date();

        $('#wterm').wterm( {  PS1: '>', WIDTH: '100%', HEIGHT: '100%', WELCOME_MESSAGE: 'Welcome Defender<br>====================<br> webserver you need to defend is "hackmeifyoucan!.com"<br>Type \'help\' to begin ',AUTOCOMPLETE:false });
      });


       var command_directory = {
         
       
         
        
         'cls': function( tokens ) {
      $('.undefined').html('');
    },
         'r': function( tokens ) {
      window.location.reload(); 
    },
        
      };


      for( var j in command_directory ) {
        $.register_command( j, command_directory[j] );
      }

      $.register_command( 'help', function() {
        return '<pre>Please use the following commands:<br>  man             Shows how to use a command <br>  nmap            scans the webserver to find the running services on webserver<br>  Vulnerability   Searchs the existing vulnerability for specified service from internet<br>  aSearch         Searchs for a patch to update the vulnerability from internet<br>  use_update      Sets the patch to be used to update the vulnerability  <br>  update          Patches the vulnerability for specified service <br>  change          changes the vulnerability you want to patch <br>  cls             Clears the screen<br> ';

      });
