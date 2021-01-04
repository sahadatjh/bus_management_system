<?php
include './inc/header.php';
include './lib/staff.php';

$stf = new Staff();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $insertdata = $stf->insertStaff($_POST);
}
?>

<!-- page content -->

<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Staff information Form<small>Provide all information of staff</small></h2>
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
                    if (isset($insertdata)) {
                        echo $insertdata;
                    }
                    ?>
                    <form action="" method="post" class="form-horizontal form-label-left" novalidate="">

                        <span class="section">Personal Information</span>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="EX: Md Shahadat Hossain" required="required" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="designation">Designation<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="designation" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="designation" placeholder="Ex: Driver" required="required" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="phone" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="phone" placeholder="+880 1915 563260" required="required" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="email" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="email" placeholder="email@gmail.com" required="required" type="email">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="busNo">Bus Number <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="busNo" name="busNo" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                                    <option value="0">----------Select Bus Number----------</option>
                                    <?php
                                    $sql = "SELECT * FROM businfo";
                                    $result = $stf->selectOptionData($sql);
                                    if ($result->num_rows > 0) {
                                        // output data  of each row
                                        while ($row = $result->fetch_assoc()) {
                                            ?>

                                            <option value="<?php echo $row['busNo']; ?>"><?php echo $row['busNo']; ?></option>
                                            <?php
                                        }
                                    };
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="routeId">Route</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="routeId" name="routeId" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                                    <option value="0">------Select Your Working Route------</option>
                                    <?php
                                    $sql = "SELECT * FROM route";
                                    $result = $stf->selectOptionData($sql);
                                    if ($result->num_rows > 0) {
                                        // output data  of each row
                                        while ($row = $result->fetch_assoc()) {
                                            ?>

                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['route']; ?></option>
                                            <?php
                                        }
                                    };
                                    ?>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nid">National Id Number <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="nid" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nid" placeholder="Type Your National ID Number" required="required" type="number">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="remarks">Remarks <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="remarks" name="remarks" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="presentAddress">Present Address <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="presentAddress" required="required" name="presentAddress" class="form-control col-md-7 col-xs-12"></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="permamantAddress">Permanant Address <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="permamantAddress" required="required" name="permamantAddress" class="form-control col-md-7 col-xs-12"></textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="button" class="btn btn-primary">Cancel</button>
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