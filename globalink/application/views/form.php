<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel panel-heading"><strong>FORM SPE 1</strong></div>
        <div class="panel panel-body">
		<div id="mydiv" style='margin-top:0px !important;'>
		<table class="table table-condensed">
		<tr><td></td><td align="center"><h1>INDUSTRIAL TRAINING FUND</h1><br/><h3>PAYMENT OF STUDENT ALLOWANCES THROUGH THE EMPLOYER</h3><h4><i><strong>(To be completed before Money is deposited with Employer)</strong></i></h4></td><td align="center"><strong>FORM SPE 1</strong></td></tr>
		</table>
		<?php
		foreach($org as $r){}
		?>
		<table class="table table-bordered">
		<tr><td class="col-sm-3">From:</td><td class="col-sm-6"><?php echo $r['orgName']; ?></td><td class="col-sm-3">To:Area Manager</td></tr>
		<tr><td class="col-sm-3">Name of Organisation:</td><td class="col-sm-6"><?php echo $r['orgName']; ?></td><td class="col-sm-3">ITF:</td></tr>
		<tr><td class="col-sm-3">Location Address:</td><td class="col-sm-6"><?php echo $r['orgAddress']; ?></td><td class="col-sm-3">To:Area Manager</td></tr>
		</table>
            <hr />
            <?php
            if(!empty($students)){ ?>
            
            
            <table class="table table-striped">
                <tr><td>S/No</td><td>Name of Student</td><td>Matric No</td><td>Course of Study and Year/Level</td><td>Name of Institution</td><td>Period of Attachment in Months</td><td>Date of Commencement</td><td>Date of Completion</td><td>Remarks</td></tr>
             <?php
             $sno=0;
             foreach($students as $row){ $sno++; ?>
                <tr><td><?php echo $sno; ?></td><td><?php echo $row['surname']." ".$row['othernames']; ?></td><td><?php echo $row['matric']; ?></td><td><?php echo $row['course']." Level:".$row['level']; ?></td><td><?php echo $row['name']; ?></td><td></td><td><?php echo $row['from'];  ?></td><td><?php echo $row['to']; ?></td><td><?php //echo $row['course']; ?></td><!--<td><?php echo anchor_popup('welcome/editStudent/'.$row['id'],'Edit',array('width'=>1200,'height'=>600)); ?></td>--></tr>
             <?php } ?>
    </table>  
	
	<table class="table table-condensed">
	<tr><td class="col-sm-9"></td><td class="col-sm-3">Date: <?php echo date('Y-m-d'); ?></td></tr>
	</table>
	</div>
	<p><a href="Javascript:" class="btn btn-primary" onclick="printDiv('mydiv')">PRINT</a></p>
            <?php } else{ echo "<pre><span>No Student Found</span></pre>"; } ?>
        </div>
    </div>
    
</div>

<script>
      function onLoad(){
        window.print();
    }
    function printDiv(divName)
    {
        var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
    }
    </script>