
$( document ).ready( function() {
       


      
    /*  function check(){
        setInterval(checkHack,1000);
      }*/

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

     /* function sendValue(name){
      
      

        $.ajax({
          type:"post",
          url:"hacker_point",
          data:"name="+name+"&message=good"+"&action=add",
          success:function(data){
                               $("#varun").html(data);
                                  
                              }
        });
      }*/



      function sendScore(score){
      
      

        $.ajax({
          type:"post",
          url:"hacker_point",
          data:"score="+score+"&user=jack"+"&action=addscore",
          success:function(data){
                               $("#varun").html(data);
                                  
                              }
        });
      }

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
                  //  sendValue(1);
                //    checkHack();
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
              //checkHack();
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
         
         'aSearch': function( tokens){
          tokens.length
          var cve_id =tokens[1];
          if(tokens.length==1 || cve_id==''){
            return 'Unavailable format.<br>Example: aSearch CVE-ID';

          }
          else if(cve_id=='CVE-2010-5431'){
            if(stage==2)
            {
              stage+=1;
              score +=100;
              //checkHack();
              vulnerability=1;
              sendScore(score);
              return '/sbin/service/shell/vsftpd';
            }
            else 
                   return "can't follow this step";                  
            
          }
          else if(cve_id=='CVE-2012-612'){
            if(stage==2)
            {
              stage+=1;
              score +=100;
              vulnerability=2;
              sendScore(score);

              return '/usr/share/VMs/vmware';
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
              vulnerability=3;
              sendScore(score);
              return '/etc/postgresql/9.1/main/pg_hba.conf';
            }
            else 
                   return "can't follow this step";                  
            
          }
          else{
            return 'Wrong CVE-ID';
          }
         },
         
          'use_update': function( tokens){
          tokens.length
          var update_name =tokens[1];
          if(tokens.length==1|| update_name==''){

            return 'Unavailable format.<br>Example: use_update update_name';
          }
          else if(update_name=='/etc/postgresql/9.1/main/pg_hba.conf'||update_name=='/usr/share/VMs/vmware'||update_name=='/sbin/service/shell/vsftpd'){
              //score +=50;
              //sendScore(score);
             if(stage==3)
            {
              stage+=1;
              score +=250;
              sendScore(score);
              return 'update is used';
            }
            else 
                   return "can't follow this step";                  
              
          }
          else{
            return 'Specify the update correctly';
          }
         },

         'update': function( tokens){
          tokens.length
          var start_time =tokens[1];
          if(tokens.length==1|| start_time==''){
            return 'Unavailable format.<br>Example: update now';
          }
          else if(start_time=='now'){
            //score +=30;
            //sendScore(score);
            if(stage==4)
            {
              stage+=1;
              score +=250;
             // checkHack();
              sendValue(vulnerability);
              sendScore(score);
             // return vulnerability;
              return 'update Running ';
            }
            else 
                   return "can't follow this step";                  
            
          }
          else{
            return 'Specify the starting state';
          }
         },
         'change': function( tokens){
          tokens.length
          score-=500;
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
