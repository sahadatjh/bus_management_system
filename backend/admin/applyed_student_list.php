<?php 
include './inc/header.php'; 
include './lib/Student.php';

$std = new Student();
if (isset($_REQUEST['id'])) {
    $id = $_GET['id'];
    $deleted = $std->applyedStudentDelete($id);
}

if (isset($_REQUEST['std_id'])) {
    $std_id = $_GET['std_id'];
    $allow = $std->allowApplyedStudent($std_id);
}
?>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Applied Student List <small>Bus Management System, Uttara University</small></h2>
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

            <p>Applied Student List</p>

            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                        <tr class="headings">
                            <th>
                                <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">Sl No </th>
                            <th class="column-title">Name</th>
                            <th class="column-title">ID(Roll)</th>
                            <th class="column-title">Phone </th>
                            <th class="column-title">Address </th>
                            <th class="column-title">Bus No </th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="8">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                        $std = new Student();
                        $data = $std->getAppliedStudent();

                        if ($data->num_rows > 0) {
                            $i = 1;
                            while ($row = $data->fetch_assoc()) {
                                
                                ?>
                        <tr class="even pointer">
                            <td class="a-center ">
                                <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" "><?php echo "$i";?></td>
                            <td class=" "><?php echo $row['name']?></td>
                            <td class=" "><?php echo $row['std_id']?> </td>
                            <td class=" "><?php echo $row['phone']?></td>
                            <td class=" "><?php echo $row['present_address']?></td>
                            <td class=" "><?php echo $row['busNumber']?></td>
                            <td class=" last">
                                <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i>View</a>
                                <a href="applyed_student_list.php?std_id=<?php echo $row['std_id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>Allow</a>
                                <a href="applyed_student_list.php?id=<?php echo $row['id']; ?>" onclick="return checkdelete()"  class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Delete</a>
                            </td>
                        </tr>
                        <?php
                        $i++;
                            }
                        } else {
                            ;
                            ?>
                            <tr class="even pointer">
                                <td colspan="8">No Records Found!!!</td>
                            </tr>
<?php }; ?>
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>
<script>
    function checkdelete() {
        return confirm('Are you sure want to DELETE this data???');
    }
</script>
<?php include './inc/footer.php'; ?>