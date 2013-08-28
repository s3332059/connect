<html>

  <head>
    <title>Assignment 1 Part B </title>
  </head>
  
<body>
<?php

 require_once('db.php');

 if(!$dbconn = mysql_connect(DB_HOST, DB_USER, DB_PW))
        {
                echo 'Could not connect to mysql on ' . DB_HOST . '\n';
                exit;
        }

        if(!mysql_select_db(DB_NAME, $dbconn))
        {
     echo 'Could not user database ' . DB_NAME . '\n'; echo mysql_error() . '\n';
          exit;
        }

        mysql_select_db('winestore');

        ?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">

  Wine Name <input type="text" name="winename"><br>
  Winery Name <input type="text" name="wineryname"><br>

  Region <br>
     
  <select value="regionName">
  <?php
  $result = mysql_query("SELECT region_name FROM region");

  while($row = mysql_fetch_array($result)) {
 ?> 
  <option value="$regionName"><?php echo $row["region_name"]?></option>;
<?php
 }
 
?>
  </select>

 <br>
 <br> Grape Variety <br>

  <select value="grapeVariety">
  <?php
  $result = mysql_query("SELECT variety FROM grape_variety");

  while($row = mysql_fetch_array($result)) {
  ?>
  
  <option value="$grapeVariety"><?php echo $row["variety"]?></option>;
 <?php
 }

 ?>
 </select>
 <br>
 <br> Years <br>

 <select value="yearsUp">
 <?php
 $result = mysql_query("SELECT DISTINCT year FROM wine ORDER BY year");

 while($row = mysql_fetch_array($result)) {
 ?>

 <option value="$yearsUp"><?php echo $row["year"]?></option>;

<?php
}

?>
</select>

 <select value="yearsDown">
 <?php
 $result = mysql_query("SELECT DISTINCT year FROM wine ORDER BY year");

 while($row = mysql_fetch_array($result)) {
 ?>

 <option value="$yearsUp"><?php echo $row["year"]?></option>;

<?php
}

?>
</select>

<br>
<br> Minimum number of wine in stock <input type="text" name="minStock">
<br> Minimum number of wine ordered <input type="text" name="minOrder">

<br>
<br>

  <input type="submit" name="submit" value="Search">
 </form>

</body>
  
</html>
