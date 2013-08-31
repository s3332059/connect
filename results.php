<html>
 <title>Results for part B</title>
<body>

<?php

require_once('db.php');


 function showerror() {
    die("Error " . mysql_errno() . " : " . mysql_error());
 } 

 function displayWinseList(){
    
    //@ symbol used to suppress error messages
    //runs query and returns error if something goes wrong
    if (!($result = @ mysql_query ($query, $dbconn))) {
      showerror();
    }

    $rowNum = @ mysql_num_rows($result);

   if ($rowsNum > 0) {

     print "Wines of $regionName<br>";

     print "\n<table>\n<tr>" .
         "\n\t<th>Wine ID</th>" .
         "\n\t<th>Wine Name</th>" .
         "\n\t<th>Year</th>" .
         "\n\t<th>Winery</th>" .
         "\n\t<th>Description</th>\n</tr>";

    //Display each row
     while ($row = @ mysql_fetch_array($result)) {
      print "\n<tr>\n\t<td>{$row["wine_id"]}</td>" .
          "\n\t<td>{$row["wine_name"]}</td>" .
          "\n\t<td>{$row["year"]}</td>" .
          "\n\t<td>{$row["winery_name"]}</td>" .
          "\n\t<td>{$row["description"]}</td>\n</tr>";
     }  

     print "\n</table>";

   }
   
   print "{$rowsNum} records found matching your criteria<br>";  

 }

 If (!($dbconn = @ mysql_connect(DB_HOST, DB_USER, DB_PW)) {
   die("Could not connect");
 }

 $regionName = $_GET['regionName'];

 if (!mysql_select_db(DB_NAME, $dbconn)) {
  showerror();
   
 }

 //Start query
 $query = "SELECT wine_id, wine_name, description, year, winery_name 
  FROM winery, region, wine
  WHERE winery.region_id = region.region_id
  AND wine.winery_id = winery.winery_id";

 //If user specified region
 if (isset($regionName) && $regionName != "All") {
   $query .= " AND region_name = '{$regionName}'";
 }

 $query .= " ORDER BY wine_name";

 displayWinesList($dbconn, $query, $regionName);
 


?>



</body>


</html>
