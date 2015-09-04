
$( document ).ready( function() {
       

       
      function sendValue(stage){
      
      

        $.ajax({
          type:"post",
          url:"hacker_point",
          data:"stage="+stage+"&action=addstage",
          success:function(data){
                               $("#stage").html(data);
                                  
                              }
        });
      }

      function checkStage(callback,stage){
      
      var resp;

        $.ajax({
          type:"post",
          url:"hacker_point",
          data:"stage="+stage+"&action=checkstage",
          success:function(data){
                                resp=data;
                                callback(resp);
                               
                                  
                              }
        });
        
      }

      function sendScore(score){
      
      

        $.ajax({
          type:"post",
          url:"hacker_point",
          data:"score="+score+"&action=addscore",
          success:function(data){
                               $("#varun").html(data);
                                  
                              }
        });
      }
      var check=0;
      var score=0 ; 
      var stage=0 ;
      var vulnerability=0;
       var command_directory = {

         
          'nmap': function( tokens ) {
           tokens.length
           var dirname = tokens[1];
           if(tokens.length == 1 || dirname == ''){
               return 'Unavailable format.<br>Example: nmap webserver';
           }else{
              switch (dirname){
                  case 'hackmeifyoucan!.com':
                  
                  if(stage==0)
                  {
                    stage+=1;
                    score +=40;
                    sendScore(score);
                      return '<br>Starting Nmap 6.47 ( http://nmap.org ) <br>Nmap scan report for hackmeifyoucan!.com <br>Host is up (0.000011s latency).<br>Not shown: 995 closed ports<br>PORT     STATE SERVICE<br>21/tcp   open  ftp<br>80/tcp   open  http<br>443/tcp  open  https<br>902/tcp  open  iss-realsecure<br>5432/tcp open  postgresql<br>Nmap done: 1 IP address (1 host up) scanned in 0.32 seconds';
                  }
                  else 
                   return "can't follow this step";                  
                   //sendValue('chandfna');
                
                  break;
                  
                  default:
                  return 'target not specified correctly';
              }
           }
           

         },

         'vulnerability': function( tokens){
          tokens.length
          var service_name =tokens[1];
          if(tokens.length==1|| service_name==''){
            return 'Unavailable format.<br>Example: vulnerability service';
          }
          else if(service_name=='ftp'){
            if(stage==1)
            {
              stage+=1;
              score +=400;
              vulnerability=1;
              sendScore(score);
              return 'CVE-2010-5431';
            }
            else 
                   return "can't follow this step";                  
            
            
            
          }
          else if(service_name=='iss-realsecure')
          {

            if(stage==1)
            {
              stage+=1;
              score +=1000;
              vulnerability=2;
              sendScore(score);
              return 'CVE-2012-612';
            }
            else 
                   return "can't follow this step";                  
            
          }
          else if(service_name=='postgresql')
          {
              if(stage==1)
            {
              stage+=1;
              score +=600;
              vulnerability=3;
              sendScore(score);
              return 'CVE-2013-7812';
            }
            else 
                   return "can't follow this step";                              
              
          }
          else
          {
              return 'No vulnerability Exists for this service';
          }
         },
         
         'eSearch': function( tokens){
          tokens.length
          var cve_id =tokens[1];
          if(tokens.length==1 || cve_id==''){
            return 'Unavailable format.<br>Example: eSearch CVE-ID';

          }
          else if(cve_id=='CVE-2010-5431'){
            if(stage==2)
            {
              stage+=1;
              score +=100;
              sendScore(score);
              return 'auxiliary/scanner/ftp/anonymous';
            }
            else 
                   return "can't follow this step";                  
            
          }
          else if(cve_id=='CVE-2012-612'){
            if(stage==2)
            {
              stage+=1;
              score +=100;
              sendScore(score);
              return 'auxiliary/scanner/vmware/vmauthd_login';
            }
            else 
                   return "can't follow this step";                  
            
          }
          else if (cve_id=='CVE-2013-7812') {
            //score +=100;
            //sendScore(score);
            if(stage==2)
            {
              stage+=1;
              score +=100;
              sendScore(score);
              return 'exploit/windows/postgres/postgres_payload';
            }
            else 
                   return "can't follow this step";                  
            
          }
          else{
            return 'Wrong CVE-ID';
          }
         },
         
          'use_exploit': function( tokens){
          tokens.length
          var exploit_name =tokens[1];
          if(tokens.length==1|| exploit_name==''){

            return 'Unavailable format.<br>Example: use_exploit exploit_name';
          }
          else if(exploit_name=='auxiliary/scanner/ftp/anonymous'||exploit_name=='auxiliary/scanner/vmware/vmauthd_login'||exploit_name=='exploit/windows/postgres/postgres_payload'){
              //score +=50;
              //sendScore(score);
             if(stage==3)
            {
              stage+=1;
              score +=50;
              sendScore(score);
              return 'exploit is used';
            }
            else 
                   return "can't follow this step";                  
              
          }
          else{
            return 'Specify the exploit correctly';
          }
         },

         'set_target': function( tokens){
          tokens.length
          var target_name =tokens[1];
          if(tokens.length==1|| target_name==''){
            return 'Unavailable format.<br>Example: set_target webserver';
          }
          else if(target_name=='hackmeifyoucan!.com'){
            //score +=30;
            //sendScore(score);
            if(stage==4)
            {
              stage+=1;
              score +=30;
              sendScore(score);
              return 'Target set ';
            }
            else 
                   return "can't follow this step";                  
            
          }
          else{
            return 'Target not set try again!!';
          }
         },
         
         'set_port': function( tokens){
          tokens.length
          var port =tokens[1];
          if(tokens.length==1|| port==''){
            return 'Unavailable format.<br>Example: nmap 34';
          }
          else if(port=='21'||port=='902'||port=='5432')
          {
            if(stage==5)
            {
              stage+=1;
              score +=30;
              sendScore(score);
              return 'port is set';
            }
            else 
                   return "can't follow this step";                  
            //score +=30;
            //sendScore(score);
            
          }
          else{
            return 'Port is not set try again!! ';
          }
         },

        
         'exploit': function( tokens){
          tokens.length
          var state =tokens[1];
          if(tokens.length==1|| state==''){
            return 'Unavailable format.<br>Example: exploit start';
          }
          else if(state=='start')
          {
            //score +=350;
//            sendScore(score);
        if(stage==6)
            {
             
             checkStage(function(d){if(d=='success'){
               stage+=1;
              score +=350;
              sendValue(vulnerability);
              sendScore(score);
              check=1;
              window.write('successful');
              //return 'Exploit successful!';
            }
            else
              check=2;
              
          },vulnerability);
            if(score==1000)
              return 'Exploit successful!';
            else if(check==2)
              return 'Exploit Patched';

            }

            else 
                   return "can't follow this step";                  
            
          }
          else{

          return 'Try again exploit is not launched!';
          }
         },

         'change': function( tokens){
          tokens.length
          score-=300;
          stage=0;
          sendScore(score);
         },

         'exit': function( tokens){
          tokens.length
          window.location.href="http://localhost/cyber/main/score";
         },

      };



      for( var j in command_directory ) {
        $.register_command( j, command_directory[j] );
        
      }

           });
