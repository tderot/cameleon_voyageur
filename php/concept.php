
<div class="container-fluid text-center" id="concept">
    <h1><span class="text-orange">LE</span> CONCEPT</h1>
    <div class="row">
        <?php
        $querySelect= "SELECT * FROM concept";

        $resultat= mysqli_query($bdd,$querySelect);

        while($data=mysqli_fetch_assoc($resultat)){

            $img=$data['img'];
            $title=$data['title'];
            $text=$data['text'];


           echo " <div class=\"col-xs-8 col-xs-offset-2 col-md-4 col-md-offset-0\">
                <img src=\"public/img/$img\" alt=\"concept1\" class=\"img-circle\">
                <H3>$title</H3>
                <p>$text</p>
            </div>";
        }

        ?>


    </div>
    <br />
    <br />
</div>