<?php

    // Define menu URL's here so they are always based on the current working directory
    $homeDir = $_SERVER['HOME'];

    define('HOME', $homeDir .'/index.php');
    define('RESIDENT', $homeDir .'/pages/damascusResidentView.php');
    define('INTAKE', $homeDir .'/pages/damascusBaseResident.php');
    define('LOGIN', $homeDir.'/pages/damascusLoginStaff.php');
?>

<!-- TOP NAVBAR AND LOGO -->
<header>
	<?PHP
	echo "<a id='menu-img-link' href='" . $homeDir . "/index.php'><img class='menu-img' src='" . $homeDir . "../img/DW Logo.png'></a>";
	?>
	<nav role='navigation'>
		<div id="menuToggle">

			<input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
			<ul id="menu">
                <?php
               // echo "<a class='btn' href='" . HOME . "'><li>Home</li></a>";
                echo "<a class='btn' href='" . RESIDENT . "'><li>Home</li></a>";
				echo "<a class='btn' href='" . INTAKE . "'><li>Intake Form</li></a>";
                echo "<a class='btn' href='" . LOGIN . "'><li>Log In/Out</li></a>";
				?>
			</ul>
		</div>
	</nav>
</header>