<?php
include './inc/header.php';
include './lib/user.php';

$usr = new User();
if (isset($_REQUEST['id'])) {
    $id = $_GET['id'];
    $deleted = $usr->userDelete($id);
}
?>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Student List <small>Bus Management System, Uttara University</small></h2>
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
            if (isset($deleted)) {
                echo $deleted;
            }
            ?>
            <p>All User List </p>
            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                        <tr class="headings">
                            <th>
                                <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">Sl No </th>
                            <th class="column-title">Username</th>
                            <th class="column-title">Email</th>
                            <th class="column-title">Type </th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $data = $usr->getUsrAll();

                        if ($data->num_rows > 0) {
                            $i = 0;
                            while ($row = $data->fetch_assoc()) {
                                $i++;
                                ?>
                                <tr class="even pointer">
                                    <td class="a-center ">
                                        <input type="checkbox" class="flat" name="table_records">
                                    </td>
                                    <td class=" "><?php echo $i; ?></td>
                                    <td class=" "><?php echo $row['username'] ?> </td>
                                    <td class=" "><?php echo $row['email'] ?></td>
                                    <td class=" "><?php echo $row['type'] ?></td>
                                    <td class=" last">
                                        <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i>View</a>
                                        <a href="user_update.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>Edit</a>
                                        <a href="user_list.php?id=<?php echo $row['id']; ?>" onclick="return checkdelete()" class="btn btn-danger btn-xs" ><i class="fa fa-trash-o"></i>Delete</a>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ;
                            ?>
                            <tr class="even pointer">
                                <td colspan="6">No Records Found!!!</td>
                            </tr>
<?php }; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
                function checkdelete(){
                    return confirm('Are you sure want to DELETE this data???');
                }
            </script>
<?php include './inc/footer.php'; ?>