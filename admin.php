<?php
include('php/bdd.php');
$bdd = mysqli_connect(SERVER, USER, PASS, DB);
mysqli_set_charset($bdd, 'utf8');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Espace GodAdmin | Cameleon Voyageur</title>

    <!-- Bootstrap -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header navbar-fixed-top">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#admin-collapsed"
                    aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="admin-collapsed">
            <ul class="nav navbar-nav">
                <li><a href="#orders">Commandes</a></li>
                <li><a href="#cover">Couverture</a></li>
                <li><a href="#concept">Concept</a></li>
                <li><a href="#cat">Catégories du menu</a></li>
                <li><a href="#item">Item du menu</a></li>
                <li><a href="#map">Plan</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 ">
            <h1>Couverture</h1>
            <div class="panel-group" id="cover" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="coverHeadingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#cover" href="#coverCollapseOne"
                               aria-expanded="true" aria-controls="coverCollapseOne">
                                Modifier la couverture
                            </a>
                        </h4>
                    </div>
                    <div id="coverCollapseOne" class="panel-collapse collapse in" role="tabpanel"
                         aria-labelledby="coverHeadingOne">
                        <div class="panel-body">
                            <form method="post" action="php/action.php" enctype="multipart/form-data">
                                <input type="text" placeholder="Entrez votre titre principal" name="title"><br>
                                <input type="text" placeholder="Entrez votre titre secondaire" name="text">
                                <input type="file" value="Photo de couverture" name="img">
                                <input type="submit" value="modifCover" name="action">


                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <?php
                $querySelect = "SELECT * FROM concept";

                $resultat = mysqli_query($bdd, $querySelect);

                while ($data = mysqli_fetch_assoc($resultat)) {
                    $id = $data['id'];
                    $img = $data['img'];
                    $title = $data['title'];
                    $text = $data['text'];


                    echo "  <div class=\"col-sm-6 col-md-4\">
                    <div class=\"thumbnail\">
                        <img src=\"public/img/$img\" alt=\"...\">
                        <div class=\"caption\">
                            <h3>$title</h3>
                            <p>$text</p>
                            <p><a href=\"#\" class=\"btn btn-primary\" role=\"button\" data-toggle=\"modal\" data-target=\"#modalconcept$id\">Modifier</a></p>
                        </div>
                    </div>
                </div>
                <div class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" id=\"modalconcept$id\">
                  <div class=\"modal-dialog\" role=\"document\">
                    <div class=\"modal-content\">
                      <div class=\"modal-header\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                        <h4 class=\"modal-title\">Modifier le concept</h4>
                      </div>
                      <div class=\"modal-body\">
                      <!--Modification du concept-->
                        <form method=\"post\" action=\"php/action.php\" enctype=\"multipart/form-data\">
                                <input type=\"text\" placeholder=\"Entrez votre titre principal\" name=\"title\"><br>
                                <textarea name='text' placeholder='Entrez votre description'></textarea>
                                <input type=\"file\" value=\"Photo\" name=\"img\">
                                <input type='hidden' value='$id' name='id'>
                                <input type=\"submit\" value=\"modifConcept\" name=\"action\">
                        </form>
                      </div>
                    </div>
                  </div>
                </div>";

                }

                ?>

            </div>

            <?php

            $querySelect = "SELECT * FROM cat_menu";
            $resultat = mysqli_query($bdd, $querySelect);

            $select = "<select class=\"form-control\" name='id_cat_menu'> ";

            while ($data = mysqli_fetch_assoc($resultat)) {
                $id = $data['id'];
                $title = $data['title'];


                $select .= "<option value=$id>$title</option>";
            }

            $select .= '</select>';

            ?>

            <a href="#" class="btn btn-primary" role="button" data-toggle="modal" data-target="#ajoutermenu">Ajouter un
                menu</a>

            <div class="modal fade" tabindex="-1" role="dialog" id="ajoutermenu">
                <div class="modal-dialog" role="document">
                    <div class=\"modal-content\">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Modifier le menu</h4>
                        </div>
                        <div class="modal-body">
                            <!--Modification du concept-->

                            <form method="post" action="php/action.php" enctype="multipart/form-data">
                                <?php echo $select; ?>
                                <label for='item'>Entrez le nom du produit</label>
                                <input type="text" name="item"><br>
                                <label for='text'>Entrez votre descriptif</label>
                                <textarea name='text'></textarea>
                                <label for='price'>Fixez votre prix</label>
                                <input type="text" name="price"><br>
                                <input type="file" name="img">
                                <input type='hidden' name='id'>
                                <input type="submit" value="addmenu" name="action">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th>Type</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Actions</th>
                </tr>

                </thead>

                <tbody>


                <?php
                $querySelect = "SELECT * FROM cat_menu";
                $resultat = mysqli_query($bdd, $querySelect);

                $modal = '';


                while ($data = mysqli_fetch_assoc($resultat)) {

                    $idCat = $data['id'];
                    $title = $data['title'];

                    $querySelect2 = "SELECT * FROM menu WHERE id_cat_menu=" . $idCat;
                    $resultat2 = mysqli_query($bdd, $querySelect2);


                    while ($data2 = mysqli_fetch_assoc($resultat2)) {

                        $price = $data2['price'];
                        $id = $data2['id'];
                        $text = $data2['text'];
                        $item = $data2['item'];
                        echo "<tr><td>$title</td><td>$item</td><td>$text</td><td>$price</td><td><a href=\"#\" class=\"btn btn-primary\" role=\"button\" data-toggle=\"modal\" data-target=\"#modalmenumodif$id\">Modifier</a>  <form method=\"post\" action=\"php/action.php\" enctype=\"multipart/form-data\"><input type=\"submit\" value=\"supprmenu\" name=\"action\"><input type='hidden' value='$id' name='id'></form></td></tr>";

                        $modal .= "
                <div class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" id=\"modalmenumodif$id\">
                  <div class=\"modal-dialog\" role=\"document\">
                    <div class=\"modal-content\">
                      <div class=\"modal-header\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                        <h4 class=\"modal-title\">Modifier le menu</h4>
                      </div>
                      <div class=\"modal-body\">
                      <!--Modification du concept-->
                                                
                        <form method=\"post\" action=\"php/action.php\" enctype=\"multipart/form-data\">
                        <label for='item'>Entrez le nom du produit</label>
                        <input type=\"text\" value=\"$item\" name=\"item\"><br>
                        <label for='text'>Entrez votre descriptif</label>
                        <textarea name='text'>$text</textarea>
                        <label for='price'>Fixez votre prix</label>
                        <input type=\"text\" value=\"$price\" name=\"price\"><br>
                        <input type=\"file\" value=\"Photo\" name=\"img\">
                        <input type='hidden' value='$id' name='id'>
                        <input type=\"submit\" value=\"modifMenu\" name=\"action\">
                        </form>
                      </div>
                    </div>
                  </div>
                </div>";
                    }

                }


                ?>
                </tbody>
            </table>
            <?php
            echo $modal;
            ?>

        </div>

        <form method="post" action="php/action.php">

            <?php

            $querySelect = "SELECT * FROM map";

            $resultat = mysqli_query($bdd, $querySelect);

            while ($data = mysqli_fetch_assoc($resultat)) {

                $day = $data['day'];
                $text = $data['text'];

                echo "<label for='$day'>Jour de la semaine</label>
                      <input type='text' value='$text'name='$day'>";
            }
            ?>

            <input type="submit" value="modifmap">

            </form>



    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="public/js/bootstrap.min.js"></script>
</body>
</html>