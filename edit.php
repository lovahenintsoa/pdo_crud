<?php
require_once("db.php");
// validation des changements en base (submit)

if (!empty($_POST["save_record"])){
    $sql = "UPDATE poste SET post_title =:post_title, description =:description, post_at =:post_at WHERE id=:id";
    $stmt = $cnx->prepare($sql);
    $result= $stmt->execute(array( ':post_title'   => $_POST['post_title'],
                                   ':description'  => $_POST['description'],
                                   ':post_at'      => $_POST['post_at'],
                                   ':id'           => $_GET["id"]));
    if($result){
        header('location:index.php');
    }
    
}


//Affichage de l'article ayant id recu en parametre

$stmt = $cnx->prepare("SELECT * FROM poste WHERE id =" . $_GET["id"]);
$stmt ->execute();
$result = $stmt->fetchAll();

?>

<html>
<head>
<title>PHP PDO CRUD - Edit Record</title>
<style>
   body{width:615px;font-family:arial;letter-spacing:1px;line-height:20px;}
            .button_link {color:#FFF;text-decoration:none; background-color:#428a8e;padding:10px;}
            .frm-add {border: #c3bebe 1px solid;
                padding: 30px;}
            .demo-form-heading {margin-top:0px;font-weight: 500;}   
            .demo-form-row{margin-top:20px;}
            .demo-form-field{width:300px;padding:10px;}
            .demo-form-submit{color:#FFF;background-color:#414444;padding:10px 50px;border:0px;cursor:pointer;}
</style>
</head>
<body>
<!--bouton retour page d'accueil -->
 <div style="margin:20px 0px; text-align:right;">
 <a href = "index.php" class="button_link">Back to List</a></div>


<!-- form pour editer l'article -->
        <div class="frm-add">
        <h1 class="demo-form-heading">Editer l'article</h1>
        <form action="" method="POST">
            <div class="demo-form-row">
                <label>Title: </label><br>
                <input type="text" name="post_title" class="demo-form-field" value="<?php echo $result[0]['post_title'];?>" required  />
            </div>
            <div class="demo-form-row">
                <label>Description: </label><br>
                <textarea name="description" class="demo-form-field" rows="5" required ><?php echo $result[0]['description'];?></textarea>
            </div>
            <div class="demo-form-row">
                <label>Date: </label><br>
                <input type="date" name="post_at" class="demo-form-field" value="<?php echo $result[0]['post_at'];?>" required />
            </div>
            <div class="demo-form-row">
                <input name="save_record" type="submit" value="Save" class="demo-form-submit">
            </div>
        </form>
        </div>
</body>



</html>