<main>
<?php
$db = new Database();
$success= [];
$errors= [];
$row = $db->getRow("select WEBSITENAME from config");


 if(isset($_POST["ADDWEBSITENAME"])){
     if(!empty(trim($_POST["WEBSITENAME"]))){
         extract($_POST);
         $existeCat = $db->getRow("select * from config where WEBSITENAME=?",[trim($WEBSITENAME)]);

         if(count($existeCat)==1){

         if($db->insertRow("update config set WEBSITENAME =?",[trim($WEBSITENAME)])){
             $success[]= "nome de web site  à été bien modifier !";
              header("location:admin.php");
             //header("Location:admin.php?p=addCategorie&s=1");
         }

         }else $errors[]= " deja existe";

     }else $errors[] = "Le champ du est obligatoir";
 }
?>

<?php include("include/_errors.php"); ?>
<?php include("include/_success.php"); ?>
<div id="conteneur">
    <form method="post">
        <div class="frm-group">
            <label>Web site name:</label>
           
        </div>
        <div class="frm-group">
            
            <input class="input-text" type="text" name="WEBSITENAME" value="<?php echo $row[0]; ;?>" />
        </div>
        <div class="frm-group">
            <input type="submit" name="ADDWEBSITENAME" class="btn" value="Modifier"/>
        </div>
    </form>

    </div>
    </main>