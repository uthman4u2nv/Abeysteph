<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
        <div class="col-sm-6">
    <?php 
    $form=array('name'=>'form1','id'=>'form1');
    echo form_open('welcome/payContribution',$form);
    ?>
    <table class="table stripped">
        <tr><td colspan="2"><strong><h3>Pay Contribution</h3></strong></td></tr>
        <tr><td>Contribution Type</td><td>
                <input type="hidden" name="fee" value="<?php echo $contType; ?>" />
                
            <?php
        
        foreach($contribution as $cont){
            if($cont['id']==$contType){
                $name=$cont['feeName'];
                $amount=$cont['amount'];
            }
        }
            ?>
                    
                <?php echo $name; ?>
            
            </td></tr>
        
        <tr><td>Amount</td><td><?php echo number_format($amount,2); ?><input type="hidden" value="<?php echo $amount; ?>" class="form-control" name="amount" id="amount" readonly="true" /></td></tr>
        
        <tr><td colspan="2"><input type="submit" value="Pay Contribution" class="btn btn-default" /></td></tr>
    </table>
</div>
        <?php echo form_close(); ?>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#amount").change(function(){
           var amt=$("#amount").val();
           if(isNaN(amt)){
               alert('Enter Number');
               $("#amount").attr({value: ""});
           }
           if(amt<20000){
               alert('Invalid Amount,amount must be greater than 20000');
               document.getElementById("amount").value='';
               return false
           }
        });
        $("#fee").change(function(){
            var fee_id=$("#fee").val();
            if(fee_id==999){
                $("#amount").attr({value: ""});
                $("#amount").removeAttr("readonly");
                return false
            }else{
                $("#amount").attr({value: ""});
                $("#amount").attr({readonly: "true"});
            dis_url = <?php echo "'" . site_url('welcome/getAmount') . "'"; ?> + '/' + fee_id;
            
            $.ajax({
                    url:dis_url,
                    dataType:'html',
                    type:'GET',                    
                    success: function(data){
                    
                      $("#amount").attr({value: data});
                    },
                    error: function(data){
                        alert('Error: '+data);
                    }
                });
        };
        });
    });
    </script>
<script  type="text/javascript">
    var frmvalidator = new Validator("form1");
    frmvalidator.addValidation("fee", "req", "Select Fee");
    frmvalidator.addValidation("amount", "req", "Enter Amount");
    frmvalidator.addValidation("amount", "numeric", "Invalid Amount");
    </script>
