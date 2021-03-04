<?php
session_start();



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <link rel="stylesheet" href="css/receipt.css">
</head>
<body>


<script src="html2canvas.js"></script>
<script>
  function save(){
    html2canvas(document.querySelector("#body")).then(canvas =>{
    document.body.appendChild(canvas);
    Canvas2Image.saveAsPNG(canvas);
   
});

  }
function exit(){
 
  location.reload();
  
 
  
}


  
  
</script>



<div class="box" id="box" >

    <div class="box-header" onclick="exit()">
        <div class="title">Transaction Completed</div>
        <button class="close"><a href="transferMoney.php">&times;</a></button>
    </div>
    
   <div class="body" id="body" onclick="exit()">
    <table style="width:100%" >
        <tr>
          <th></th>
          <th></th>
         
        </tr>
        <tr>
          <td>From</td>
          <td><?php echo $_SESSION['userID']; ?></td>
          
        </tr>
        <tr>
          <td>To</td>
          <td><?php echo $_SESSION['sentTo']; ?></td>
 
        </tr>
        <tr>
            <td>Amount</td>
            <td><?php echo $_SESSION['amountsent']; ?></td>
   
          </tr>
          <tr>
            <td>Date/Time</td>
            <td><?php $dt= date("Y-m-d h:i:s"); echo ($dt);?></td>
   
          </tr>
          <tr>
            <td>Remark</td>
            <td><?php echo $_SESSION['remarksent']; ?></td>
   
          </tr>
      </table>
     
   </div>
   <button class="cta" id="download" onclick="save();">Preview</button>
</div>

<div id="overlay" onclick="exit()"></div>


    
</body>
</html>