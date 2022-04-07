<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Nexu Installer 👋</title>
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

/* Start Site Settings Setup */
$site_settings = array(
    "nav_stories_text" => "Stories",
    "nav_post_text" => "Post",
    "nav_author_text" => "Author",
    "nav_searchbar_placeholder" => "Search",

    "index_welcome_header_message" => "Welcome to %site% 👋",
    "index_feature_tab_text" => "Featured",
    "index_all_stores_tab_text" => "All Stories"
);
if (!is_dir("../../ncms-storage/configuration/")) mkdir("../../ncms-storage/configuration/", 0777, true);
if (!file_exists("../../ncms-storage/configuration/site_settings.json")) touch("../../ncms-storage/configuration/site_settings.json");
file_put_contents("../../ncms-storage/configuration/site_settings.json", json_encode($site_settings));
/* End Site Settings Setup */

/* Start Update ENV File Install State */
$newEnv = '{ "INSTALL_KEY": "' . $json["INSTALL_KEY"] . '","INSTALL_STATE": true }';
file_put_contents("../../_env.json", $newEnv);
/* End Update ENV File Install State */

/* Start Create ENV backup */
mkdir("../../ncms-storage/backups/", 0777, true);
touch("../../ncms-storage/backups/backup_env.json");
file_put_contents("../../ncms-storage/backups/backup_env.json", $newEnv);
/* End Create ENV backup */

/* Start Htaccess and User Dir */
if (!is_dir("../../ncms-storage/user/")) {
    mkdir("../../ncms-storage/user/", 0777, true);
    $htaccess = 'Deny from all';

    touch("../../ncms-storage/user/.htaccess");
    touch("../../ncms-storage/configuration/.htaccess");
    touch("../../ncms-storage/backups/.htaccess");
    file_put_contents("../../ncms-storage/user/.htaccess", $htaccess);
    file_put_contents("../../ncms-storage/configuration/.htaccess", $htaccess);
    file_put_contents("../../ncms-storage/backups/.htaccess", $htaccess);
}
/* End Htaccess and User Dir */

/* Start setup Database */
$config = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/configuration/database_config.json", true), true);
setupDatabase(decryptData($config["hostname"]), decryptData($config["username"]), decryptData($config["password"]), decryptData($config["database"]), decryptData($config["prefix"]));
/* End setup Database */
?>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">

                    <h2 class="title">
                        <i>
                            <x style="color:gray">Nexu Installation »</x>
                        </i>
                        <b>All done! ✅</b>
                    </h2>

                    <p>
                        You've successfully installed Nexu! You can now create, edit and manage content on your site such as blog posts via your <a href="../../admin" style="text-decoration:none">administration dashboard</a>.
                        Use the details you previously entered during the installation to login. <i>Forgotten your details?</i> You may have to re-run the installation and start over.<br><br>
                        The installer has also cleaned up a few files, and set up the database. For security reasons, this installer has also automatically deleted itself from your webserver.<br><br>
                        <b>Thank you for using Nexu!</b>
                        <br>
                        <br>

                        <i class="fa-brands fa-discord"></i> Have any questions? <a href="https://discord.gg/dP3MuBATGc" style="text-decoration:none" target="_blank">Join the Discord server</a>. <br>
                        <i class="fa-brands fa-github"></i> Requests or issues? <a href="https://github.com/axtonprice/nexu-cms/" style="text-decoration:none" target="_blank">View the Github for this project</a>.

                        <br><br>
                    <div class="alert alert-danger">
                        <i class="fa-solid fa-circle-info"></i> <strong>Warning!</strong> Do not delete or modify the <b>_env.json</b> file from your webserver! Doing so will cause you to lose all encrypted data, even if you have backups!
                    </div>

                    </p>
                    <br>

                    <a type="button" class="btn btn-primary btn-lg" style="text-decoration:none" href="../../admin">Admin Dashboard</a>
                    <a type="button" class="btn btn-secondary btn-lg" style="text-decoration:none" href="../../">View Site</a>
                    <br><br>

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