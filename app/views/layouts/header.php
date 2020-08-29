<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $data['title'] ?></title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/assets/css/datatables.min.css"">
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="<?= BASEURL; ?>"><img src="<?= BASEURL ?>/assets/images/test.png" alt="" width="40px"></a>
        <?php if($_SESSION['login'] == 'admin'){?>
        <a href="<?= BASEURL ?>/user/logout" class="btn btn-danger">
            Logout
        </a>
        <?php }else{ ?>
        <a href="<?= BASEURL ?>/user/login" class="btn btn-success">
            Login
        </a>
        <?php } ?>
    </div>
</nav>