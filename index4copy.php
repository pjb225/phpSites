<?php require 'functions.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php siteName(); ?> | <?php pageTitle(); ?></title>
    <style type="text/css">
        .wrap { max-width: 700px; margin: 50px auto; padding: 30px; text-align: center; box-shadow: 0 0 5px rgba(0,0,0,.5); }
        article { text-align: left; padding: 40px; }
    </style>
</head>
<body>
<div class="wrap">

    <header>
        <h2><?php siteName(); ?></h2>
        <nav class="menu">
            <a href="/" title="Home">Home</a> |
            <a href="/?page=contact-us">Video Searches</a>
        </nav>
    </header>

    <article>
        <h3><?php pageTitle(); ?></h3>
        <?php pageContent();
$db = new PDO('mysql:host=localhost;dbname=giexample;charset=utf8', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
// Create connection

// Check connection

?>
<div id="result">
    <?php include('search4copyCSV.php'); ?>
</div>

<form action="index4copyCSV.php" id="form" method="GET">
<input type="text" id="searchquery" name="searchquery" placeholder="SearchString"></input><br/>
<input type="text" id="searchquery2" name="searchquery2" placeholder="Country"></input><br/>
<input type="text" id="searchquery3" name="searchquery3" placeholder="Language"></input><br/>
<input type="text" id="searchquery4" name="searchquery4" placeholder="Category"></input><br/>
<input type="text" id="searchquery5" name="searchquery5" placeholder="Visits"></input><br/>
<input type="submit" name="submit" value="Submit"></input>
</form>


 </article>


    <footer><small>&copy;<?php echo date('Y'); ?> <?php siteName(); ?>.</small></footer>
</div>
</body>
</html>
