<div class="container-fluid text-center" id="carte">
    <div class="row hidden-xs">
        <div class="trucks-big col-sm-10 col-sm-offset-0">
            <h1 class="text-white"><span class="text-orange">OÙ NOUS</span> TROUVER ?</h1>
            <div class="trucks">

                <?php
                $querySelect = "SELECT * FROM map";

                $resultat = mysqli_query($bdd, $querySelect);

                while ($data = mysqli_fetch_assoc($resultat)) {

                    $day = $data['day'];
                    $text = $data['text'];


                    echo " <div class=\"truck\">
                    <img src=\"public/img/trucks-emplacements/trucks_$day.png\" alt=\"$text\" class=\"truck-img\">
                    <div class=\"truck-info\"><p>$text</p></div>
                </div>";
                }


                ?>

            </div>
        </div>
    </div>
    <div class="row visible-xs trucks-small">
        <div class="col-xs-10 col-xs-offset-1">
            <h1 class="text-white"><span class="text-orange">OÙ NOUS</span> TROUVER ?</h1>
            <hr/>
            <ul class="trucks-list">
                <?php
                $querySelect = "SELECT * FROM map";

                $resultat = mysqli_query($bdd, $querySelect);

                while ($data = mysqli_fetch_assoc($resultat)) {

                    $day = $data['day'];
                    $text = $data['text'];

                    echo " <li class=\"truck-small\">$text</li>";
                }


                ?>
            </ul>
        </div>
    </div>
</div>