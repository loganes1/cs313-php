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
   </header>
   <hr>
   <main>
      <section class="charDetails">
         <?php
            // Get the database connection file
            require_once '../connections.php';
            $stmnt = 0;
            if (isset($_GET["weapon"])) {
               $query = $_GET["weapon"];
               $stmnt = $db->prepare('SELECT * FROM weapon WHERE weaponname=:query');
            } else if (isset($_GET["protection"])) {
               $query = $_GET["protection"];
               $stmnt = $db->prepare('SELECT * FROM protection WHERE protectionname=:query');
            } else if (isset($_GET["spell"])) {
               $query = $_GET["spell"];
               $stmnt = $db->prepare('SELECT * FROM spell WHERE spellname=:query');
            }
            echo "Query: " . $query . "<br>";
            // $statement = $db->prepare("SELECT * FROM character WHERE person='$person'");
            // $statement.execute();
            // while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            //    echo "Got something!";
            //    echo $row['person'] . " " . $row['weaponname'];
            // }

            // $stmt = $db->prepare('SELECT * FROM character WHERE person=:person');
            $stmnt->bindValue(':query', $query, PDO::PARAM_STR);
            $stmnt->execute();
            $rows = $stmnt->fetchAll(PDO::FETCH_ASSOC);

            if (isset($rows)) {
               foreach ($rows as $row)
               {
                  echo "Got something!";
                  print_r($rows);
                  print_r($row);
               }
            }
         ?>
      </section>
   </main>
</body>
</html>