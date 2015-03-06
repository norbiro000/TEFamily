

<html>
<head>
<title>Admin Page</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="profile">
<?php
echo "Hello <b id='welcome'><i>" . $username . "</i> !</b>";
echo "Welcome to Admin Page";
echo "Your Username is " . $username;
echo "Your Password is " . $password;
echo "STD is " . $studentid;
echo "Your Type is " . $usertype;
echo base_url();
?>
<b id="logout"><a href="logout">Logout</a></b>
</div>
</body>
</html>

