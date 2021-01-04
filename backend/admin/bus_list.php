<?php
include './inc/header.php';
include './lib/bus.php';

$bus = new Bus();
if (isset($_REQUEST['id'])) {
    $id = $_GET['id'];
    $deleted = $bus->busDelete($id);
}
?>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>bus List <small>Bus Management System, Uttara University</small></h2>
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
            <p>All Bus List </p>
            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                        <tr class="headings">
                            <th>
                                <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">Sl No </th>
                            <th class="column-title">Bus Name</th>
                            <th class="column-title">Bus Number</th>
                            <th class="column-title">Driver Name</th>
                            <th class="column-title">Route</th>
                            <th class="column-title">Stopage </th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="8">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $data = $bus->getBusAll();

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
                                    <td class=" "><?php echo $row['busName'] ?></td>
                                    <td class=" "><?php echo $row['busNo'] ?> </td>
                                    <td class=" "><?php echo $row['name'] ?></td>
                                    <td class=" "><?php echo $row['route'] ?></td>
                                    <td class=" "><?php echo $row['stopage'] ?></td>
                                    <td class=" last">
                                        <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i>View</a>
                                        <a href="bus_update.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>Edit</a>
                                        <a href="bus_list.php?id=<?php echo $row['busNo']; ?>" onclick="return checkdelete()" class="btn btn-danger btn-xs" ><i class="fa fa-trash-o"></i>Delete</a>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ;
                            ?>
                            <tr class="even pointer">
                                <td colspan="9"><h2 class="text-center">No Records Found!!!</h2></td>
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