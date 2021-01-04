<?php include('server.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Bus Management System</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="header" style="width: 70%">
            <h2>Application Form for login</h2>
        </div>

        <form method="post" action="" style="width: 70%" novalidate>
            <?php include('errors.php'); ?>
            <table class="tbl">
                <tr>
                    <td width="50%">
                        <div class="input-group">
                            <label>Full Name ***</label>
                            <input type="text" name="name" required="1">
                        </div>
                    </td>
                    <td width="50%">
                        <div class="input-group">
                            <label>Username ***</label>
                            <input type="text" name="username" required="1">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="50%">
                        <div class="input-group">
                            <label>Mobile ***</label>
                            <input type="text" name="phone" required="1">
                        </div>
                    </td>
                    <td width="50%">
                        <div class="input-group">
                            <label>Gardian Name ***</label>
                            <input type="text" name="fname" required="1">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="50%">
                        <div class="input-group">
                            <label>Student ID ***</label>
                            <input type="text" name="std_id" required="1">
                        </div>
                    </td>
                    <td width="50%">
                        <div class="input-group">
                            <label>Gardian Phone </label>
                            <input type="text" name="grphone" >
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="input-group">
                            Department:<select class="form-control" name="department" >
                                <option value="0">Select Department</option>
                                <?php
                                $conn = new mysqli('localhost', 'root', '', 'user_data');
                                $sql = "SELECT * FROM department";
                                $result = $conn->query($sql);
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
                    </td>
                    <td>
                        <div class="input-group">
                            Semester:<select class="form-control" name="semester">
                                <option value="0">Select Semester</option>
                                <?php
                                $sql = "SELECT * FROM semester";
                                $result = $conn->query($sql);
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
                    </td>
                </tr>
                <tr>
                    <td>
                    <div class="input-group">
                            <label>Batch</label>
                            <input type="text" name="batch" required="1">
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            student Type:<select class="form-control" name="type">
                                <option value="0">Select Type</option>
                                <option value="Male">Regular</option>
                                <option value="Female">Irrigular</option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="input-group">
                            Religion:<select class="form-control" name="religion">
                                <option value="0">Select Relidion</option>
                                <option value="Male">Islam</option>
                                <option value="Female">Hinuism</option>
                                <option value="Other's">Chrichian</option>
                                <option value="Other's">Chrichian</option>
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <label>Email</label>
                            <input type="email" name="email" required="1">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                    <div class="input-group">
                            Gender:<select class="form-control" name="gender">
                                <option value="0">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other's">Other's</option>
                        </select>
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <label>Remarks</label>
                            <input type="text" name="remarks">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="input-group">
                            <label>Present Address ***</label>
                            <input type="text" name="presentAddpess" required="1">
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <label>Permanant Address</label>
                            <input type="text" name="permanantAddpess">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="input-group">
                            <label>Password ***</label>
                            <input type="password" name="password_1" required="1">
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <label>Confirm password</label>
                            <input type="password" name="password_2" required="1">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="input-group">
                <button type="submit" class="btn" name="reg_user">Register</button>
                <a href="login.php" class="btn_red">Cancel</a>
            </div>
                    </td>
                    <td></td>
                </tr>
            </table>
            <p>
                Already a member? <a href="login.php">Sign in</a>
            </p>
        </form>
    </body>
</html>