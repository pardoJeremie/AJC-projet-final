
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


</section>
</body>
</html>

