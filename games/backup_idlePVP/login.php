<?php

session_start();

if(isset($_SESSION["username"])){
    header("location:index.php");
    exit();
}

  include './php/dbconnect.php';
    //add stats
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link rel="stylesheet" type="text/css" href="./tooltipster.css" />
    <link rel="stylesheet" href="./jquery.mCustomScrollbar.css" />
  <style type="text/css">
  *               {padding:10px;margin:0;font-family: Verdana,Geneva,sans-serif;}
  body            {background:#2A363B;color:#fff;overflow-x:scroll;padding-top:20px;font-size:14px;max-width:800px;
-webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }
  header{background:#E84A5F;padding:10px;border-radius: 3px;}
  header small{color:#fff;}
  .gear{background:#1A262B;padding:10px;border-radius: 3px;margin: 20px 0;}
  h1{padding: 0}
  h2{background:#2A363B;color:#99B898;}
  h3{/*background:#FECEA8;color:#2A363B;*/color:#99B898;padding:5px;padding-bottom: 0;padding-top: 20px;}
  h4{color:#FECEA8;padding-bottom: 0;}
  h5{color:#FECEA8;}
  p{
    /*background:#2A363B;*/
    padding: 2px 10px;
  }
  a{text-decoration: none;color:#777;}
  a:hover{text-decoration: underline;color:#aaa;}
  g{color:#2A363B;padding:0;}
#sword_one{width:80px;height: 200px;box-shadow:inset 0 0 10px 0 #000;overflow:hidden;border-radius: 3px;padding:0;margin:10px;margin-top: 5px;display:inline-block;}
#sword_one{background: url("./php/spade.php?id=<?php echo $sword_id; ?>&q=10&invert=0");}
#shield_one{width:80px;height: 80px;box-shadow:inset 0 0 10px 0 #000;overflow:hidden;border-radius: 3px;padding:0;margin:10px;margin-top: 5px;display:inline-block;}
#shield_one{background: url("./php/shield.php?id=<?php echo $shield_id; ?>&q=10&invert=0");}
#treasure{width:200px;height: 200px;box-shadow:inset 0 0 10px 0 #000;overflow:hidden;border-radius: 3px;padding:0;margin:10px;margin-top: 5px;position: relative;left: 50%;margin-left:-100px;}
#treasure{background: url("./imgs/treasure_chest.png");
background-repeat: no-repeat;
background-position: center;
background-color: #1f1f1f;}
#treasure:hover{cursor: pointer;}

#sword_graph{width:80px;height: 80px;box-shadow:inset 0 0 10px 0 #000;overflow:hidden;border-radius: 3px;padding:0;margin:10px;margin-top: 5px;display:inline-block;}
#sword_graph{background: url("./php/graph.php?id=<?php echo $sword_id; ?>");}
#shield_graph{width:80px;height: 80px;box-shadow:inset 0 0 10px 0 #000;overflow:hidden;border-radius: 3px;padding:0;margin:10px;margin-top: 5px;display:inline-block;}
#shield_graph{background: url("./php/graph.php?id=<?php echo $shield_id; ?>");}
.q0{border:solid 1px #999; !important}
.q1{border:solid 1px #04A3E4; !important}
.q2{border:solid 1px #cFcF14; !important}
.q3{border:solid 1px #D107FF; !important}
.q4{border:solid 1px #FF3C35; !important}
.q5{border:solid 1px #FFA347; !important}
/*QUALITY COLORS*/
#q0{color:#bbb;}
#q1{color:#04A3E4;}
#q2{color:#cFcF14;}
#q3{color:#D107FF;}
#q4{color:#FF3C35;}
#q5{color:#FFA347;}

td{background:#142025;padding:4px;text-align:center;width:40px;font-size:10px;}
table{margin-bottom:20px;}
#sword_stats,#shield_stats{margin:0;padding:0;}
.element{margin:0;padding:0;}
td img{height:20px;}
small{font-size:9px;color:#888;margin-bottom:8px;}
sml{font-size:10px;padding:0;margin:0;}
.centrato{text-align: center;padding: 0;margin:0;}
.achbox{background: #232f34;padding: 5px 0;margin:6px;}
.achbox small{padding: 1px 8px;display: block;margin:0;}
.achbox p{padding: 1px 8px;display: block;margin:0;color:#ad8;}
.done{color:#8da;}
input,button{display: block;width:200px;position: relative;left: 50%;margin-left: -110px;margin-bottom:10px;margin-top:10px;padding:8px;border-radius:4px;border:solid 1px #aaa;}
input{box-shadow: inset 0 0 6px #000;background:#2A363B;color:#fff;}
button{color:#fff;background:#4c8;width: 220px;}
button:hover{background:#5d9;cursor:pointer;}


  </style>
</head>
<body>

  <header>
    <h1>Idle Duels</h1><small>v0.3</small>
  </header>


  <div class="gear">
    <br>
    <div class="centrato" id="treasure_title">
    <h1>Enter</h1>
      <small>Insert the name of an existing player or a new one.</small>
      <form action="./php/enter.php" method="POST">
        <input type="text" name="u" placeholder="username"/>
        <button>Enter / Create New</button>
      </form>
    </div>
  </div>

  <div class="gear">
    <h1>Tournaments</h1>
    <h3>Global</h3>
    <p>1. Username</p>
    <p>2. Username</p>
    <p>3. Username</p>
    <a href="#">.full list</a>

    <h1>Statistics</h1>
  </div>


  <div class="gear">
    <h1>About this game</h1>
    <br>
    <p>This is a game played by my server, you can only create new "players" and monitor them while they duel with the others!</p>
    <p>You can create a new player entering a new name, if the name already exists means that an other user already used that name.</p>
    <p>If you want you can still monitor other players characters and help them opening treasures!</p>
    <p>Every time you open a treasure, a sword or a necklace will be dropped and equipped if it's more powerful for the character's specific dynasty</p>
    <p>This is a world where everybody fight each other randomly and in organized tournaments!</p>
    <p>Yes, every character will fight naked, only wearing that necklace and with his sword in his hands.</p>
    <p>This world is divided into dynasties.</p>
    <p>Every day (always at the same hour) a tournament is held to choose one champions from each dynasty.</p>
    <p>When the six champions will be chosen they will fight in one last tournament to find out who is the global champion, the strongest and which dynasty is the best!</p>
    <p></p>
    <br>
  </div>


  <br>
  <br>
  <br>

</body>
</html>