<div class="jumbotron" style="border:1px solid; margin:10px;">
      <div class="row">
          <?php
if($type=='1'){

?>
          <div class="col-sm-12" style="padding:20px; background: #005702; color: #FFF; margin: 20px;">
              <?
              echo $msg;
              ?>

          </div>
<?php } else{ ?>
          <div class="col-sm-12" style="padding:20px; background: #990000; color: #FFF; margin: 20px;">
              <?
              echo $msg;
              ?>

          </div>
          <?php }
          
          ?>
      </div>
</div>
<script type="text/javascript">
        window.onunload = refreshParent;
        function refreshParent() {
            window.opener.location.reload();
            
        }
    </script>

