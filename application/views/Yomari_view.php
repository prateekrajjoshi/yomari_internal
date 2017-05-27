<!DOCTYPE html>
<html>
<head>

    <title>
        Attrition Rate Calculation
    </title>

</head>


<body>

    <h1><center>Yomari Internal Project</center></h1><br>    

    <p><font size="6">Attrition Rate Calculation</font></p><br>

      <form action="<?php echo site_url('Yomari_controller/');?>add" method="post">
        <input name="any_number" id="any_number"> </input>
        <input type="submit" id="add-btn" class="btn btn-primary" value="Enter" />
    </form>


    <br><br>


    <table border="5", style="width:100%">
<tr>
<td>
    <table border="5", style="width:100%">
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
    <table border="5", style="width:100%">
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
    <table border="5", style="width:100%">
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
    <table border="5", style="width:100%">
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
    <table border="5", style="width:100%">
        <thead>
            <tr><th>Attrition Rate</th></tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
</td>



   

</body>


</html>






























