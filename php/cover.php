<?php
    $querySelect= "SELECT * FROM cover";

    $resultat= mysqli_query($bdd,$querySelect);

    while($data=mysqli_fetch_assoc($resultat)){

        $cover=$data['img'];
        $title=$data['title'];
        $text=$data['text'];
    }

?>

<div class="container-fluid" id="cover" style="background: url('public/img/<?php echo $cover;?>') center center; background-repeat: no-repeat; min-height: 750px; background-size: cover; position: relative;">
    <nav class="navbar navbar-inverse navbar-fixed-top" id="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapsed" aria-expanded="false">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#top"><img src="public/img/logo-min.png" class="navbar-logo"></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapsed">
                <ul class="nav navbar-nav">
                    <li><a href="#concept">Concept</a></li>
                    <li><a href="#menu">Carte</a></li>
                    <li><a href="#carte">Où nous trouver</a></li>
                    <li><a href="#footer">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row text-center">
        <div class="col-xs-10 col-xs-offset-1 cover-text">
            <h1 class="cover-h1"><?php echo $title;?></h1>
            <h2 class="cover-h2"><?php echo $text;?></h2>
        </div>
    </div>
</div>