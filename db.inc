<?php
   $hostName = "localhost";
   $databaseName = "u916112314_subs";
   $username = "u916112314_subs";
   $password = "gexhB9Ww0eLb";

   function showerror($connection){	   
      die("Error " . mysqli_errno($connection) . " : " . mysqli_error($connection));
   }

?>
