<?php

if(isset($_POST['GPIO17']) &&
   $_POST['GPIO17'] == 'Yes')
{
     exec('echo 1 > /sys/class/gpio/gpio17/value');
}
else
{
    exec('echo 0 > /sys/class/gpio/gpio17/value');
}

header('Location:/control.php');
exit;

?>
