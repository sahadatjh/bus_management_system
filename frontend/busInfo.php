<?php
include './inc/header.php';
include './inc/Bus.php';
?>

<div class="main-content">
    <div class="panel panel-success">
        <div class="panel-heading">
            <div class="text-center"><h3>BUS INFORMATION</h3></div>
        </div>
        <div class="panel-body">
			<div class="search_box">
                <form action="" method="post" >
                    <input type="text"name="search" value=""class="form-control-static " placeholder="Search By Name" value="<?php echo $searchkey;?>"/>
                    <input type="submit"name="click" value="Search"class="btn btn-default " />
                </form>
            </div>
            <table class="table table-bordered">
                <tr>
                    <th>Sl No</th>
                    <th>Bus No.</th>
                    <th>Bus Name</th>
                    <th>Route</th>
                    <th>Stopage</th>
                    <th>Driver</th>
                    <th>Remarks</th>
                    <th>Action</th>
                    
                </tr>
                <?php 
		$bus=new Bus();
                $get_bus = $bus->get_bus();
                if ($get_bus) {
                    $i = 1;
                    while ($row = $get_bus->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['busNo']; ?></td>
                            <td><?php echo $row['busName']; ?></td>
                            <td><?php echo $row['route']; ?></td>
                            <td><?php echo $row['stopage']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['remarks']; ?></td>
                            <td><a class="btn btn-success" href="applyForm.php?busNo=<?php echo $row['busNo'];?>" >Apply</a></td>
                            
                        </tr>
                    <?php }
                } else { ?>
                        <tr><td colspan="9"><div class='alert alert-warning text-center'>No Records found!!!</div></td></tr>
                    <?php }  ?>
            </table>
            
        </div>
    </div>
</div>
<?php include './inc/footer.php'; ?>
        


