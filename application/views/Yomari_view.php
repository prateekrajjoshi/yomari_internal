<!DOCTYPE html>
<html>
<head>

    <title>
        Attrition Rate Calculation
    </title>

<style>
    
 button
 {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
 button:hover
 {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}

</style>
</head>


<body>


<script>



</script>



    <h1><center>Yomari Internal Project</center></h1><br>    

    <p><font size="6">Attrition Rate Calculation</font></p><br>

      <form action="<?php echo site_url('Yomari_controller/');?>add" method="post">
        <input name="add-list" id="add-list"> </input>
        <input type="submit" id="add-btn" class="btn btn-primary" value="Enter" />
    </form>

    <br><br>

      <table border="5">  
      <tbody>  
         <tr>  
            <td>First Name</td>  
            <td>Joining Date</td>  
            <td>Mobile Number</td>
            <td>Leaving Date</td>
            <td>Left or not</td>
            
         </tr>  
         <?php 
         $i=0;
         foreach ($result as $row)  
         {  

           ?><tr>
        <td><?php echo $row['spi_first_name'];?></td> 
        <td><?php echo $row['spi_date_of_joining'];?></td>
        <td><?php echo $row['spi_mobile_number'];?></td>
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






























