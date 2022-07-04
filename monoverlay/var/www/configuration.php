<?php
  $frequency = exec('cat /data/cron/crontabs/root | grep sensors_request | awk \'{print $1}\' | awk -F  "/" \'{print $2}\' ');
  $wifiname = exec('cat /etc/wpa_supplicant.conf | grep ssid | awk -F "\"" \'{print $2}\'');
  $wifipwd = exec('cat /etc/wpa_supplicant.conf | grep \'#psk\' | awk -F "\"" \'{print $2}\'');
  
  $wifi = exec( 'test -f "/tmp/restartwlan0" && echo -1 || echo 7');
  if ($wifi != -1) {
    $wifi = exec(' (ping -c 3 -I wlan0 1.1.1.1; echo $?)');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
</head>
<body>

<header>
  <h2>AJC Weather Station </h2>
</header>

<section>


  <nav>
    <ul >
      <a href="live.php"  >Live feed</a> | <a href="configuration.php" >Configuration</a> | <a href="documentation.html" >Documentation</a>
    </ul>
  </nav>

  <div class="center">
    <h1> Configuration </h1>

    This page allows you to configure your wifi and the data sampling frequency of the AJC Weather Station.

    <h3> Data sampling frequency </h3>

    <form method="POST" action="configurationfunc.php">
   <p> The data is sampled every
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
    minute(s). </p>
    </form>
    
    <h3> WiFi network 
    <div style=" font-size: 15px; font-style: bold;color: #222;"> 
    <?php   
      if ($wifi == 0){
        echo "You are connected to a wifi network.";
      }
      else if ($wifi == -1) {
        echo "Your wifi network is still initialising.";
      }
      else {
        echo "You aren't connected to any wifi network!";
      }
     ?>
     <div>
    </h3>
    <p>
      When updating to a new WiFi network, wait for a minute for the change to operate then recharge the page.
    </p>
    
    <form action="configurationfunc.php" method="post">
    <p>
    <label style = " display: block;" for="username">Username:</label>

      <input type="text" id="username" name="username" value=<?php echo $wifiname; ?>>
    </p>
    <p>
      <label style = " display: block;" for="password">Password:</label>
      <input type="text" id="password" name="password" value=<?php echo $wifipwd; ?>>
    </p>
    <p>
        <input type="submit" name="Button" class="button" value="Update the WiFi network!" autofocus> 
    </p>
  </form>
</section>
</body>
</html>

