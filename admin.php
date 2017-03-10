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
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" >
        <style>
            select {
                
            }
            .modif-conceptbtn {
                margin-top: 1%;
                margin-bottom: 2.5%;
            }
            .concept-admin {
                height: 500px;
                margin-bottom: 50px;
            }
            textarea {
                resize: none;
                width: 100%;
                height: 200px;
                padding: 1%;
            }
            .admin-margin {
                margin: 2%;
            }
            body {
                margin-top: 100px;
            }
            /* Général */

            @media (min-width: 768px) {
                :target:before {
                    content:"";
                    display:block;
                    height:50px; /* fixed header height*/
                    margin:-50px 0 0; /* negative fixed header height */
                }
            }
            @media (max-width: 768px) {
                :target:before {
                    content:"";
                    display:block;
                    height:50px; /* fixed header height*/
                    margin:-50px 0 0; /* negative fixed header height */
                }
            }
        </style>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
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
                        <li><a href="#cover">Couverture</a></li>
                        <li><a href="#concept">Concept</a></li>
                        <li><a href="#menu">Menu</a></li>
                        <li><a href="#map">Plan</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="jumbotron text-center">
                        <h1>Page d'administration du Caméléon Voyageur</h1>
                        <br />
                        <p>Ici, vous pouvez ajouter, modifier, supprimer les éléments des différentes sections de votre site. Bonne chance !</p>
                    </div>
                    <?php
                    $query_cover= "SELECT * FROM cover";

                    $res_cover= mysqli_query($bdd,$query_cover);

                    while($data_cover=mysqli_fetch_assoc($res_cover)){

                        $id_cover=$data_cover['id'];
                        $img_cover=$data_cover['img'];
                        $title_cover=$data_cover['title'];
                        $text_cover=$data_cover['text'];
                        echo "
                            <h1 id=\"cover\" class=\"text-center\">Couverture</h1>
                            <form method=\"post\" action=\"php/action.php\" enctype=\"multipart/form-data\">
                                <div class=\"form-group\">
                                    <label for=\"title\">Entrez le titre de la couverture</label>
                                    <input type=\"text\" value=\"$title_cover\" name=\"title\" class=\"form-control\">
                                </div>
                                <div class=\"form-group\">
                                    <label for=\"text\">Entrez le sous-titre de la couverture</label>
                                    <input type=\"text\" value=\"$text_cover\" name=\"text\" class=\"form-control\">
                                </div>
                                <input type=\"hidden\" value=\"$id_cover\" name=\"id\">
                                <input type=\"hidden\" value=\"modifCover\" name=\"action\">
                                <div class=\"text-center admin-margin\">
                                    <input type=\"submit\" value=\"Modifier la couverture\" name=\"submit\" class=\"btn btn-primary\">
                                </div>
                            </form>
                            <hr />
                            <h1 id=\"concept\" class=\"text-center\">Concepts</h1>
                        ";
                    }
                    
                    $query_concept = "SELECT * FROM concept";

                    $res_concept = mysqli_query($bdd, $query_concept);

                    while ($data_concept = mysqli_fetch_assoc($res_concept)) {
                        $concept_id = $data_concept['id'];
                        $concept_img = $data_concept['img'];
                        $concept_title = $data_concept['title'];
                        $concept_text = $data_concept['text'];


                        echo "
                            <div class=\"col-sm-6 col-md-4\">
                                <div class=\"thumbnail concept-admin text-center\">
                                    <a href=\"#\" class=\"btn btn-default modif-conceptbtn\" role=\"button\" data-toggle=\"modal\" data-target=\"#modalConcept$concept_id\"><i class=\"fa fa-pencil\"></i> Modifier</a>
                                    <img src=\"public/img/$concept_img\" alt=\"...\" height=\"200px\" width=\"200px\">
                                    <div class=\"caption\">
                                        <h3>$concept_title</h3>
                                        <p>$concept_text</p>
                                    </div>
                                </div>
                            </div>
                            <div class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" id=\"modalConcept$concept_id\">
                                <div class=\"modal-dialog\" role=\"document\">
                                    <div class=\"modal-content\">
                                        <div class=\"modal-header\">
                                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                                            <h4 class=\"modal-title\">Modifier le concept</h4>
                                        </div>
                                        <div class=\"modal-body text-center\">
                                            <!--Modification du concept-->
                                            <form method=\"post\" action=\"php/action.php\" enctype=\"multipart/form-data\">
                                                <div class=\"form-group\">
                                                    <label for=\"title\">Entrez le titre du concept</label>
                                                    <input type=\"text\" value=\"$concept_title\" name=\"title\" class=\"form-control\">
                                                </div>
                                                <div class=\"form-group\">
                                                    <label for=\"text\">Entrez la description du concept</label><br />
                                                    <textarea name='text'>$concept_text</textarea>
                                                </div>
                                                <input type=\"hidden\" value=\"$concept_id\" name=\"id\">
                                                <input type=\"hidden\" value=\"modifConcept\" name=\"action\">
                                                <div class=\"text-center admin-margin\">
                                                    <input type=\"submit\" value=\"Modifier le concept\" name=\"submit\" class=\"btn btn-primary\">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ";

                    }



                    $query_select = "SELECT * FROM cat_menu";
                    $res_select = mysqli_query($bdd, $query_select);

                    $select = "<select class=\"form-control\" name='id_cat_menu'> ";

                    while ($data_select = mysqli_fetch_assoc($res_select)) {
                        $select_id = $data_select['id'];
                        $select_title = $data_select['title'];


                        $select .= "<option value=$select_id>$select_title</option>";
                    }

                    $select .= '</select>';

                    ?>
                    <hr />
                    <h1 id="menu" class="text-center">Menu</h1>
                    <div class="text-center admin-margin">
                            <a href="#" class="btn btn-default" role="button" data-toggle="modal" data-target="#ajouterMenu"><i class="fa fa-plus"></i> Ajouter un menu</a>
                    </div>
                    <div class="modal fade" tabindex="-1" role="dialog" id="ajouterMenu">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Modifier le menu</h4>
                                </div>
                                <div class="modal-body">
                                    <!--Modification du concept-->
                                    <form method="post" action="php/action.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="id_cat_menu">Sélectionnez la catégorie du produit</label>
                                            <?php echo $select; ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="item">Entrez le nom du produit</label>
                                            <input type="text" name="item" placeholder="Nom du produit" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="text">Entrez votre descriptif</label>
                                            <textarea name="text" placeholder="Descriptif du produit" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Fixez votre prix</label>
                                            <input type="text" name="price" class="form-control" placeholder="Prix du produit">
                                        </div>
                                        <input type="hidden" name="action" value="addMenu">
                                        <div class="text-center admin-margin">
                                            <input type="submit" name="submit" value="Ajouter un menu" class="btn btn-primary">
                                        </div>
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
                            $query_menu = "SELECT * FROM cat_menu";
                            $res_menu = mysqli_query($bdd, $query_menu);

                            $modal = '';


                            while ($data_menu = mysqli_fetch_assoc($res_menu)) {

                                $menu_id = $data_menu['id'];
                                $menu_title = $data_menu['title'];

                                $query_item = "SELECT * FROM menu WHERE id_cat_menu=" . $menu_id;
                                $res_item = mysqli_query($bdd, $query_item);


                                while ($data_item = mysqli_fetch_assoc($res_item)) {

                                    $item_price = $data_item['price'];
                                    $item_id = $data_item['id'];
                                    $item_text = $data_item['text'];
                                    $item_item = $data_item['item'];
                                    echo "<tr><td>$menu_title</td><td>$item_item</td><td>$item_text</td><td>$item_price</td><td><a href=\"#\" class=\"btn btn-default\" role=\"button\" data-toggle=\"modal\" data-target=\"#modalmenumodif$item_id\"><i class=\"fa fa-pencil\"></i> Modifier</a>  <form method=\"post\" action=\"php/action.php\" enctype=\"multipart/form-data\" style=\"display:inline-block;\"><input type=\"hidden\" value=\"supprMenu\" name=\"action\"><input type=\"submit\" value=\"Supprimer\" name=\"submit\" class=\"btn btn-danger\"><input type='hidden' value='$item_id' name='id'></form></td></tr>";

                                    $modal .= "
                                    <div class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" id=\"modalmenumodif$item_id\">
                                        <div class=\"modal-dialog\" role=\"document\">
                                            <div class=\"modal-content\">
                                                <div class=\"modal-header\">
                                                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                                                    <h4 class=\"modal-title\">Modifier le menu</h4>
                                                </div>
                                                <div class=\"modal-body\">
                                                    <!--Modification du concept-->
                                                    <form method=\"post\" action=\"php/action.php\" enctype=\"multipart/form-data\">
                                                    <div class=\"form-group\">
                                                        <label for=\"item\">Entrez le nom du produit</label>
                                                        <input type=\"text\" value=\"$item_item\" name=\"item\" class=\"form-control\">
                                                    </div>
                                                    <div class=\"form-group\">
                                                        <label for=\"text\">Entrez votre descriptif</label>
                                                        <textarea name='text' name=\"text\" class=\"form-control\">$item_text</textarea>
                                                    </div>
                                                    <div class=\"form-group\">
                                                        <label for=\"item\">Entrez le nom du produit</label>
                                                        <input type=\"text\" value=\"$item_item\" name=\"item\" class=\"form-control\">
                                                    </div>
                                                    <div class=\"form-group\">
                                                        <label for=\"item\">Fixez votre prix</label>
                                                        <input type=\"text\" value=\"$item_price\" name=\"price\" class=\"form-control\">
                                                    </div>
                                                    <input type='hidden' value='$item_id' name='id'>
                                                    <input type='hidden' value='modifMenu' name='action'>
                                                    <div class=\"text-center admin-margin\">
                                                        <input type=\"submit\" value=\"Modifier\" name=\"submit\" class=\"btn btn-primary\">
                                                    </div>
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
                    <hr />
                    <h1 id="map" class="text-center">Carte</h1>
                    <form method="post" action="php/action.php">
                        <?php
                        $dates = array("","Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Weekend");
                        $querySelect = "SELECT * FROM map";

                        $resultat = mysqli_query($bdd, $querySelect);

                        while ($data = mysqli_fetch_assoc($resultat)) {
                            $day = $data['day'];
                            $text = $data['text'];
                            echo "
                                <div class=\"form-group\">
                                    <label for='text_$day'>$dates[$day]</label>
                                    <input type='text' value='$text' name='text_$day' class=\"form-control\">
                                </div>";
                        }
                        ?>
                        <input type='hidden' value='modifMap' name='action'>
                        <div class="text-center admin-margin">
                            <input type="submit" value="Modifier" name="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="public/js/bootstrap.min.js"></script>
    </body>
</html>