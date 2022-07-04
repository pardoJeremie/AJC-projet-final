<?php
  $frequency = exec('cat /data/cron/crontabs/root | grep sensors_request | awk \'{print $1}\' | awk -F  "/" \'{print $2}\' ');
  
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
    <h1> Configuration </h1>

    <form method="POST" action="configurationfonc.php">
    Select Your frequency
    <select name="frequency" onchange="this.form.submit()">
        <option value="" disabled>--select--</option>
        <option value="1" <?php echo ($frequency==1 ? 'selected' : ''); ?> >1</option>
        <option value="2" <?php echo ($frequency==2 ? 'selected' : ''); ?> >2</option>
        <option value="3" <?php echo ($frequency==3 ? 'selected' : ''); ?> >3</option>
        <option value="4" <?php echo ($frequency==4 ? 'selected' : ''); ?> >4</option>
        <option value="5" <?php echo ($frequency==5 ? 'selected' : ''); ?> >5</option>
        <option value="6" <?php echo ($frequency==6 ? 'selected' : ''); ?> >6</option>
        <option value="10" <?php echo ($frequency==10 ? 'selected' : ''); ?> >10</option>
        <option value="12" <?php echo ($frequency==12 ? 'selected' : ''); ?> >12</option>
        <option value="15" <?php echo ($frequency==15 ? 'selected' : ''); ?> >15</option>
        <option value="20" <?php echo ($frequency==20 ? 'selected' : ''); ?> >20</option>
        <option value="30" <?php echo ($frequency==30 ? 'selected' : ''); ?> >30</option>
    </select>
    </form>
</section>
</body>
</html>

