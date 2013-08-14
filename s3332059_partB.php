<html>

  <head>
    <title>Assignment 1 Part B </title>
  </head>
  
<body>

<?php $result = mysql_query("Select * from region"); ?>

// $result is populated from mysql query
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
  <select value="tableName">
  <?php
  while($row = mysql_fetch_row($result)) {
  $tableName = $row[0];
  echo '<option value="$tableName">$tableName</option>';
  }
  ?>
  </select>
  <?php // you will need another drop down list here ?>
  <input type="submit" name="submit" value="Run Query">
</form>

</body>
  
</html>
