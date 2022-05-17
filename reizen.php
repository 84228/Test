<!DOCTYPE html>
<?php 
	session_start();

    // To only give access to a page if a user is logged in  

    // if(!isset($_SESSION['username'])){
    //     header("Location: login.php");
    // } else { 
      
    // }

    //Login / Loguit systeem
    if(!isset($_SESSION['username']))
    {
        $login = '<a class="nav-link" href="login.php">Login</a>';
    }
    else
    {
        if ($_SESSION['user-lvl'] == 1)
        {
            $login = '<a class="nav-link" href="loguit.php">Loguit</a>';
    
        }
    
        else if ($_SESSION['user-lvl'] >= 1)
        {
            $login = '<a class="nav-link" href="loguit.php">Loguit</a>';
        }
        
        else if ($_SESSION['user-lvl'] <= 1)
        {
            $login = '<a class="nav-link" href="loguit.php">Loguit</a>';
        }

    }
    $ulvl = $_SESSION['user-lvl'];
    $reisID   = $_SESSION['reisID'];
    // $ID = $_GET['inschrijving'];
    // verifieer lvl van persoon (admin lvl req)
    if ( $ulvl == "2") {
    //site here
    
    
    }
    //Normal
    else{

    } 
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="scss/main.css">
    <title>Reizen Inschrijvingen</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Ga Lekker Reizen</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="overzicht.php">Overzicht</a>
                    </li>
                    <li class="nav-item">
                        <?php echo $login; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php require_once 'reizen_process.php'; ?>

    <?php 
    //Laat een confirmatie bericht zien na het toevoegen of verwijderen van een gebruiker 
    if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">

            <?php 
                echo $_SESSION['message'];
                unset ($_SESSION['message']);
            ?>

        </div>

    <?php endif ?>
    <h1> Inschrijven voor: </h1>
        <div class="container">
        <?php 
            //call naar de config file
            require_once 'config.php';
           
            //laat alles zien van de databse tafel: "inschrijvingen"
            // $ID = isset($_GET['inschrijving']) ?$_GET['inschrijving'] :"";
            $result = $mysqli->query("SELECT $reisID FROM reizen WHERE reisID=$reisID") or die($mysqli->error);
            echo $ID;
            // pre_r($result);
            // pre_r($result->fetch_assoc());
            ?>

            <div class="row justify-content-center">
                <table class="table"> 
                    <thead>
                        <tr>
                            <th>Naam</th>
                            <th>Studentennummer</th>
                            <th>ReisID</th>
                            <th>Opmerkingen</th>
                            <th colspan="2">Action</th> 
                        </tr>
                    </thead>
                    <?php
                        while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $row['naam']; ?></td> 
                                <td><?= $row['studentennummer']; ?></td> 
                                <td><?= $row['reisID']; ?></td>
                                <td><?= $row['opmerkingen']; ?></td>  
                                <td>
                                <!-- $reisID == $row['reisID']; ||  -->
                                    <?php if( $ulvl == "2" ) { ?>
                                        <a href="reizen.php?edit=<?= $row['id']; ?>" class="btn btn-info">Edit</a>

                                        <?php } else { } ?>

                                    <?php 
                                        // verifieer lvl van persoon (admin lvl req)
                                        if ( $ulvl == "2") {
                                            //site here
                                            ?>
                                            <a href="reizen_process.php?delete=<?= $row['id']; ?>" class="btn btn-danger">Delete</a>
                                            <?php } 
                                        //level 1 
                                            else{
                                                
                                            } 
                                    ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                </table>
            </div>

            <?php 
            //functie voor het uitlezen van de database table
            //gebruikt bij het testen
            function pre_r( $array ) {
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }

        ?>
        <!-- de form -->
        <div class="row justify-content-center">
            <form action="reizen_process.php" method="POST"> 
            <?php 
                 $id   = $_SESSION['id'];
                 $naam   = $_SESSION['naam'];
                 $student   = $_SESSION['studentennummer'];
                 $result2 = $mysqli->query("SELECT `counter` FROM reizen WHERE $ID") or die($mysqli->error);
                 $row2 = $result2->fetch_assoc();
                 $counter = $row2['counter']; + 1; 
                //  $counter2 = $row2['counter']; - 1; 
                 ?>

                <input type="hidden" name="id" value="<?= $id; ?>">
                <input type="hidden" name="ID" value="<?= $ID; ?>">
                <input type="hidden" name="counter" value="<?= $counter; ?>">
                <input type="hidden" name="naam" value="<?= $naam; ?>">
                <input type="hidden" name="studentennummer" value="<?= $student; ?>">
                <div class="form-group"> 
                    <label>opmerkingen</label>
                    <input type="text" name="opmerkingen" class="form-control" value="" placeholder="Enter your opmerkingen"> 
                </div> 
                <div class="form-group button">
                    <!-- verander de knop van Save naar Update  -->
                    <?php 
                        if ($update == true) { 
                    ?>
                        <button type="submit" class="btn btn-info" name="update">Update</button> 
                        <a href="index.php" class="btn btn-secondary">Back</a>
                    <?php } else { ?> 
                            <button type="submit" class="btn btn-primary" name="save">Save</button> 
                    <?php } ?>
                    
                </div>
            </form> 
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
</body>
</html>


