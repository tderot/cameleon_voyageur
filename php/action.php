<?php
include('bdd.php');
$bdd = mysqli_connect(SERVER, USER, PASS, DB);
mysqli_set_charset($bdd, 'utf8');
$error_global = 0;

if($_POST['action']=='modifCover'){

    $query= "UPDATE cover SET title='".$_POST['title']."',text='".$_POST['text']."' WHERE id=1";

    if(mysqli_query($bdd,$query)==false){
        $error_global++;
    }
}

else if($_POST['action']=='modifConcept'){

    $query= "UPDATE concept SET title='".$_POST['title']."',text='".$_POST['text']."' WHERE id='".$_POST['id']."'";

    if(mysqli_query($bdd,$query)==false){
        $error_global++;
    }

}
else if($_POST['action']=='modifMenu'){

    $query= "UPDATE menu SET text='".$_POST['text']."',item='".$_POST['item']."',price='".$_POST['price']."' WHERE id='".$_POST['id']."'";

    if(mysqli_query($bdd,$query)==false){
        $error_global++;
    }

}

else if($_POST['action']=='supprMenu'){

    $query= "DELETE FROM menu WHERE id='".$_POST['id']."'";

    if(mysqli_query($bdd,$query)==false){
        $error_global++;
    }

}
else if($_POST['action']=='addMenu'){

    $query= "INSERT INTO menu VALUES (NULL,'".$_POST['item']."','".$_POST['text']."','".$_POST['price']."','".$_POST['id_cat_menu']."')";

    if(mysqli_query($bdd,$query)==false){
        $error_global++;
    }

}else if ($_POST['action']=='modifMap'){
    $error = 0;
    for ($i=1; $i<6; $i++){
        $query= "UPDATE map SET text='".$_POST['text_'.$i.'']."' WHERE day='".$i."'";

        if(mysqli_query($bdd,$query)==false){
            $error++;
        }
    }
    if($error==0){
        $error_global++;
    }
}
if($error_global==0){
    header("Location: ../admin.php");
}else{
    echo "Erreur";
}

