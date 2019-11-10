<?php

//index.php

$connect = new PDO("mysql:host=localhost;dbname=email_track_database", "root", "");
/*Note: Give your website address instead of localhost in $base_url  .Upload your all files of this project in your web folder and import the databse file.  for localhost it will not work in realtime its because of url. 
  */
$base_url = 'https://localhost/how-to-track-email-open-or-not-using-php/'; 
$message = '';
//$base_url = 'http://example.com/how-to-track-email-open-or-not-using-php/'; 
if(isset($_POST["send"]))
{
	require_once 'vendor/autoload.php';
    $mail = new PHPMailer\PHPMailer\PHPMailer;
	$mail->IsSMTP();
	$mail->Host = "smtp.gmail.com";
    // set this true if SMTP host requires authentication to send mail
    $mail->SMTPAuth = true;
    //Provide username & password
    $mail->Username = "YOUR_GMAIL_ID@gmail.com";
    $mail->Password = "YOUR_GMAIL_PASSWORD";
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;// Enter  port number 
    $mail->SetFrom("YOUR_GMAIL_ID@gmail.com","YOUR_NAME");
	
	$mail->AddAddress($_POST["receiver_email"]);
	$mail->WordWrap = 50;
	$mail->isHTML(true);
	$mail->Subject = $_POST['email_subject'];

	$track_code = md5(rand());
	$message_body =  "

	  ".$_POST['email_body']." <br> 


                ";



	$message_body .= '<br/><img src="'.$base_url.'email_track.php?code='.$track_code.'" width="1" height="1" />
	<br>-----------<br>
	<table id="zs-output-sig" style="font-family: Arial,Helvetica,sans-serif; line-height: 0px; font-size: 1px; padding: 0px; border-spacing: 0px; margin: 0px; border-collapse: collapse; width: 550px;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td>
<table style="font-family: Arial,Helvetica,sans-serif; line-height: 0px; font-size: 1px; padding: 0px; border-spacing: 0px; margin: 0px; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td>
<table style="font-family: Arial,Helvetica,sans-serif; line-height: 0px; font-size: 1px; padding: 0px; border-spacing: 0px; margin: 0px; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td>
<table style="font-family: Arial,Helvetica,sans-serif; line-height: 0px; font-size: 1px; padding: 0px; border-spacing: 0px; margin: 0px; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td>
<table style="font-family: Arial,Helvetica,sans-serif; line-height: 0px; font-size: 1px; padding: 0px; border-spacing: 0px; margin: 0px; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="border-collapse: collapse; font-family: Calibri, Helvetica, sans-serif; font-size: 15.0px; font-style: normal; line-height: 17px; font-weight: normal; color: #282828;"><strong style="font-family: Calibri, Helvetica, sans-serif; font-size: 15.0px; font-style: normal; line-height: 17px; color:	#FF0000; display: inline;">Thanks & Regards,</strong></td>
</tr>
<tr>
<td style="border-collapse: collapse; padding-bottom: 7px; height: 7px;">&nbsp;</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table style="font-family: Arial,Helvetica,sans-serif; line-height: 0px; font-size: 1px; padding: 0px; border-spacing: 0px; margin: 0px; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td width="92">
<table style="font-family: Arial,Helvetica,sans-serif; line-height: 0px; font-size: 1px; padding: 0px; border-spacing: 0px; margin: 0px; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="border-collapse: collapse; line-height: 0px;"><img src="https://avatars1.githubusercontent.com/u/44359568?s=460&v=4/-/resize/105x120/img.png" width="105" height="120" border="0" /></td>
</tr>
</tbody>
</table>
</td>
<td style="border-collapse: collapse; padding-right: 7px; width: 7px;" width="7">&nbsp;</td>
<td>
<table style="font-family: Arial,Helvetica,sans-serif; line-height: 0px; font-size: 1px; padding: 0px; border-spacing: 0px; margin: 0px; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td>
<table style="font-family: Arial,Helvetica,sans-serif; line-height: 0px; font-size: 1px; padding: 0px; border-spacing: 0px; margin: 0px; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td>
<table style="font-family: Arial,Helvetica,sans-serif; line-height: 0px; font-size: 1px; padding: 0px; border-spacing: 0px; margin: 0px; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="border-collapse: collapse; font-family: Calibri, Helvetica, sans-serif; font-size: 25.0px; font-style: normal; line-height: 32px; font-weight: normal; color: #282828;"><span style="font-family: Calibri, Helvetica, sans-serif; font-size: 30.0px; font-style: normal; line-height: 32px; font-weight: normal; color: #282828; display: inline;">PRADIP KUMAR RAUSHAN</span></td>
</tr>
<tr>
<td style="border-collapse: collapse; font-family: Calibri, Helvetica, sans-serif; font-size: 21.0px; font-style: normal; line-height: 23px; font-weight: bold; color: #282828;"><span style="font-family: Calibri, Helvetica, sans-serif; font-size: 15.0px; font-style: normal; line-height: 23px; font-weight: bold; color: #282828; display: inline;">CSE - SDM College Of Engineering And Technology.</span></td>
</tr>
<tr>
<td style="border-collapse: collapse; font-family: Calibri, Helvetica, sans-serif; font-size: 15.0px; font-style: normal; line-height: 17px; font-weight: normal; color: #282828;"><span style="font-family: Calibri, Helvetica, sans-serif; font-size: 15.0px; font-style: normal; line-height: 17px; font-weight: normal; color: #282828; display: inline;">( Full Stack Developer ).</span></td>
</tr>
<tr>
<td style="border-collapse: collapse; font-family: Calibri, Helvetica, sans-serif; font-size: 15.0px; font-style: normal; line-height: 17px; font-weight: normal; color: #282828;">
<span style="font-family: Calibri, Helvetica, sans-serif; font-size: 15.0px; font-style: normal; line-height: 17px; font-weight: normal; color: #282828; display: inline;"><a style="text-decoration: none;" href="http://pradip.epizy.com">pradip.epizy.com</a></span>
</td>
</tr>
<tr>
<td style="border-collapse: collapse; font-family: Calibri, Helvetica, sans-serif; font-size: 15.0px; font-style: normal; line-height: 17px; font-weight: normal; color: #282828;"><span style="font-family: Calibri, Helvetica, sans-serif; font-size: 14.0px; font-style: normal; line-height: 16px; font-weight: normal; color: #5e4036; display: inline;">Mobile:</span> <span style="font-family: Calibri, Helvetica, sans-serif; font-size: 15.0px; font-style: normal; line-height: 17px; font-weight: normal; color: #282828; display: inline;">+919035867192</span></td>
</tr>
<tr>
<td style="border-collapse: collapse; font-family: Calibri, Helvetica, sans-serif; font-size: 15.0px; font-style: normal; line-height: 17px; font-weight: normal; color: #282828;"><span style="font-family: Calibri, Helvetica, sans-serif; font-size: 15.0px; font-style: normal; line-height: 17px; font-weight: normal; color: #5e4036; display: inline;">Address:</span> <span style="font-family: Calibri, Helvetica, sans-serif; font-size: 15.0px; font-style: normal; line-height: 17px; font-weight: normal; color: #282828; display: inline;">Karnataka,India.</span></td>
</tr>
<tr>
<td style="border-collapse: collapse; padding-bottom: 3px; height: 3px;">&nbsp;</td>
</tr>
</tbody>
</table>
</td>
<td style="border-collapse: collapse; padding-right: 8px; width: 8px;">&nbsp;</td>
<td style="border-collapse: collapse; background-color: #000000; width: 3px;">&nbsp;</td>
<td style="border-collapse: collapse; padding-right: 8px; width: 8px;">&nbsp;</td>
<td>
<table style="font-family: Arial,Helvetica,sans-serif; line-height: 0px; font-size: 1px; padding: 0px; border-spacing: 0px; margin: 0px; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td><a style="font-size: 0px; line-height: 0px;"  title="Facebook" href="https://www.facebook.com/pradipkumarraushan" rel="nofollow noopener"><img src="https://gimm.io/assets/social/24/171616/04facebook.gif" alt="facebook" width="24" height="24" border="0" /></a></td>
</tr>
<tr>
<td style="border-collapse: collapse; padding-bottom: 5px; height: 5px;">&nbsp;</td>
</tr>
<tr>
<td><a style="font-size: 0px; line-height: 0px;"  title="Github" href="https://github.com/pradipkumarraushan" rel="nofollow noopener"><img src="https://gimm.io/assets/social/24/000000/04github.gif" alt="github" width="24" height="24" border="0" /></a></td>
</tr>
<tr>
<td style="border-collapse: collapse; padding-bottom: 5px; height: 5px;">&nbsp;</td>
</tr>
<tr>
<td><a style="font-size: 0px; line-height: 0px;"  title="LinkedIn" href="https://www.linkedin.com/in/pradipkumarraushan/" rel="nofollow noopener"><img src="https://gimm.io/assets/social/24/000000/04linkedin.gif" alt="linkedin" width="24" height="24" border="0" /></a></td>
</tr>
<tr>
<td style="border-collapse: collapse; padding-bottom: 5px; height: 5px;">&nbsp;</td>
</tr>
<tr>
<td><a style="font-size: 0px; line-height: 0px;" title="Email" href="mailto:admin@pradip.epizy.com" rel="nofollow"><img src="https://ucarecdn.com/33ed08dc-a3e0-451f-afaf-4091eb842ffb/-/crop/426x280/236,119/-/preview/" alt="https://ucarecdn.com/33ed08dc-a3e0-451f-afaf-4091eb842ffb/-/crop/426x280/236,119/-/preview/" width="26" height="17" border="0" /></a></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td style="border-collapse: collapse; padding-bottom: 8px; height: 8px;">&nbsp;</td>
</tr>
<tr>
<td style="border-collapse: collapse;">&nbsp;</td>
</tr>
</tbody>
</table>



	';
	$mail->MsgHTML($message_body);

	if($mail->Send())
	{
		$data = array(
			':email_subject'			=>		$_POST["email_subject"],
			':email_body'				=>		$_POST["email_body"],
			':email_address'			=>		$_POST["receiver_email"],
			':email_track_code'			=>		$track_code
		);
		$query = "
		INSERT INTO email_data 
		(email_subject, email_body, email_address, email_track_code) VALUES 
		(:email_subject, :email_body, :email_address, :email_track_code)
		";

		$statement = $connect->prepare($query);
		if($statement->execute($data))
		{
			$message = '<label class="text-success">Email Send Successfully</label>';
		}
	}
	else
	{
		$message = '<label class="text-danger">Email not Send Successfully</label>';
	}

}

function fetch_email_track_data($connect)
{
	/*
	$query = "SELECT  email_data.email_subject,email_data.email_address,email_data.email_body,email_data.email_track_code ,email_track.email_status,email_track.email_open_datetime

FROM email_data

LEFT  JOIN email_track ON email_track.email_track_code = email_data.email_track_code ORDER BY email_track.email_open_datetime DESC"; */
$query = "SELECT email_data.email_subject,email_data.email_address,email_data.email_body,email_data.email_track_code,email_track.email_status,MAX(email_track.email_open_datetime) AS email_open_datetime FROM email_data LEFT JOIN email_track ON email_track.email_track_code = email_data.email_track_code GROUP BY email_data.email_subject,email_data.email_address,email_data.email_body,email_data.email_track_code,email_track.email_status ORDER BY email_open_datetime DESC";

	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '
	<div class="table-responsive">
		<table id="myTable" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th width="25%">Email</th>
				<th width="40%">Subject</th>
				<th width="10%">Status</th>
				<th width="15%">Open Datetime</th>
				<th width="10%">See Details</th>
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
					<td>'.$row["email_address"].'</td>
					<td>'.$row["email_subject"].'</td>
					<td>'.$status.'</td>
					<td>'.$row["email_open_datetime"].'</td>
<form method="post" action="https://localhost/how-to-track-email-open-or-not-using-php/detail_status.php" class="form-horizontal"  target="_blank" onsubmit="target_popup(this)">

					<td>
					    <div class="form-group">
					       <input type="text" name="email_address"  value="'.$row["email_address"].'" hidden="true"/>
					       <input type="text" name="email_subject"  value="'.$row["email_subject"].'" hidden="true"/>
					       <input type="text" name="email_track_code"  value="'.$row["email_track_code"].'" hidden="true"/>
					       <input type="text" name="email_body"  value="'.$row["email_body"].'" hidden="true"/>
					       <input type="submit" name="details" class="btn btn-info" value="See Details" />

				        </div>
				    </td>
</form>				    
				</tr>
			';
		}
	}
	else
	{
		$output .= '
		<tr>
			<td colspan="5" align="center"><strong>No Email Send Data Found</strong></td>
		</tr>
		';
	}
	$output .= '
   <tbody>
   <tfoot>
			<tr>
				<th width="25%">Email</th>
				<th width="40%">Subject</th>
				<th width="10%">Status</th>
				<th width="15%">Open Datetime</th>
				<th width="10%">See Details</th>
			</tr>
		</tfoot>
	</table>';
	return $output;
}
?>
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
		<br />
		<div class="container">
			<h3 align="center">How to Track Email Open or not using PHP</h3>
			<br />
			<?php
			
			echo $message;

			?>
			<form method="post">
				<div class="form-group">
					<label>Enter Email Subject</label>
					<input type="text" name="email_subject" class="form-control" required />
				</div>
				<div class="form-group">
					<label>Enter Receiver Email</label>
					<input type="email" name="receiver_email" class="form-control" required />
				</div>
				<div class="form-group">
					<label>Enter Email Body</label>
					<textarea name="email_body" required rows="5" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<input type="submit" name="send" class="btn btn-info" value="Send Email" />
				</div>
			</form>
			
			<br />
			<h4 align="center">Realtime Open Status Of All Emails </h4>
			<?php 
			
			echo fetch_email_track_data($connect);

			?>
		</div>
		<br>
<script type="text/javascript">
function target_popup(form) {
//alert('hi')
        window.open('',//URL should be blank so that it will take form attributes.
                    'UniqueWindowName', //window name
                    'width=600,height=600,resizeable,scrollbars');
        form.target = 'UniqueWindowName';
    }

$(document).ready(function(){

    $('#myTable').dataTable({
  "lengthMenu": [ [5, 10, 15, 25, 40, -1], [5, 10, 15, 25, 40, "All"] ] ,
  "order": [[ 3, "desc" ]]
});

});
</script>
	</body>
</html>
