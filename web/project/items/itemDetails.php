<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="../styles.css">
   <title>Details | Game</title>
</head>

<body>
   <header>
      <h1>Item Details</h1>
      <nav>
         <a href="../index.html">&larr; Home</a>
         <a href="itemList.php">&mdash; Item List</a>
      </nav>
   </header>
   <hr>
   <main>
      <section class="charDetails">
         <?php
         // Get the database connection file
         require_once '../connections.php';
         $stmnt = 0;
         $type = "";
         if (isset($_GET["weapon"])) {
            $query = $_GET["weapon"];
            $stmnt = $db->prepare('SELECT * FROM weapons WHERE displayname=:query');
            $type = "weapon";
         } else if (isset($_GET["protection"])) {
            $query = $_GET["protection"];
            $stmnt = $db->prepare('SELECT * FROM protection WHERE displayname=:query');
            $type = "protection";
         } else if (isset($_GET["spell"])) {
            $query = $_GET["spell"];
            $stmnt = $db->prepare('SELECT * FROM spells WHERE displayname=:query');
            $type = "spell";
         }
         $stmnt->bindValue(':query', $query, PDO::PARAM_STR);
         $stmnt->execute();
         $rows = $stmnt->fetchAll(PDO::FETCH_ASSOC);

         if (isset($rows)) {
            foreach ($rows as $row) {
               switch ($type) {
                  case "weapon":
                     ?>
                  <label>Weapon: <?php echo $row['displayname']; ?></label> <br>
                  <label>Damage: <?php echo $row['damage']; ?></label> <br>
                  <label>Range: <?php echo $row['range']; ?></label> <br>
                  <label>Durability: <?php echo $row['durability']; ?></label>
                  <?php
                  break;
               case "protection":
                  ?>
                  <label>Protection: <?php echo $row['displayname']; ?></label> <br>
                  <label>Armor: <?php echo $row['armor']; ?></label> <br>
                  <label>Durability: <?php echo $row['durability']; ?></label>
                  <?php
                  break;
               case "spell":
                  ?>
                  <label>Spell: <?php echo $row['displayname']; ?></label> <br>
                  <label>Damage: <?php echo $row['damage']; ?></label> <br>
                  <label>Range: <?php echo $row['range']; ?></label> <br>
                  <label>Cost: <?php echo $row['cost']; ?></label> <br>
                  <label>Cooldown: <?php echo $row['cooldown']; ?></label>
                  <?php
                  break;
            }
         }
      }
      ?>
      </section>
   </main>
</body>

</html>