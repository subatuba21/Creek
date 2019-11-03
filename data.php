<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- suitable for mobile devices-->
  <title>Study Sites</title>
  <link rel="stylesheet" href="creek.css">
  <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet">
  <style>
    #displaytitle {
      background-color: 	#809c13;
    }
    #displayarea {
      background-color: 	#809c13;
    }
    #displaymedia {
      background-color: 	#809c13;
    }
  </style>
</head>
<body>
  <?php
  session_start();
  $_SESSION['page']="data";
  include 'navbar.php';
  ?>
  <div id="datagrid">
    <div id="buttonarea">
      <div class="button">
        Conductivity
      </div>
      <div class="button">
        Turbidity
      </div>
      <div class="button">
        Temperature
      </div>
      <div class="button">
        Productivity
      </div>
      <div class="button">
        Depth
      </div>
      <div class="button">
        Phosphate Levels
      </div>
      <div class="button">
        pH
      </div>
      <div class="button">
        Nitrate
      </div>
      <div class="button">
        Humidity
      </div>
      <div class="button">
        Flow Rate
      </div>
      <div class="button">
        DO
      </div>
      <div class="button">
        Plankton Net
      </div>
      <div class="button">
        Kick Net
      </div>
      <div class="button">
        Seine Net
      </div>
      <div class="button">
        Dip Net
      </div>
      <div class="button">
        Succession
      </div>
      <div class="button">
        Sediments
      </div>
      <div class="button">
        Clean Up
      </div>
    </div>
    <script src="js/data.js" charset="utf-8"></script>
    <div id="displayarea">
      <h2 id='displaytitle'>Conductivity</h2>
      <div id="displaymedia">

        <div class="displayitem">
          <img src="data/conductivity/conduct2.jpg" alt="">
        </div>
        <div class="displayitem">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/-QF27bncXAQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="displayitem">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/-QF27bncXAQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="displayitem">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/-QF27bncXAQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
      <p id="displayword">

        Water is one of the most efficient solvents in the natural world and has the ability to dissolve a great many solids. Many of these solids when put into solution separate into charged atoms or molecules and can then carry an electrical charge. For example, chloride, nitrate and sulfate carry negative charges, while sodium, magnesium and calcium have a positive charge.
        These dissolved substances increase water's conductivity - its ability to conduct electricity. Therefore, measuring the conductivity of water indirectly indicates the amount total dissolved solids (TDS). It's not a perfect measure because some substances, particularly organic compounds like oil, alcohol or sugar do not conduct electricity well and have low conductivity, but conductivity is a rough approximation of TDS.
        Each stream tends to have a relatively constant range of conductivity that, once established, can be used as a baseline for comparison with regular conductivity measurements. Significant changes in conductivity could then be an indicator that a discharge or some other source of pollution has entered a stream.
        Electrical conductivity (EC) estimates the amount of total dissolved salts (TDS), or the total amount of dissolved ions in the water. EC is controlled by:
        geology (rock types) - The rock composition determines the chemistry of the watershed soil and ultimately the lake. For example, limestone leads to higher EC because of the dissolution of carbonate minerals in the basin.



        attributes of the site being measured. Total volume of water,depth and rate of flow will all impact the concentration of TDS and therefore impact the conductivity of the water at that site.

        wastewater from storm drains carrying water from surface streets into the Arroyo (point source pollutants). After a rainfall we often see significant increases in conductivity where storm drain water enters the Arroyo. An assortment of substances will wash off surface streets and make their way at some point into the Arroyo and eventually to the S.F. Bay.

        agricultural runoff of water draining agricultural fields or the lawns of Pleasanton residents. Fertilizers, herbicides, insecticides, soil treatments and an assortment of other products used to enhance the growth of plants darin into the Arroyo as a result of over watering, rainfall, or leaching through the bedrock.

        evaporation of water from the surface concentrates the dissolved solids in the remaining water - and so it has a higher EC. Measurements of conductivity historically have been highest in late August and early September.

        bacterial metabolism - as the temperature increases and limiting nutrients become more abundant, algae grows out of control. Substantial amounts of dead algae accumulates at the bottom of the Arroyo. This material is decomposed by bacteria. Their metabolism releases the potential energy stored in the chemical bonds of the organic carbon compounds, consumes oxygen in oxidizing these compounds, and releases carbon dioxide (CO2) after the energy has been liberated (burned). This CO2 rapidly dissolves in water to form carbonic acid (H2CO3), bicarbonate ions (HCO3- ) and carbonate ions (CO3-) the relative amounts depending on the pH of the water. This newly created acid gradually decreases the pH of the water and the "new" ions increase the TDS, and therefore the EC.

        atmospheric inputs of ions can increase TDS. Stagnant air can have a significant load of pollutants and lead to a"smog alert". The burning of fossil fuels is primarily responsible for this and can promote an increase in conductivity.


        In the Fall of 2007 we started collecting conductivity measurements using the Vernier LabPro equipped with a conductivity probe (below) which is connected to a laptop running Logger Pro Software. Conductivity is measured in microSiemens/cm. The sensor simply consists of two metal electrodes that are exactly 1.0 cm apart and protrude into the water. A constant voltage (V) is applied across the electrodes. An electrical current (I) flows through the water due to this voltage and is proportional to the concentration of dissolved ions in the water - the more ions, the more conductive the water resulting in a higher electrical current which is measured electronically.
      </p>
    </div>
  </div>
</body>
</html>
