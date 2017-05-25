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
      <tbody>  
         <tr>  
         	<td>No. of Employees at Beginning</td>
         	<td>No. of Employees Joined</td>
            <td>No. of Employees Left</td>  
            <td>Ending Balance</td>
            <td>Attrition Rate</td>
             
            
         </tr>  
         <tr>
         <?php
        $total_at_beginning= $at_beginning["num_at_beginning"]- $left_at_beginning["num_left_at_beginning"];
        $ending_balance= $total_at_beginning+$total_added["num_joined"]-$total_left["num_leaving"];
        $attrition_rate= ($total_left["num_leaving"] * 100)/($total_at_beginning + $total_added["num_joined"]);
        ?> 
        <td><?php echo $total_at_beginning;?></td>   
        <td><?php echo $total_added["num_joined"];?></td> 
        <td><?php echo $total_left["num_leaving"];?></td>
        <td><?php echo $ending_balance; ?></td>
        <td><?php echo (round($attrition_rate,2) . "%"); ?></td>
			</tr>

       </tbody>  
   	</table>  


</body>


</html>






























