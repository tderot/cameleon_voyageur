<div class="container-fluid text-center" id="menu">
    <h1><span class="text-orange">LA</span> CARTE</h1>
    <ul id="og-grid" class="og-grid">
        <?php
        $querySelect = "SELECT * FROM cat_menu";
        $resultat = mysqli_query($bdd, $querySelect);


        while ($data = mysqli_fetch_assoc($resultat)) {

            $idCat = $data['id'];
            $querySelect2 = "SELECT * FROM menu WHERE id_cat_menu=". $idCat;
            $resultat2 = mysqli_query($bdd, $querySelect2);
            $desc='<ul>';


            while ($data2 = mysqli_fetch_assoc($resultat2)) {

                $price = $data2['price'];
                $text = $data2['text'];
                $item = $data2['item'];
                $desc=$desc."<li>$item | $price € <p>$text</p></li>";
            }
            $desc=$desc.'</ul>';

            $title = $data['title'];
            $img_big = $data['img_big'];
            $img_thumb = $data['img_thumb'];

            echo "<li class=\"grid-li\">
            <a href=\"#\" data-largesrc=\"public/grid/images/$img_big\" data-title=\"$title\"
               data-description=\"$desc\">
                <img src=\"public/grid/images/thumbs/$img_thumb\" alt=\"\"/>
            </a>
        </li>";
        }


        ?>

    </ul>
    <a href="public/img/menu_cameleonVoyageur.jpg" download="public/img/menu_cameleonVoyageur.jpg">
        <button type="button" class="btn btn-warning">Télécharger notre menu !</button>
    </a>
</div>