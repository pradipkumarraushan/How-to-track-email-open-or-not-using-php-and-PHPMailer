<?php

//index.php

$connect = new PDO("mysql:host=localhost;dbname=email_track_database", "root", "");
/*Note: Give your website address instead of localhost in $base_url  .Upload your all files of this project in your web folder and import the databse file.  for localhost it will not work in realtime its because of url. 
  */
$base_url = 'http://localhost/how-to-track-email-open-or-not-using-php/';
//$base_url = 'http://example.com/how-to-track-email-open-or-not-using-php/'; 
$message = '';

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

	  ".$_POST['email_body']." <br/> 


                ";



	$message_body .= '<br/><img src="'.$base_url.'email_track.php?code='.$track_code.'" width="1" height="1" />


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
	$query = "SELECT  email_data.email_subject,email_data.email_address,email_data.email_body,email_data.email_track_code ,email_track.email_status,email_track.email_open_datetime

FROM email_data

LEFT  JOIN email_track ON email_track.email_track_code = email_data.email_track_code ORDER BY email_track.email_open_datetime DESC";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '
	<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<tr>
				<th width="25%">Email</th>
				<th width="45%">Subject</th>
				<th width="10%">Status</th>
				<th width="20%">Open Datetime</th>
			</tr>
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
				</tr>
			';
		}
	}
	else
	{
		$output .= '
		<tr>
			<td colspan="4" align="center">No Email Send Data Found</td>
		</tr>
		';
	}
	$output .= '</table>';
	return $output;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>How to Track Email Open or not using PHP</title>
		<script src="jquery.min.js"></script>
		<link rel="stylesheet" href="bootstrap.min.css" />
		<script src="bootstrap.min.js"></script>
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
			<h4 align="center">Sending Email Open or not status</h4>
			<?php 
			
			echo fetch_email_track_data($connect);

			?>
		</div>
		<br />
		<br />
	</body>
</html>