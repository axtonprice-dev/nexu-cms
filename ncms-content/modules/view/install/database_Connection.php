<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Nexu Installer</title>
    <link rel="icon" type="image/x-icon" href="../../ncms-content/assets/img/favicon.png">

    <!-- Icons font CSS-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="../../ncms-content/assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../../ncms-content/assets/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../../ncms-content/assets/css/main.css" rel="stylesheet" media="all">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title"><i>
                            <x style="color:gray">Nexu »</x>
                        </i> Connect to Database</h2>

                    <?php
                    if (isset($_POST["hostname"]) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["database"]) && isset($_POST["tableprefix"]) && isset($_GET["submit"])) {
                        $hostname = $_POST["hostname"];
                        $username = $_POST["username"];
                        $password = $_POST["password"];
                        $database = $_POST["database"];
                        $tableprefix = $_POST["tableprefix"];

                        $conn = new mysqli($hostname, $username, $password, $database);

                        if ($conn->connect_error) {
                    ?>
                            <div class="alert alert-danger">
                                <strong>Error:</strong> <?= $conn->connect_error; ?>
                            </div><br>
                            <script>
                                window.history.pushState("", "", '/ncms-system/install/?pg=1');
                            </script>
                    <?php
                        } else {
                            require("../../ncms-content/modules/app/configuration_Functions.php");
                            require("../../ncms-content/modules/app/encryption_Core.php");
                            updateConfiguration("site_url", $_SERVER["HTTP_HOST"]);
                            updateConfiguration("site_language", "en-US");
                            updateConfiguration("admin_email", encryptData("demo@example.com"));
                            updateConfiguration("admin_username", encryptData("admin"));
                            updateConfiguration("admin_password", encryptData("password"));
                            storeDatabaseConnection(encryptData($_POST["hostname"]), encryptData($_POST["username"]), encryptData($_POST["password"]), encryptData($_POST["database"]), encryptData($_POST["tableprefix"]));
                            header("Location: ?pg=2");
                        }
                    }

                    ?>

                    <form class="row g-3" method="post" action="?pg=1&submit">
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Hostname <x style="color:red">*</x></label>
                            <input style="padding: 10px" type="text" class="form-control" placeholder="mysql.example.com" name="hostname" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Database Username <x style="color:red">*</x></label>
                            <input style="padding: 10px" type="text" class="form-control" name="username" placeholder="admin" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Database Password <x style="color:red">*</x></label>
                            <input style="padding: 10px" type="text" class="form-control" name="password" placeholder="password123" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Database <x style="color:red">*</x></label>
                            <input style="padding: 10px" type="text" class="form-control" placeholder="nexu-cms" name="database" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Tables Prefix <x style="color:red">*</x></label>
                            <input style="padding: 10px" type="text" class="form-control" value="nexucms_" name="tableprefix" required>
                        </div>

                        <div class="col-12"><br>
                            <button type="submit" class="btn btn-primary btn-lg">Continue »</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>
<!-- end document-->