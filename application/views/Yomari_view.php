<!DOCTYPE html>
<html>
<head>

    <title>
        Attrition Rate Calculation
    </title>

</head>


<body>

    <h1><u><center>Yomari Internal Project</center></u></h1><br>    

    <p><font size="6">Attrition Rate Calculation</font></p><br>

      <form action="<?php echo site_url('Yomari_controller/');?>add" method="post">
        Enter the year:
        <input name="any_number" id="any_number"> </input>
        <input  type="submit" id="add-btn" class="btn btn-primary" value="Generate"/>
    </form>
<br><br>
	<form action="<?php echo site_url('Yomari_controller/');?>excel" method="post">
		<input name="any_number" id="any_number"> </input>
        <input type="submit" id="down-btn" class="btn btn-primary" value="Download as Excel File" />
    </form>


    <br><br>

<?php 
$total_at_beginning_ind = array_values($total_at_beginning);
$total_added_ind = array_values($total_added);
$total_left_ind = array_values($total_left);
?>


    <table border="5", style="width:100%">
    <caption><font size='5'><b>Attrition Table For The Year <?php echo $only_one;?><b></font></caption>
<tr>
<td>
    <table border="3", style="width:100%">
        <thead>
            <tr><th>Month</th></tr>
        </thead>
        <tbody>
       	<tr> <td>January</td></tr>
  		<tr> <td>February</td></tr>
  		<tr> <td>March</td></tr>
  		<tr> <td>April</td></tr>
		<tr> <td>May</td></tr>
	    <tr> <td>June</td></tr>
	    <tr> <td>July</td></tr>
		<tr> <td>August</td></tr>
		<tr> <td>September</td></tr>
		<tr> <td>October</td></tr>
	    <tr> <td>November</td></tr>
	   	<tr> <td>December</td></tr>
        </tbody>
    </table>   
</td>


<td>
    <table border="3", style="width:100%">
        <thead>
            <tr><th>No. of Employees At Beginning</th></tr>
        </thead>
        <tbody>
             <?php foreach ($total_at_beginning as $row) 
       		 { ?>
			 <tr><td><?php echo ($row);?></td></tr>
  	 		 <?php } ?>
        </tbody>
    </table>
</td>

<td>
    <table border="3", style="width:100%">
        <thead>
            <tr><th>No. of Employees Joined</th></tr>
        </thead>
        <tbody>
             <?php foreach ($total_added as $row) 
       		 { ?>
			 <tr><td><?php echo ($row);?></td></tr>
  	 		 <?php } ?>
        </tbody>
    </table>
</td>

<td>
    <table border="3", style="width:100%">
        <thead>
            <tr><th>No. of Employees Left Company</th></tr>
        </thead>
        <tbody>
             <?php foreach ($total_left as $row) 
       		 { ?>
			 <tr><td><?php echo ($row);?></td></tr>
  	 		 <?php } ?>
        </tbody>
    </table>
</td>


<td>
    <table border="3", style="width:100%">
        <thead>
            <tr><th>Ending Balance</th></tr>
        </thead>
        <tbody>
            <?php for ($i=0;$i<12;$i++)
    		{ 
       		 	for ($j=0;$j<12;$j++)
       		 	{
       		 		if($i==$j)
       		 		{ ?>
       		 		<?php $ending_balance_ind = $total_at_beginning_ind[$i]+$total_added_ind[$i]-$total_left_ind[$i]?>
					<tr><td><?php echo ($ending_balance_ind);?></td></tr>
       		 <?php }}} ?>
        </tbody>
    </table>
</td>


<td>
    <table border="5", style="width:100%">
        <thead>
            <tr><th>Attrition %</th></tr>
        </thead>
        <tbody>
             <?php for ($i=0;$i<12;$i++)
    		{ 
       		 	for ($j=0;$j<12;$j++)
       		 	{
       		 		if($i==$j)
       		 		{ ?>
       		 		<?php $attrition_ind= $total_left_ind[$i]*100/($total_at_beginning_ind[$i]+$total_added_ind[$i])?>
					<tr><td><?php echo round($attrition_ind,2)." %";?></td></tr>
       		 <?php }}} ?>
        </tbody>
    </table>
</td>
   

</body>

</html>

