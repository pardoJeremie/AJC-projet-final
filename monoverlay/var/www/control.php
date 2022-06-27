<html>
     <head>
     <title>GPIOs</title>
     </head>
     <body>
     <?php
     $gpiochecked = exec('cat /sys/class/gpio/gpio17/value');
     ?>
     <h1>Test GPIOs</h1>
     <form action="gpio.php" method="post">
     Red led
     <input type="checkbox" name="GPIO17" value="Yes" <?php echo ($gpiochecked==1 ? 'checked' : '');?> onchange="submit();"/>
</form>
      </body>
</html>
