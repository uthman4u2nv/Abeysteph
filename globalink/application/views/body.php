<style>
    .apply{background-color: #0073b7; margin: 20px; padding: 5px; color: #FFF; width: 250px;}
    .apply a:hover{color: #FFF;}
    .start{padding: 5px; border: 1px solid; background-color: #0073b7; color: #fff;}
    a:hover{color:#fff;}
    </style>
<div class="jumbotron" style="border:1px solid; margin:10px;">
    <div class="row" style="border-radius: 0 !important;">
      <div class="col-sm-6" style="border-right:1px solid; padding-left:40px;">
          <span>Welcome to Executive Housing Cooperative Society</span><br /><br />
          <span>Please read the Application Guidelines before proceeding. Click on Start Application to begin your registration </span><br /><br />
          <a href="Javascript:;" id="application" style="padding: 5px; border: 1px solid; background-color: #0073b7; color: #fff;">Application Guidelines</a> | <?php 
          $start=array('class'=>'start');
          echo anchor('welcome/application','Proceed to Registration',$start);
          ?>
         <hr class="colorgraph">
          <div id="apply_req" style="text-align: justify; margin: 10px; padding: 20px; display: none;">
         
    <?php
   $class=array('class'=>'apply');
   echo anchor('welcome/application','Start Application',$class);
   ?><br /><br />
              <strong>Application Guidelines</strong>
    </div>
          <br />
          
        </div>
        <div class="col-sm-6">
            <div align="center">
                <div style="padding: 10px; border: 1px solid; background-color: #0073b7; color: #fff;"><h2>Online Application</h2></div>
                <?php
                $img=array('src'=>'images/enquiries.jpg');
                $img2=array('src'=>'images/email.jpg');
                echo img($img);
                ?><br /><br />
                <span>Email: <strong>info@.com</strong></span><br />
                <!--<span>Phone: <strong></strong></span><br />-->
                
                
            </div>


        </div>
        </div>
      </div>
      <script type="text/javascript">
	  $(document).ready(function(){
              $("#application").click(function(){
                 $("#apply_req").toggle(1000);
                 $("#invitation_req").hide(1000);
                  
                  
              });
              $("#invitation").click(function(){
                 $("#apply_req").hide(1000);
                 $("#invitation_req").toggle(1000);
                  
                  
              })
		  $("#forgot").click(function(){
			  $("#show-forg-pass").show(1000);
			  $("#show-login").hide(1000);
			  });
			  $("#register").click(function(){
			  $("#show-register").show(1000);
			  $("#show-login").hide(1000);
			  $("#show-forg-pass").hide(1000);
			  });
			  $("#login").click(function(){
			   $("#show-login").show(1000);
			  $("#show-forg-pass").hide(1000);
			  });
			  
			  			
			  	
			$("#reg").click(function(){
                            $("#show-register").toggle(1000);
                        });  
		  });	  
	  </script>
	  
   
