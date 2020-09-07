$to = "$email";
$from = "support@e-voting.com";
$subject = 'Voters Registration';
$message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Your Voters Registration </title></head>
<body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px; background:#333;
font-size:24px; color:#CCC;">Voters Registration</div>
<div style="padding:24px; font-size:17px;">Hello '.$username.',<br /> <br>You Have Been Registered Successfully And Now Qualified To participate in the upcoming election<br />
    <br />Your Voting Id is : '.$voters_id.' <br /><br />
    <h3>You can vote for your desired candidate on election day<br /><br />

        <br /><br />You can Always Login using your:<br />* Voters ID: <b>'.$voters_id.'</b></div></body></html>';
$headers = "From: $from\n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";