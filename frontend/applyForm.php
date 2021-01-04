<?php
include'./inc/header.php';
include'./inc/applyClass.php';

$aply=new ApplyClass();
if($_SERVER['REQUEST_METHOD']=='POST'){
    $insertdata=$aply->insertApply($_POST);
    
     
}
   
?>
<div class="main-content form_box">
    <form action="" method="post">
        <h2 class=" well text-center">STUDENT APPLYED FORM</h2><hr>
            <?php 
                if(isset($insertdata)){
                    echo $insertdata;
            }?>
            <div class="row row_form">
                <div class="col-md-6">
                    <label for="std_id">Student ID :</label>
                    <input type="text" id="std_id" name="std_id" class="form-control" required="1">
                </div>
                <div class="col-md-6">
                    <label for="bn">Bus No :</label>
                    <input type="text" id="bn" name="busNo" value="<?php if(isset($_GET['busNo'])){echo $_GET['busNo'];}?>" class="form-control">
                </div>
            </div>
            <div class="row row_form">
                <div class="col-md-12 text-center">
                    <input type="submit" name="apply" value="Apply" class="btn btn-success">
                    <a href="busInfo.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>
    </form>		

</div>
<?php include './inc/footer.php'; ?>