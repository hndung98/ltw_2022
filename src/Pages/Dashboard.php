<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>ASSIGNMENT</title>
</head>

<body>
    <?php
    include_once "./Services/AppServices.php";
    echo '<script type="text/javascript" src="../Common/common.js"></script>';

    if (isset($_GET['remove'])) {
        $remove = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['remove']);
        $removeUser = deleteUserById($remove);
    }

    if (isset($removeUser)) {

        echo $removeUser;
    }
    ?>
    <div class="root-container">

        <!-- Header  -->
        <div class="my-container my-bg-color-header sticky-top">
            <?php include_once './Components/header.php'; ?>
        </div>

        <div class="card ">
            <div class="card-header">
                <h3><i class="fas fa-users mr-2"></i>User list <span class="float-right">Welcome! <strong>
                            <span class="badge badge-lg badge-secondary text-white">
                            </span>

                        </strong></span></h3>
            </div>

            <div class="card-body pr-2 pl-2">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">User ID</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Email address</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Created</th>
                            <th width='25%' class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $select_users = "select * from `user`";
                        $result_users = mysqli_query($conn, $select_users);

                        if (mysqli_num_rows($result_users) > 0) {
                            while ($row_data = mysqli_fetch_assoc($result_users)) {
                                $userid = $row_data['UserId'];
                                $username = $row_data['Username'];
                                $lastname = $row_data['LastName'];
                                $email = $row_data['Email'];
                                $phone = $row_data['Phone'];
                                $created = $row_data['CreatedDateTime'];
                                $userType = $row_data['Usertype'];
                                echo " <tr class='text-center'>
    
                            <td>$userid</td>
                            <td>$lastname</td>
                            <td>$username</td>
                            <td>$email</td>
                            <td>$phone</td>
                            <td>";
                                if ($userType == 1) {
                                    echo "Admin";
                                } else {
                                    echo "Customer";
                                }
                                echo " 
                            </td>
                            <td>$created</td>
    
                            <td>
    
                                <a class='btn btn-success btn-sm
                                ' href='profile.php?id'>View</a>
                                <a class='btn btn-info btn-sm ' href='profile.php?id=$userid'>Edit</a>
                                <button onclick='DeleteUser($userid)'> Delete </button>";
                            }
                        } else {
                            echo "<tr class='text-center'>
                    <td>No user availabe now !</td>
                </tr>";
                        };

                        ?>
                        </td>
                        </tr>

                        <a class='btn btn-success btn-sm ' href='AddUser.php'>Add Acount</a>

                    </tbody>

                </table>
            </div>

            <div class="row justify-content-center">
                <form action="./Services/AppServices.php" method="POST">
                    <div class="form-group pt-3">
                        <label for="name">Account Name:</label>
                        <input type="text" name="userName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="firstName">Your First Name:</label>
                        <input type="text" name="firstName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="lastName">Your Last Name:</label>
                        <input type="text" name="lastName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number:</label>
                        <input type="text" name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="userType">User Role:</label>
                        <select class="form-control" name="userType" id="userType">
                            <option value="1">Admin</option>
                            <option value="2">Employee</option>
                            <option value="3">Customer</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select class="form-control" name="gender" id="gender">
                            <option value="0">Male</option>
                            <option value="1">Female</option>
                            <option value="2">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="birthday">Birthday:</label>
                        <label for="month">Month:</label>
                        <select class="form-control" name="month" id="month">
                            <option value="0"></option>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <label for="day">Day:</label>
                        <select class="form-control" name="day" id="day">
                            <option value="0"></option>
                            <?php
                            for ($i = 1; $i <= 31; $i++) {
                                echo "<option value='$i'>$i</option>";
                            }
                            ?>
                        </select>
                        <label for="year">Year:</label>
                        <select class="form-control" name="year" id="year">
                            <option value="0"></option>
                            <?php
                            for ($i = 1930; $i <= date("Y"); $i++) {
                                echo "<option value='$i'>$i</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="addUser" class="btn btn-success">Register</button>
                    </div>
                </form>
            </div>

            <!-- Footer  -->
            <div class="container my-bg-color-footer">
                <?php include_once './Components/footer.php'; ?>
            </div>

        </div>

        <!-- external scripts -->
        <script type="text/javascript" src="../Common/common.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
        <!-- external scripts -->
</body>

</html>