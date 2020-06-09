<?php
require_once("db.php");
$pdo_statement = $cnx->prepare("SELECT * FROM poste ORDER BY id DESC");
$pdo_statement->execute();
$result =$pdo_statement->fetchAll();

// req préparée les données sont prêts à etre afficher
// $result

?>

<html>
<head>

<title>PHP PDO CRUD</title>
<style>
    body{width:615px;font-family:arial;letter-spacing:1px;line-height:20px;}
    .tbl-qa{width: 100%;font-size:0.9em;background-color: #f5f5f5;}
    .tbl-qa th.table-   header {padding: 5px;text-align: left;padding:10px;}
    .tbl-qa .table-row td {padding:10px;background-color: #FDFDFD;vertical-align:top;}
    .button_link {color:#FFF;text-decoration:none; background-color:#428a8e;padding:10px;}
</style>
</head>
<body>
<div style="text-align:right;margin:20px 0px;"><a href ="add.php" class="button_link"><img
src ="crud-icon/add.png " title ="Add New Record" style="vertical-align:buttom;"/> Create</a></div>
<table class="tbl-qa">
<thead>
    <tr>
        <th class="table-header" width ="20%">Title</th>
        <th class="table-header" width ="40%">Description</th>
        <th class="table-header" width ="20%">Date</th>
        <th class="table-header" width ="15%">Actions</th>
    </tr>
</thead>

<tbody id="table-body">
<?php // boucle foreach ($result as $row)

if(!empty($result)){
    foreach($result as $row){

?>
<tr class="table-row">
    <td><?php echo $row["post_title"];?></td>
    <td><?php echo $row["description"];?></td>
    <td><?php echo $row["post_at"];?></td>
    <td> <a href='edit.php?id=<?php echo $row['id'];?>'><img src ="crud-icon/edit.png" 
    title ="Edit"/></a> <a href='delete.php?id=<?php echo $row['id'];?>'> <img src="crud-icon/delete.png" title ="Delete"/></a></td>


</tr>


<?php
    }
}
?>

 

</tbody>
</table>
</body>


</html>