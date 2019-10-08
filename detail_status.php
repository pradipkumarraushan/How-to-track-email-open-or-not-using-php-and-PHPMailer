<!DOCTYPE html>
<html>
<head>
		<title>How to Track Email Open or not using PHP</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script src="js/jquery.min.js"></script>
		<link rel="stylesheet" href="css/jquery.dataTables.min.css"></style>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class=" container">
		<table  class="table-responsive table table-bordered table-striped">
			<tr>
				<th class="text-center"><span>Email</span></th>
				
		
				<th class="text-center"> <span>Subject</span></th>
				
			</tr>


			<tr>
				<td class="text-center">
					<span><?php if (isset($_POST["details"]) && !empty($_POST["details"])) {
    echo $_POST["email_address"];    
} else {  
    echo "No Data Available";
} ?>              </span>


	
               </td>
				<td class="text-center">
                    <span><?php if (isset($_POST["details"]) && !empty($_POST["details"])) {
    echo $_POST["email_subject"];    
} else {  
    echo "No Data Available";
} ?></span>
			   </td>
			</tr>

			<tr>
				<th class="text-center"> <span>Email ID Number</span></th>
				<th class="text-center"> <span>Message</span></th>
				
			</tr>
			<tr>
				<td class="text-center">
					<span>
					<?php if (isset($_POST["details"]) && !empty($_POST["details"])) {
    echo $_POST["email_track_code"];    
} else {  
    echo "No Data Available";
} ?>
				</span>

				</td>
				<td class="text-center"><span><?php if (isset($_POST["details"]) && !empty($_POST["details"])) {
    echo $_POST["email_body"];    
} else {  
    echo "No Data Available";
} ?></span></td>
			</tr>
</table></div>
<?php 
$connect = new PDO("mysql:host=localhost;dbname=email_track_database", "root", ""); 
function fetch_email_track_data($connect,$email_track_code)
{
	$query = "SELECT  email_data.email_subject,email_data.email_address,email_data.email_body,email_data.email_track_code ,email_track.email_status,email_track.email_open_datetime

FROM email_data

LEFT  JOIN email_track ON email_track.email_track_code = email_data.email_track_code WHERE email_data.email_track_code = ?  ORDER BY email_track.email_open_datetime DESC";
	$statement = $connect->prepare($query);
	$statement->execute([$email_track_code]);
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '
	<div class="container">
    <table id="myTable" class="table-responsive table table-bordered table-striped">
        <thead>
			<tr>
				<th class="text-center"> <span>Status</span></th>
				<th class="text-center"> <span>Open Datetime</span> </th>
				
			</tr>
		</thead>
		<tbody>
			

	';
	if($total_row > 0)
	{
		foreach($result as $row)
		{
			$status = '';
			if($row['email_status'] == 'yes')
			{
				$status = '<span class="label label-success">Open</span>';
			}
			else
			{
				$status = '<span class="label label-danger">Not Open</span>';
			}
			$output .= '
				<tr>
				<td class="text-center"> <span>'.$status.'</span></td>
				<td class="text-center"> <span>'.$row["email_open_datetime"].'</span></td>
			    </tr>
			';
		}
	}
	else
	{
		$output .= '
		<tr>
			<td colspan="2" class="text-center"><span>No Email Send Data Found</span></td>
		</tr>
		';
	}
	$output .= '		
         <tbody>
   <tfoot>
			<tr>
				
				<th class="text-center"> <span>Status</span></th>
				<th class="text-center"> <span>Open Datetime</span> </th>


			</tr>
		</tfoot>
	</table>
</div>';
	return $output;
}
?>


	<h2 class="text-center"> <span>History Logs</span></h2>
	<?php 
			$email_track_code=$_POST["email_track_code"];
			echo fetch_email_track_data($connect,$email_track_code);

			?>


<style type="text/css">
  body {
    padding-top: 60px;
    background: black;
  }
  @media (max-width: 980px) {
    body {
      padding-top: 20px;
      background: black;
    }
  }
   table { table-layout: fixed; }
 span{
   color: white;
 }
 th{
 	background: #110b42;
 }
  td{
 	background: #333;
 }
 label{
 	color:#ea0077;
 }
</style>
<script type="text/javascript">
$(document).ready(function(){

    $('#myTable').dataTable({
  "lengthMenu": [ [5, 10, 15, 25, 40, -1], [5, 10, 15, 25, 40, "All"] ]
});

$(".dataTables_info").css({color:"white"});



 $('.dataTables_paginate').css({'font-size': '150%' ,'font-weight': 'bold'});

});
</script>
<br>
</body>
</html>