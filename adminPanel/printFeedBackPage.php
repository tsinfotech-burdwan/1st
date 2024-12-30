<?php
	ob_start();
  session_start();
  include 'base/config.php';
  if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{
		  
			date_default_timezone_set('Asia/Kolkata');
			$date = date('y-m-d h:i:s');
      $valueId = $function->dataDecryption($_GET['valueId']);
      if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$valueId))
      {
        echo "<meta http-equiv='refresh' content='0;URL=../dashboard'>";        
      }
      else
      {
        $update = mysqli_query($conn,"update ".$contactUsDetailsTbl." set print='1' where sl_no='".$valueId."'");
        $selectContactUsDetails = mysqli_query($conn,"select * from ".$contactUsDetailsTbl." where sl_no='".$valueId."'");
        $rowContactUsDetails = mysqli_fetch_array($selectContactUsDetails);      
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Burdwan Municipality</title>
<link rel="shortcut icon" type="image/x-icon" href="https://www.burdwanmunicipality.gov.in/images/favicon.png" />
</head>

<body>
<page size="A4">
    <div class="main">
        <div class="form_top">
			<h3 style="text-align:center;margin-top: 0px;margin-bottom: 0px;">Office Of The Burdwan Municipality</h3>
			<h3 style="text-align:center;margin-top: 0px;margin-bottom: 0px;">101, G.T.Road Burdwan West Bengal - 713101<br>Ph : +91 342 2662518/2664121/2662777 <br> Email : burdwanmunicipality@gmail.com | WebSIte: www.burdwanmunicipality.gov.in</h3><br><br>
      <h3 style="text-align:center;margin-top: 0px;margin-bottom: 0px;">Feedback/Complain</h3>
		</div>
        <div class="table_sec">
            <table width="100%" >
              <tbody>
                <tr>
                  <th scope="col">To,<br>The Chairman<br>Burdwan Municipality<br>Burdwan - 713101</th>
                </tr>
               </tbody>
            </table>
        </div>
        <div class="table_sec">
            <table width="100%" >
              <tbody>
                <tr>
                  <th scope="col">From,<br><?php echo $rowContactUsDetails['applicant_name'];?><br><?php echo $rowContactUsDetails['phone_no'];?><br>Date Time - <?php echo $rowContactUsDetails['submitted _date'];?></th>
                </tr>
               </tbody>
            </table>
        </div>
        <div class="table_sec">
            <h3 style="text-align:center;">Sub: <?php echo $rowContactUsDetails['subject'];?></h3>
            <table width="100%" >
              <tbody>
                <tr>
                  <th style="text-align:justify-all;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowContactUsDetails['message'];?></th>                
                </tr>                
              </tbody>
            </table>            
        </div>
        <div class="table_sec">
            <table width="100%" >
              <tbody>
                <tr>
                  <th scope="col" width="100px" style="text-align:center;">***This Is System Generated Copy Via Web Site****</th>
                </tr>                
              </tbody>
            </table>            
        </div>        
      <div class="fixed_bottom">			     
    </div>
</page>

<style>body {background: rgb(204,204,204); }page {background: white;display: block;margin: 0 auto;margin-bottom: 0.5cm;box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);}page[size="A4"] {  width: 21cm;height: 29.7cm; }page[size="A4"][layout="landscape"] {width: 29.7cm;height: 21cm; }.main{padding:30px;}.table_sec{width:100%;float:left;display:block;margin-bottom:10px;}th{padding:10px;text-align:left;}.form_top{width:100%;float:left;display:block;}.type_sec{width:100%;float:left;display:block;}.form_top_left{width: 50%;float: left;display: block;text-align: left;}.form_top_left h2{font-size:18px;color:#000;letter-spacing:1px;}.form_top_right{width: 50%;float: left;display: block;text-align: right;}.form_top_right h2{font-size:18px;color:#000;letter-spacing:1px;}.fixed_bottom{position: relative;top: 250px;}</style>
</body>
</html>
<?php
  }	
}
?>