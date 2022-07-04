<?php
$db = new SQLite3('/data/database.db');
header("Refresh:20");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: #f1f1f1;
}

/* Style the header */
header {
  padding: 5px 0 0;
  text-align: center;
  font-style: italic;
  font-size: 25px;
  color: #666;
}

/* Create two columns/boxes that floats next to each other */
nav {
  margin: auto;
  width: 600px;
  padding: 10 0 0px;
  text-align: center;
}

/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}

.center {
margin: auto;
width: 600px;
background-color: #fff;
padding: 10px;
min-height: 700px;
}

.centertext {
  text-align: center;
}



/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
  nav, article, .center {
    width: 100%;
    height: auto;
  }

</style>
</head>
<body>

<header>
  <h2>AJC Weather Station </h2>
</header>

<section>


  <nav>
    <ul >
      <a href="live.php"  >Live feed</a> | <a href="configuration.php" >Configuration</a> | <a href="documentation.php" >Documentation</a>
    </ul>
  </nav>

  <div class="center">
    <h1>Live feed 
    	<div style=" font-size: 15px; font-style: bold;color: #222;"> <?php echo date('Y-m-d - H:i');?> </div>
    </h1>

    <p>The live feed give you an update to date view of the last, maximal and lowest temperature and pressure measurement taken by your AJC weather station and provide you a link to download all the data captured by the station.</p>
    <p>Data collection rate can be changed in the configuration tab.</p>

      <h3>Temperature measurement 
    <p style="padding:0 0 0 15px; font-size: 17px; font-weight: lighter; font-style: italic;color: #222;">
    Actual: <?php echo $db->querySingle('select temperature from bmp180 where date=(select max(date) from bmp180);'); ?> °C / Min: <?php echo $db->querySingle('select min(temperature) from bmp180'); ?> °C / Max: <?php echo $db->querySingle('select max(temperature) from bmp180'); ?> °C 
    </p>
      <h3>Pressure measurement
    <p style="padding:0 0 0 15px; font-size: 17px; font-weight: lighter; font-style: italic;color: #222;">
    Actual: <?php echo $db->querySingle('select pression from bmp180 where date=(select max(date) from bmp180);'); ?> KPa / Min: <?php echo $db->querySingle('select min(pression) from bmp180'); ?> KPa / Max: <?php echo $db->querySingle('select max(pression) from bmp180');?>  KPa 
    </p>


    <h3>Downloading all data </h3>
    <ul style="padding:0 0 0 15px; font-size: 17px; font-weight: lighter; font-style: italic;">
      <a href="downloadall.php" style="color: #555;">Download data.csv</a>
    </ul>

  </div>


</section>
</body>
</html>

