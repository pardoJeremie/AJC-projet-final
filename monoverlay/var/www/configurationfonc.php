<?php

if(isset($_POST["frequency"])){
  $frequency=$_POST["frequency"];
  exec('echo "$(/scripts/sensors_request_frequency '.$frequency.')" > /data/cron/crontabs/root');
  exec('touch /tmp/restartcron');
}

header('Location:/configuration.php');
exit;

?>
