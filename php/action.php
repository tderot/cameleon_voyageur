<?php
    include('bdd.php');
    $bdd = mysqli_connect(SERVER, USER, PASS, DB);
    mysqli_set_charset($bdd, 'utf8');

    print_r($_POST);

if($_POST['action']=='modifCover'){

    $query= "UPDATE cover SET title='".$_POST['title']."',text='".$_POST['text']."' WHERE id=1";

    if(mysqli_query($bdd,$query)){
        echo'Validé';
    }

    else{
        echo'Echec';
    }

}

else if($_POST['action']=='modifConcept'){

    $query= "UPDATE concept SET title='".$_POST['title']."',text='".$_POST['text']."' WHERE id='".$_POST['id']."'";

    if(mysqli_query($bdd,$query)){
        echo'Validé';
    }

    else{
        echo'Echec';
    }

}
else if($_POST['action']=='modifMenu'){

    $query= "UPDATE menu SET text='".$_POST['text']."',item='".$_POST['item']."',price='".$_POST['price']."' WHERE id='".$_POST['id']."'";

    if(mysqli_query($bdd,$query)){
        echo'Validé';
    }

    else{
        echo'Echec';
    }

}

else if($_POST['action']=='supprmenu'){

    $query= "DELETE FROM menu WHERE id='".$_POST['id']."'";

    if(mysqli_query($bdd,$query)){
        echo'Validé';
    }

    else{
        echo'Echec';
    }

}
else if($_POST['action']=='addmenu'){

    $query= "INSERT INTO menu VALUES (NULL,'".$_POST['item']."','".$_POST['text']."','".$_POST['price']."','".$_POST['id_cat_menu']."')";

    if(mysqli_query($bdd,$query)){
        echo'Validé';
    }

    else{
        echo'Echec';
    }

}

