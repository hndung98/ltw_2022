<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../Common/styles.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/8d6784f1e8.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>BK Shop</title>
</head>

<body>
    <div class="row justify-content-center">
        <form action="../Services/AppServices.php" method="POST">
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
</body>

</html>