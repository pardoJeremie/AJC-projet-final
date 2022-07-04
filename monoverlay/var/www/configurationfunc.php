<?php

if(isset($_POST["frequency"])){
  $frequency=$_POST["frequency"];
  exec('echo "$(/scripts/sensors_request_frequency '.$frequency.')" > /data/cron/crontabs/root');
  exec('touch /tmp/restartcron');
}
else if(array_key_exists('Button', $_POST)) {
  exec('(echo -e "ctrl_interface=/var/run/wpa_supplicant\nap_scan=1"; wpa_passphrase '.$_POST['username'].' '.$_POST['password'].') > /data/etc/wpa_supplicant.conf ');
  exec('touch /tmp/restartwlan0');
}
header('Location:/configuration.php');
exit;

?>

