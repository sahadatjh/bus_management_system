<?php
include'./inc/header.php';
include './inc/student.php';

$std=new Student();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $insertdata=$std->insertStudent($_POST);
}
?>


<div class="main-content form_box">
    <form action="" method="post">
        <h2 class=" well text-center">STUDENT INFORMATION FORM</h2><hr>
        <?php if(isset($insertdata)){
            echo $insertdata;
          }?>
            <div class="row row_form">
                <div class="col-md-6">
                    <label for="name">Students Name:</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Type Your Name">
                </div>
                <div class="col-md-3">
                    <label for="phone">Phone(Student):</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Ex:880 1910 123456">
                </div>
                <div class="col-md-3">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Ex: info@gmail.com">
                </div>
            </div>
            <div class="row row_form">
                <div class="col-md-6">
                    <label for="depertment">Chose a Department:</label>
                    <select class="form-control" id="depertment" name="depertment">
                        <option>Select your Department</option>
                        <option>Computer Science & Engineering</option>
                        <option>Electronics & Electrical Engineering</option>
                        <option>Textile Engineering</option>
                        <option>Business Administration</option>
                        <option>Mathmatics</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="std_id" style="color:red;">Student ID ***</label>
                    <input type="text" name="std_id" id="std_id" class="form-control" placeholder="Student ID" required="1">
                </div>
                <div class="col-md-3">
                    <label for="batch">Batch:</label>
                    <input type="text" name="batch" id="batch" class="form-control" placeholder="Type Your Batch Name">
                </div>
            </div>
            <div class="row row_form">
                <div class="col-md-6">
                    <label for="type">Type: </label>
                    <select type="text" name="type" id="type" class="form-control">
                        <option>Select your Type</option>
                        <option>Regular</option>
                        <option>Irrigular</option>
                        <option>Already Passed</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="semester">Select your semester:</label>
                    <select class="form-control" id="semester" name="semester">
                        <option>Select your semester:</option>
                        <option>First</option>
                        <option>Second</option>
                        <option>Third</option>
                        <option>Fourth</option>
                        <option>Fifth</option>
                        <option>Sixth</option>
                        <option>Seven</option>
                        <option>Eight</option>
                        <option>Nine</option>
                    </select>
                </div>
            </div>
            <div class="row row_form">
                <div class="col-md-6">
                    <label for="rel">Religion: </label>
                    <select type="text" name="relegion" id="rel" class="form-control">
                        <option>Select your religion</option>
                        <option>Islam</option>
                        <option>Hindusim</option>
                        <option>Chrichian</option>
                        <option>Other's</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="gender">Gender:</label>
                    <select class="form-control" id="gender" name="gender">
                        <option>Select your gender</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other's</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="remarks">Remarks</label>
                    <input type="text" name="remarks" id="remarks" class="form-control" placeholder="">
                </div>
            </div>
            
            <div class="row row_form">
                <div class="col-md-6">
                    <label for="presentAddress">Present Address:</label>
                    <textarea name="presentAddress" id="presentAddress" cols="30" row row_forms="2" class="form-control"></textarea>
                </div>
                <div class="col-md-6">
                    <label for="permanantAddress">Permanant Address:</label>
                    <textarea name="permanantAddress" id="permanantAddress" cols="30" row row_forms="2" class="form-control"></textarea>
                </div>		
            </div>
            <div class="row row_form">
                <div class="col-md-12 text-center">
                    <input type="submit" name="save" value="Save" class="btn btn-success">
                    <input type="reset" value="Reset" class="btn btn-warning">
                    <a href="busInfo.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>
    </form>		

</div>
<?php include './inc/footer.php'; ?>