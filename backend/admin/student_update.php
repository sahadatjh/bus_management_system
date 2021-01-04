<?php 
include './inc/header.php'; 
include './lib/Student.php';

$std=new Student();
//Update data 
if($_SERVER['REQUEST_METHOD']=='POST'){
    $updatedata=$std->updateStudent($_POST);
}

//get data from database for update
$id=$_GET['id'];
$data=$std->getStudentForUpdate($id);
?>
<!-- page content -->
        
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Student Admission Form<small>Provide all information of student</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <?php 
                    if(isset($updatedata)){
                      echo $updatedata;
                    }
                  ?>
                    <form action="" method="post" class="form-horizontal form-label-left" novalidate>

                     
                      <span class="section">Personal Information</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" value="<?php echo $data['name'];?>" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="std_id">Student ID <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="std_id" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="std_id"value="<?php echo $data['std_id'];?>"  required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="phone" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="phone" value="<?php echo $data['phone'];?>" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fname"> Gardian Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="fname" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="fname" value="<?php echo $data['fname'];?>" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="grphone"> Gardian Phone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="grphone" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="grphone" value="<?php echo $data['grphone'];?>" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" value="<?php echo $data['email'];?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="batch">Batch <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="batch" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="batch" value="<?php echo $data['batch'];?>" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="department">Department </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="department" name="department" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                              <option value="0">----------Select Your Department----------</option>
                               <?php
                                $sql = "SELECT * FROM department";
                                $result = $std->selectOptionData($sql);
                                if ($result->num_rows > 0) {
                                    // output data  of each row
                                    while ($row = $result->fetch_assoc()) {
                                        ?>

                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['department']; ?></option>
                                        <?php
                                    }
                                };
                                ?>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="semester">Semester </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="semester" name="semester" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                              <option value="0">----------Select Your Semester----------</option>
                              <?php
                                $sql = "SELECT * FROM semester";
                                $result = $std->selectOptionData($sql);
                                if ($result->num_rows > 0) {
                                    // output data  of each row
                                    while ($row = $result->fetch_assoc()) {
                                        ?>

                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['semester']; ?></option>
                                        <?php
                                    }
                                };
                                ?>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Type </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="semester" name="type" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                              <option value="0">----------Select Your Type----------</option>
                              <option value="Regular">Regular</option>
                              <option value="Irregular">Irregular</option>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="religion">Religion </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="religion" name="religion" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                              <option value="0">----------Select Your Religion----------</option>
                              <option value="Islam">Islam</option>
                              <option value="Hinduism">Hinduism</option>
                              <option value="Budhaism">Budhaism</option>
                              <option value="Chirshtian">Chirshtian</option>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gender">Gender </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="gender" name="gender" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                              <option value="0">----------Select Your Gender----------</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="Other's">Other's</option>
                          </select>
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="remarks">Remarks <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="remarks" name="remarks" required="required" value="<?php echo $data['remarks'];?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="presentAddress">Present Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="presentAddress" required="required" name="presentAddpess" class="form-control col-md-7 col-xs-12"><?php echo $data['present_address'];?></textarea>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="permanantAddpess">Permanant Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="permanantAddpess" required="required" name="permanantAddpess" class="form-control col-md-7 col-xs-12"><?php echo $data['parmanant_address'];?></textarea>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <a href="student_info.php" class="btn btn-primary">Cancel</a>
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
        <!-- /page content -->
<?php include './inc/footer.php'; ?>