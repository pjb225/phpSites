<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Search</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>


<?php



$db->pdo = new PDO('mysql:host=localhost;dbname=giexample;charset=utf8', 'root', '');
$db->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);




    if(isset($_GET['searchquery'])) {
      $searchquery = $_GET["searchquery"];
      $searchquery2 = $_GET["searchquery2"];
      $searchquery3 = $_GET["searchquery3"];
      $searchquery4 = $_GET["searchquery4"];
      $searchquery5 = $_GET["searchquery5"];


      $stmt = $db->prepare("SELECT * FROM `gi2015_v2` WHERE `searchstring` LIKE :searchquery
        AND `country` LIKE :country
        AND `searchlanguage` LIKE :lang
        AND `searchtype` LIKE :category
        AND `Visits` >= :visits

      ");
      $stmt->execute(array(':searchquery' => "%" . $searchquery . "%",
':country' => "%" . $searchquery2 . "%",
':lang' => "%" . $searchquery3 . "%",
':category' => "%" . $searchquery4 . "%",
':visits' => "%" . $searchquery5 . "%",
    ));

    $filelocation = 'C:/Users/PJ/Desktop/Getty';
    	$filename  = 'export-'.date('Y-m-d H.i.s').'.csv';


        $data = fopen($filelocation.$filename, 'w')  or die('Permission error');


        $csv_fields = array();

       	$csv_fields[] = 'searchstring';
       	$csv_fields[] = 'country';
       	$csv_fields[] = 'searchlanguage';
       	$csv_fields[] = 'searchtype';
        $csv_fields[] = 'visits';


       	fputcsv($data, $csv_fields);

           while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
               fputcsv($data, $row);
           }
fclose($data);
       }



?>


</body>
</html>
