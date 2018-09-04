<html>
<head>
    <link href="CSS/styles.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Tajawal" rel="stylesheet">
</head>
<body style="text-align: center">
    <div class="topnav">
        <a class="active" href="#home">Home</a>
        <a href="http://subscribemaillist.gologg.com/sendEmail/">Test Unsubscribe link</a>
    </div>

    <form action="" method="POST" enctype="multipart/form-data">
        <p class="title"> Subscribe here for my periodic tech tips.</p>
        <span class="subTitle">Infrequent updates only.</span><br/><br/><br/>
        <input type="email" name="inpEmail" value="" placeholder="Enter email here" class = "formTextbox" required/> 
        <input type="submit" name="submit" class= "formButton" value="Subscribe"/>
    </form>
    <?PHP
        require "db.inc";
        if (!($connection = @ mysqli_connect("localhost", $username, $password)))//Connecting to localhost
            die("Could not connect to database"); 

        if (!mysqli_select_db($connection, $databaseName)) //connecting to Database using "db.inc"
            showerror($connection);

        if(isset($_POST["inpEmail"])){
            $inpEmail = $_POST["inpEmail"]; //Fetching the email address given as the input
            $addToMailList = "insert into mailinglist(emailId) values('{$inpEmail}');";

            if(!@mysqli_query ($connection, $addToMailList)){
                print "<br/><br/><span class='outcome'>Oops, looks like you're already subscribed, if you feel this message is in error, please try later.</span>";
                //throw new Exception(showerror($connection));
            } else {
                print "<br/><br/><span class='outcome'>You've been added to the magic list. Look out for my email.</span>";
                //throw new Exception(showerror($connection));
            }
        }
    ?>
</body>
</html>
