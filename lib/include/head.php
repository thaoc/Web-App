<?php
    $homeDir = $_SERVER['HOME'];
?>
<head>
	<meta charset="utf-8">
	<title>Damascus Way</title>
	<meta name="description" content="Damascus Way">
	<meta name="author" content="Damascus Way">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 

    <?php
        // Session start should go here
        // session_start();
        echo "<link rel='icon' type='image/png' href='" . $homeDir . "/img/favicon.png'>";
        echo "<link rel='stylesheet' href='" . $homeDir . "../style/damascusBaseCSS.css?v=1.0'>";
    ?>
</head>