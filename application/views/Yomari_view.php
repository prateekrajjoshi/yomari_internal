<!DOCTYPE html>
<html>
<head>

    <title>
        Attrition Rate Calculation
    </title>

    <script type="text/javascript">
      
      function contact_clicked(){
        alert("Contact any of the mails below: \n\n prateek.joshi@lisnepal.com.np \n pranjal.dhakal@lisnepal.com.np \n aashish.bhandari@lisnepal.com.np \n ayush.kafle@lisnepal.com.np");
      }

    </script>
<style type="text/css">
  

  .upper {
  float: left;
  width: 100%;
  height: 150px;
}
  .middle {
  float: left;
  width: 100%;
  height: 320px;
  background-color: #00948A;
}
  .lower {
  float: left;
  width: 100%;
  height: 150px;
}

.lower1{
    float: right;
    text-align: left;
    width: 200px;
    height: 130px;
    margin: 10px;
    display: inline-block;  
}

.contact{
   text-align-last: center;
    width: 150px;
    height: 30px;
    margin: 10px;
    display: inline-block;
    }

.contact:hover {
    color: #f25555;
    cursor: pointer;

}
.copyright{
   text-align-last: center;
    width: 280px;
    height: 30px;
    margin: 10px;
    display: inline-block; 
}

input[type=submit] {
    width: 400px;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

input[type=number], select {
    width: 100px;
    height: 35px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-right:40px;
    font: 15pt sans-serif;
}
</style>
</head>


<body>


<div class="upper">
  <center><img src="<?php echo base_url('LIS.png'); ?>" align="middle" style="width:400px;height:120px;"/></center>
</div>

<div class="middle">
  
    <center><h1><font color="white" size="6">ATTRITION TABLE GENERATOR</font></h1></center><br><br>


  <div align="center"> <form action="<?php echo site_url('Yomari_controller/');?>excel" method="post">
     <font color="white" size="6"> From : </font> <input type="number" name="from_year" id="from_year" min="1990" max="2050" > </input>
      <font color="white" size="6"> To : </font> <input type="number" name="to_year" id="to_year" min="1990" max="2050" > </input>
      <br><br><br><br>
        <input type="submit" id="down-btn" class="btn btn-primary" value="Download as Excel File" onclick="f1()" />
    </form></div>

    <br><br>
</div>


<div class="lower">

<div class="lower1">
<p><b>Team Members</p></b>
Aashish Bhandari <br>
Aayush Kafle <br>
Pranjal Dhakal <br>
Prateek Raj Joshi
</div>


<br><div class="contact"><p onclick="contact_clicked()">Contact/Queries </p></div><br><br>

<div class="copyright">© 2017 LIS Nepal. All Rights Reserved.</div>

</div>
      

</body>

</html>

