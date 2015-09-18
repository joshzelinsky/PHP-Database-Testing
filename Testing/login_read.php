<?php include "db.php";?>
<?php include "functions.php";?>
<?php include "header.php" ?>
   
<?php showAllData(); ?>
    
<div class="container">
    <div class="col-sm-6">
       
<pre>
<?php readRows(); ?>
</pre>
        
    </div>
    
<?php include "footer.php"?>