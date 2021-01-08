<div class="jumbotron" style="border:1px solid; ">
    <div class="row">
          
          <div class="col-sm-8" >
              <div style="padding-left: 5px; padding-right: 5px; border-right: 1px solid; margin-left: 20px; margin-right: 20px;">
                  
                  <div style="border-bottom: 1px solid; margin-bottom: 10px;">
                  <div class="form-group">
      
    <label for="nseregno">Enter Membership No:</label>
    <input type="text" class="form-control" id="nseregno" name="nseregno" autocomplete="off" />
  
  </div>
                  </div>
                  <div id="result">
                      
                  </div>
                  
                  
              </div>

          </div>
          <div class="col-sm-4" >
              <div style="padding-left: 5px; padding-right: 5px; border-radius: 5px; margin-left: 20px; margin-right: 20px;">
                  <strong style="padding: 10px; border: 1px solid; border-radius: 5px; margin-bottom: 10px; background-color: #00620C; color: #FFF;">Transaction Summary</strong>
                  <div id='transSummary' style="margin-top: 10px;"></div>
              </div>

          </div>

      </div>
</div>
<script>
$(document).ready(function(){
   $("#nseregno").keyup(function(){
       $("#result").html('<?=img("images/preload.gif")?>');
      var reg=$("#nseregno").val();
      if(reg==''){
          $("#result").empty();
          return false;
      }
      url=<?php echo "'" . site_url('welcome/membersProfile/') ."'"; ?>+ '/' + reg;
      
			  	$.ajax({
					url:url,
					dataType:'text',
					type:'GET',
					success: function(data){
							$("#result").empty();
							$("#result").append(data);	
							
							},
						error: function(data){
											
						}
							
						});
				
       
       
   }); 
    //displays the transaction summary
    url222='transSummary';
          $.ajax({
            url:url222,
            dataType:'text',
            type:'GET',
            success: function(data){
                $('#transSummary').empty();
                $('#transSummary').append(data);
                
            },
            error: function(data){}
          })
});

</script>
