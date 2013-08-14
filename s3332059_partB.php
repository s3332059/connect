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
  <select value="tableName">

  <?php
  $result = mysql_query("SELECT region_name FROM region");

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
