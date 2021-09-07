<html>
<head><title>Transfer</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

<style>
body{
	background-image: url("other_bg.jfif");
    background-repeat: no-repeat;
    background-size:100%;
}
table,th,td{
                    color:black;
                    font-size: 20px;
                }
				table{width : 90%;}
h1{
                    color: darkblue;
					font-size:30px;
                    padding-left: 100px;
					text-align:center;
					padding-top:30px;
                }
                .button {
  background-color:lightsalmon; /* Green */
  border: none;
  color: black;
  padding: 9px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius:30%;
  font-weight:bold;
				}
</style>
</head>
<body>


<div class="alert alert-success alert-dismissible" role="alert" id="liveAlert">
  <strong>Nice!</strong> The Transfer was Successfull!!!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
$errors=array();
$con=mysqli_connect("localhost","root","","test");
if($con->connect_error)
die("Connection failed :".$con->connect_error);

$sender=mysqli_real_escape_string($con,$_POST['sendacc']);
$reciever=mysqli_real_escape_string($con,$_POST['recacc']);
$transfer_amt=mysqli_real_escape_string($con,$_POST['transfer']);
$remark=mysqli_real_escape_string($con,$_POST['remark']);

if(count($errors)==0){
	echo "<center><h1><u>TRANSFER DETAILS</u></h1></center>";
	echo "<center><h2><u>Before Transfer</u></h2></center>";
	// echo "<center><h3><i><u>Sender Details</u></i></h3></center>";
	$sql=mysqli_query($con,"select * from accounts where C_no='$sender'");

	$sqlr=mysqli_query($con,"select * from accounts where C_no='$reciever'");

	if((mysqli_num_rows($sql)>0) and (mysqli_num_rows($sqlr)>0)){
echo "<center><table border='1' class='table'>
<tr>
<th>Account Number</th>
<th>Name</th>
<th>Email</th>
<th>Current Balance</th>
<th>Remark</th>
</tr>";

while(($r = mysqli_fetch_array($sql)) and ($r1 = mysqli_fetch_array($sqlr)))
{
echo "<tr>";
echo "<td>" . $r['C_no'] . "</td>";
echo "<td>" . $r['C_name'] . "</td>";
echo "<td>" . $r['C_mail'] . "</td>";
echo "<td>" . $r['C_ballance'] . "</td>";
echo "<td>" . $remark . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>" . $r1['C_no'] . "</td>";
echo "<td>" . $r1['C_name'] . "</td>";
echo "<td>" . $r1['C_mail'] . "</td>";
echo "<td>" . $r1['C_ballance'] . "</td>";
echo "<td>" . $remark . "</td>";
echo "</tr>";
echo "</tr>";

}
echo "</table></center></br></br></br>";
}



echo "<center><h2><u>After Transfer</u></h2></center>";

$send_cur=mysqli_query($con,"select C_ballance from accounts where C_no='$sender'");
$rec_cur=mysqli_query($con,"select C_ballance from accounts where C_no='$reciever'");
$row_send = mysqli_fetch_array($send_cur);
$row_rec=mysqli_fetch_array($rec_cur);
	if($row_send['C_ballance']>$transfer_amt){
		$diff=$row_send['C_ballance']-$transfer_amt;
		$add=$row_rec['C_ballance']+$transfer_amt;
		mysqli_query($con,"update accounts set C_ballance='$diff' where C_no='$sender'");
		mysqli_query($con,"update accounts set C_ballance='$add' where C_no='$reciever'");
	
		$date=date('Y-m-d H:i:s');
		
		//"insert into users (email,username,password) values('$email','$username','$password')";
		// date_time ; remark ; transfer_amt ; sender_account_number; 
		$done=mysqli_query($con,"insert into transfer (date_time,remark,transfer_amount,sender_account_number,reciever_account_number) values('$date','$remark','$transfer_amt','$sender','$reciever')");
	}
	
	//insert into transfer table : work pending
	
	$sql=mysqli_query($con,"select * from accounts where C_no='$sender'");
	$sqlr=mysqli_query($con,"select * from accounts where C_no='$reciever'");
	if((mysqli_num_rows($sql)>0) and (mysqli_num_rows($sqlr)>0)){
echo "<center><table border='1' class='table'>
<tr>
<th>Account Number</th>
<th>Name</th>
<th>Email</th>
<th>Current Balance</th>
<th>Remark</th>
</tr>";

while($r = mysqli_fetch_array($sql)  and ($r1 = mysqli_fetch_array($sqlr)))
{
echo "<tr>";
echo "<td>" . $r['C_no'] . "</td>";
echo "<td>" . $r['C_name'] . "</td>";
echo "<td>" . $r['C_mail'] . "</td>";
echo "<td>" . $r['C_ballance'] . "</td>";
echo "<td>" . $remark . "</td>";
echo "</tr>";
echo "</tr>";

echo "<tr>";
echo "<td>" . $r1['C_no'] . "</td>";
echo "<td>" . $r1['C_name'] . "</td>";
echo "<td>" . $r1['C_mail'] . "</td>";
echo "<td>" . $r1['C_ballance'] . "</td>";
echo "<td>" . $remark . "</td>";
echo "</tr>";
echo "</tr>";
}
echo "</table></center></br></br></br>";
}







}
else{
	array_push($errors,"No data found");
}
?>
<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
<form action="home.php" method="post">
<center><input class="button" type="submit" value="Home"/></center>
</form>
</body>
</html>