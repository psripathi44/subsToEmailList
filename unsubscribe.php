<html>
<head>
    <link href="../CSS/styles.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Tajawal" rel="stylesheet">
</head>
<body style="text-align: center">
<div class="topnav">
    <a href="http://subscribemaillist.gologg.com/">Home</a>
    <a href="http://subscribemaillist.gologg.com/sendEmail/">Test Unsubscribe link</a>
    <a class="active" href="#Unsubscribe">Unsubscribe</a>
</div>    
    <?PHP
        require "encryptDecrypt.php";
        require "db.inc";
        $emailSubCodeEnc = $_REQUEST['uEMailCode'];
        $lCurrTime = date("Y-m-d H:i:s");
        if (!($connection = @ mysqli_connect("localhost", $username, $password)))//Connecting to localhost
            die("Could not connect to database");

        if (!mysqli_select_db($connection, $databaseName)) //connecting to Database using "db.inc"
            showerror($connection);

        $key = 'dc2c9daafa96835122a5c1608casdasdasd4ef4we3ad4232asd64e45d=';
        $unSubEmail = decrypted($emailSubCodeEnc, $key);
        $deleteFromMailList = "update mailinglist set endDate='$lCurrTime' where emailId ='{$unSubEmail}';";

        if(!@mysqli_query ($connection, $deleteFromMailList))
            print "<br/><br/><span class='outcome'>This shouldn't happen, but there was an issue while unsubscribing you. Please try again in a while.</span>";
        else
            print "<br/><br/><span class='outcome'>It is done. We're sorry to see you go.</span>";
    ?>
</body>
</html>
