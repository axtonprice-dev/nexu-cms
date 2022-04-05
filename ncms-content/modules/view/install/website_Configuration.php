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
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title"><i>
                            <x style="color:gray">Nexu »</x>
                        </i> Website Configuration</h2>

                    <?php
                    // require("../../ncms-content/modules/app/encryption_Core.php");
                    // $json = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/configuration/database_config.json", true), true);
                    // echo decryptData($json["hostname"]);
                    ?>

                    <form class="row g-3" method="post" action="?pg=3&submit">

                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Site Name <x style="color:red">*</x></label>
                            <input style="padding: 10px" type="text" class="form-control" name="username" placeholder="admin" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Database Password <x style="color:red">*</x></label>
                            <input style="padding: 10px" type="text" class="form-control" name="password" placeholder="password123" required>
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Site Description <x style="color:red">*</x></label>
                            <input style="padding: 10px" type="text" class="form-control" placeholder="mysql.example.com" name="hostname" required>
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