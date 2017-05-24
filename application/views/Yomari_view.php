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
         	<td>ID</td>
            <td>First Name</td>  
            <td>Joining Date</td>  
            <td>Leaving Date</td>
            <td>Left or not</td>
            
         </tr>  
         <?php 
         foreach ($result as $row)  
         {  

           ?><tr>
        <td><?php echo $row['spi_id'];?></td>    
        <td><?php echo $row['spi_first_name'];?></td> 
        <td><?php echo $row['spi_date_of_joining'];?></td>
        <td><?php echo $row['spi_date_of_leaving'];?></td>
       

        <?php if ($row['spi_date_of_leaving']=='0000-00-00') 
            { ?>
            <td> <?php echo 'nope';  ?> </td> 
            <?php
            } ?>
        <?php  if ($row['spi_date_of_leaving']!='0000-00-00')
            {?>
            <td> <?php echo 'left';  ?> </td> 
            <?php
      		 }
            ?>
           
			</tr>
         <?php 
         
         }

         ?>  

       </tbody>  
   	</table>  


</body>


</html>






























