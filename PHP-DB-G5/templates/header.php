<!DOCTYPE html>
<html lang="en">
<head>
    <script language="javascript" type="text/javascript">
        window.history.forward();
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook 2.0</title>
    <!-- Your style here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style.css">
    <!-- icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
</head>
<body>
    <?php 
        if (isset($_GET['pages'])) {
            $active = $_GET['pages'];
        }
    ?>
<div class="header">
    <img src="../images/logo.png" alt="logo" width="10%" class="logo">
    <div class="menu">
        <a href="../linkPage.php?pages=post_view" class="home menu-item <?php if ($active != 'profile_view' & $active != 'comment_view' ) echo "active" ?>">
            <i class="fa fa-home fa-2x "></i>
        </a>
        <a href="../linkPage.php?pages=profile_view" class="profile menu-item <?php if ($active == 'profile_view') echo "active" ?>">
            <i class="fa fa-user fa-2x "></i>
        </a>
        <a href="../index.php" class="logout menu-item <?php if ($active == 'logout') echo "active" ?>">
            <i class="fa fa-sign-out fa-2x"></i>
        </a>
    </div>
</div>