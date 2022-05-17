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
    $reisID   = $_SESSION['userID'];
    
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
    <title>Examen Training</title>
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
    <div class="login">
            <a href="login.php" class="text-decoration-none link-light" >Log hier in</a>
        </div>
    <div class="row1">
        <div class="blocks-group">
            <div class="block text">
                <h3>Kort Verhaaltje</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu libero non odio cursus viverra. 
                    Nam quis magna enim. Phasellus a ipsum metus. Sed sem leo, porttitor bibendum sodales eu, placerat non lorem. 
                    Maecenas semper ultrices dolor, sed congue nisi eleifend eget. Aliquam tortor enim, pretium ac nunc sit amet, mattis vestibulum lorem. 
                    In tempor nulla ut diam egestas, in efficitur ex porttitor. Vivamus suscipit orci non elit ultricies, in posuere velit imperdiet. 
                    Nulla in felis egestas, dignissim nisl vitae, condimentum velit. Morbi in diam pulvinar urna tincidunt pellentesque ac eu nunc. 
                    Nullam mattis ac mi et molestie. Donec condimentum, sapien ac dapibus ultricies, ligula magna ullamcorper eros, in pellentesque leo nunc ut ante. 
                    Aenean sit amet odio eu nulla placerat consequat. Nulla eget facilisis metus.
                    Aenean tempus tellus leo, vel elementum diam ultricies nec. In semper augue ac mi rhoncus pellentesque. 
                    Sed in orci faucibus, luctus nunc eget, dapibus libero. Donec nec ex tortor. Proin nulla lectus, condimentum nec tortor sed, faucibus ultricies tortor. 
                    Sed ut risus id orci accumsan bibendum. Maecenas posuere accumsan turpis at facilisis. Vivamus a diam metus. Praesent luctus, dui sit amet volutpat semper, 
                    ligula nunc feugiat ipsum, ac eleifend ligula ligula quis metus. Mauris vel magna turpis. Ut cursus porttitor arcu volutpat condimentum.
                </p>
            </div>
            
            <div class="block contact">
                <h3>Contact Gegevens</h3>
                <ul>
                    <li>
                        <strong>Bedrijf:</strong> 
                        <a href="https://www.glr.nl/" class="text-decoration-none link-success">GLR</a> 
                    </li>
                    <li>
                        <strong>Organisatie:</strong>
                        Ga Lekker Reizen
                    </li>
                    <li>
                        <strong>Telefoonnummer:</strong>
                        +31 (0)88 200 1500
                    </li>
                    <li>
                        <strong>Adres:</strong>
                        Heer Bokelweg 255, 3032 AD Rotterdam
                    </li>
                </ul>
            </div>
            <!-- Moet nog worden toegevoegd -->
            <div class="block image">
                
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
</body>
</html>
