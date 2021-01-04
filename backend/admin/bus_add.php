<?php 
include './inc/header.php'; 
include './lib/bus.php';

$bus = new Bus();
if($_SERVER['REQUEST_METHOD']=='POST'){
    $insertdata=$bus->insertBus($_POST);
}
?>

<!-- page content -->

<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">

                    <h2>Add New Bus<small>Provide all information of BUS</small></h2>
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
if(isset($insertdata)){
    echo "$insertdata";
}
?>
                    <form action="" method="post" class="form-horizontal form-label-left" novalidate>


                        <span class="section">BUS Information</span>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Bus Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="busName" placeholder="Bus Name" required="required" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="busNo">Bus Number <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="busNo" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="busNo" placeholder="Type Bus Number" required="required" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="route">Route <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="route" name="routeId" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                              <option value="0">--------Select Bus Route--------</option>
                               <?php
                                $sql = "SELECT * FROM route";
                                $result = $bus->selectOptionData($sql);
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="stopage">Stopage <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="stopage" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="stopage" placeholder="Ex: mirput-2, mirpur10, technical" required="required" type="text">
                            </div>
                        </div>
                        
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="driverName">Driver Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="driverName" name="driverId" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                              <option value="0">--------Select Driver Name--------</option>
                               <?php
                                $sql = "SELECT * FROM stafinfo";
                                $result = $bus->selectOptionData($sql);
                                if ($result->num_rows > 0) {
                                    // output data  of each row
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                        <?php
                                    }
                                };
                                ?>
                          </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="helerName">Helper Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="helerName" name="helerId" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                              <option value="0">--------Select Helper Name--------</option>
                               <?php
                                $sql = "SELECT * FROM stafinfo";
                                $result = $bus->selectOptionData($sql);
                                if ($result->num_rows > 0) {
                                    // output data  of each row
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                        <?php
                                    }
                                };
                                ?>
                          </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="remarks">Remarks<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="remarks" name="remarks" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Cancel</button>
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