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

<?php
if (isset($_GET['submit']) && isset($_POST['site_name']) && isset($_POST['site_description']) && isset($_POST['adminacc_username']) && isset($_POST['adminacc_email']) && isset($_POST['adminacc_password'])) {
    require("../../ncms-content/modules/app/configuration_Functions.php");
    require("../../ncms-content/modules/app/encryption_Core.php");
    $json = json_decode(file_get_contents("../../ncms-storage/configuration/database_config.json", true), true);
    updateConfiguration("site_name", $_POST["site_name"]);
    updateConfiguration("site_description", $_POST["site_description"]);
    updateConfiguration("site_email", encryptData($_POST["site_email"]));
    updateConfiguration("site_keywords", $_POST["site_keywords"]);
    updateConfiguration("site_language", "en-US");
    updateConfiguration("admin_email", encryptData($_POST["adminacc_email"]));
    updateConfiguration("admin_username", encryptData($_POST["adminacc_username"]));
    updateConfiguration("admin_password", encryptData($_POST["adminacc_password"]));
    header("Location: ?pg=3");
}
?>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title"><i>
                            <x style="color:gray">Nexu »</x>
                        </i> Website Configuration</h2>

                    <form class="row g-3" method="post" action="?pg=2&submit">

                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Site Name <x style="color:red">*</x></label>
                            <input style="padding: 10px" type="text" class="form-control" placeholder="Nexu Blog" name="site_name" required>
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Site Description <x style="color:red">*</x></label>
                            <input style="padding: 10px" type="text" class="form-control" placeholder="View latest Nexu articles and updates!" name="site_description" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Site Email Address <x style="color:red">*</x></label>
                            <input style="padding: 10px" type="email" class="form-control" placeholder="contact@example.com" name="site_email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Site Keywords</label>
                            <input style="padding: 10px" type="text" class="form-control" value="blog, education" name="site_keywords">
                        </div>

                        <hr>

                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Admin Account Username <x style="color:red">*</x></label>
                            <input style="padding: 10px" type="text" class="form-control" placeholder="admin" name="adminacc_username" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Admin Account Password <x style="color:red">*</x></label>
                            <input style="padding: 10px" type="password" class="form-control" placeholder="" name="adminacc_password" required>
                        </div>
                        <div class="col-md-12">
                            <label for="inputEmail4" class="form-label">Admin Account Email <x style="color:red">*</x></label>
                            <input style="padding: 10px" type="email" class="form-control" placeholder="admin@example.com" name="adminacc_email" required>
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