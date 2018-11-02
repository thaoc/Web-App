<?php
    // Define menu URL's here so they are always based on the current working directory
    define('HOME', getcwd().'/index.php');
    define('RESIDENT', getcwd().'/pages/damascusBaseResident.php');
    define('PROFILE', getcwd().'/pages/damascusBaseProfile.php');
    define('LOGIN', getcwd().'/pages/damascusStaffLogin.php');
?>

<!-- TOP NAVBAR AND LOGO -->
<header>
	<img src="img/DW Logo.png">
	<nav role='navigation'>
		<div id="menuToggle">

			<input type="checkbox" />

			<span></span>
			<span></span>
			<span></span>

			<ul id="menu">
                <?php
                echo "<a class='btn' href='" . HOME . "'><li>Home</li></a>";
                echo "<a class='btn' href='" . RESIDENT . "'><li>Resident List</li></a>";
                echo "<a class='btn' href='" . LOGIN . "'><li>Log In/Out</li></a>";
				echo "<a class='btn' href='" . PROFILE . "'><li>Profile</li></a>";

				?>
			</ul>
		</div>
	</nav>
</header>