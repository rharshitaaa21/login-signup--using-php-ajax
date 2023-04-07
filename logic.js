   $(document).ready(function(){
        $("#register-btn").click(function(){
    $("#register-box").show();
    $("#login-box").hide(); 
        });
    
        $("#login-btn").click(function(){
    $("#login-box").show();
    $("#register-box").hide(); 
        });
    
        $("#forgot-btn").click(function(){
    $("#forgot-box").show();
    $("#login-box").hide(); 
        });
    
        $("#back-btn").click(function(){
    $("#login-box").show();
    $("#forgot-box").hide(); 
        });

        $("#login-frm").validate();
        $("#register-frm").validate({
          rules:{
              cpass:{
                  equalTo: "#pass"
              }
          }
        });
        $("#forgot-frm").validate(); 
    
      //   submit form without page refresh----------------->
                  //for registration
        $("#register").click(function(e){
          if(document.getElementById('register-frm').checkValidity()){
              e.preventDefault();
              $.ajax({
                  url: 'action.php',
                  method:'post',
                  data:$("#register-frm").serialize()+'&action=register',
                  success:function(response){
                      $("#alert").show();
                      $("#result").html(response);
                  }
              });
          }
          return true;
        });

                   //for login---------------------->
        $("#login").click(function(e){
          if(document.getElementById('login-frm').checkValidity()){
              e.preventDefault();
              $.ajax({
                  url: 'action.php',
                  method: 'post',
                  data: $("#login-frm").serialize()+'&action=login',
                  success: function(response){
                      if(response === "Okay"){
                          window.location='profile.php';
                      }
                      else{
                          $("#alert").show();
                          $("#result").html(response);
                      }
                  }
              });
          }
        
        return true;
      });

    });