<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- suitable for mobile devices-->
  <title>Data</title>
  <link rel="stylesheet" href="creek.css">
  <script src="node_modules/@webcomponents/webcomponentsjs/webcomponents-bundle.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css">
  <style>

    #displayarea {
      background-color: var(--grey);
      grid-area: 1/2/6/4;
      box-shadow: 0px 0px 8px;
      border-radius: 10px;
      margin: 10px;
      font-size: 18pt;
      font-family: 'Dosis', sans-serif;
      overflow-y: scroll;
      overflow: -moz-scrollbars-vertical;
      min-height: 0;
    }

    #displayarea p {
      margin-left: 15px;
      margin-right: 15px;
    }

    #displayarea table, th, td {
      border: 2px solid black;
    }

    #displayarea table {
      margin: 15px;
      padding: 0px;
    }

    #displayarea td, th {
      padding: 5px;
    }

    #datagrid {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      grid-template-rows: auto auto auto auto auto;
      padding: 10px;
    }

    #buttonarea {
      grid-area: 1/1/6/2;
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      flex-basis: 33%;
    }

    .button {
      display: flex;
      width: 45%;
      margin: 10px;
      border-radius: 10px;
       background: rgba(220,220,220, .6);
      justify-content: center;
      align-items: center;
      font-size: 18pt;
      font-family: 'Dosis', sans-serif;
      box-shadow: 0px 4px black;
    }

    .button:active {
      box-shadow: 0 1px black;
      transform: translateY(3px);
    }

    #displayword {
      margin: 30px;
      margin-top: 0px;
    }

    #displaymedia {
      max-width: 100%;
      background-color: white;
      margin-top: 0px;
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      grid-template-rows: auto;
      grid-auto-flow: row dense;
      grid-auto-columns: 1fr;
      margin-bottom: 10px;
      overflow-x: hidden;

    }

    .displayitem {
      text-align: center;
      margin: 10px;
      max-width: 100%;
    }

    .displayitem iframe{
      width: 100%;
    }

    .displayitem img{
      width: 100%;
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

  </div>
</body>
</html>
