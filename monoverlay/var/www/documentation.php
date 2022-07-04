
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
  <h1> Documentation </h1>

  <p> The AJC Weather Station is the end project of the formation "software developer C++ embarque" (April-July 2022)</p>

  <h3>Subject</h3>

  <p> The principle of this project is to manufacture a Netatmo-type WiFi temperature and pressure sensor that can be integrated into a domestic environment.</p>
  <p>It must be able to provide live weather information via a web API but also a history of measurements over the previous days, weeks, months and years.</p>
  <p> AJC Weather Station must also withstands the constraints of a consumer device (CE), in particular power cuts and sudden stops.</p>

  <h3>Team and source code</h3>
  <p> This project was realised by ADELAIDE HUIS Marco and PARDO Jérémie. </p>

  <p> All source quand be found on <a href="https://github.com/pardoJeremie/AJC-projet-final" style="color: #555;">Github</a>.</p>
</section>
</body>
</html>

