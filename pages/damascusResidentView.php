<!doctype html>

<html lang="en">

<?php include "../lib/head.php" ?>

<body>

<?php include "../lib/menu.php" ?>
		
<h1> Residents </h1>




<!-- Buttons to choose list or grid view -->
<button onclick="listView()"><i class="fa fa-bars"></i> List</button>
<button onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>

  <div class="search-container">
    <form action="/#.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
	  <br><br>
        
<div id="radio">
  <label>Sort By:</label>
  <ul>
    <li><input type="radio"  name = "sorter"> First Name</li>
    <li><input type="radio"  name = "sorter" > Last Name</li>
  </ul>
</div>
    </form>
  </div>  
  
  <!-- Code will programmatically update with database values later and create links based on
  residents names drawn from database. This is only dummy data to show what it will look like when
  finished. -->

<div class="row">
 <div class="column2" style="background-color:#FFC7AF;"> 
  	<div id = "outer">	
    <h2 class="inline">John Doe</h2>
    <span class="iconimg">    
        <a href="#" title="Log Call"><img src="../img/interface/png/phone-book.png" class="icon"/></a>
        <a href="#" title="Call History"><img src="../img/interface/png/clock.png" class="icon"/></a>
        <a href="#" title="Profile"><img src="../img/interface/png/user-3.png" class="icon"/></a>
        <a href="#" title="Case Notes"><img src="../img/interface/png/document.png" class="icon"/></a>
    </span>    
        <!--
        <br>
					<div class="residentButtons">
						<input type="button" value="Add Call" class="button">
					</div>
					<div class="residentButtons">
						<input type="button" value="Resident Call" class="button">
					</div>
					<div class="residentButtons">
						<input type="button" value="View Profile" class="button">
					</div>
        -->
					
  </div>
  </div>
</div>    
 <div class="row">
 <div class="column2" style="background-color:#B6D794;">
  	<div id = "outer">	
    <h2 class="inline">Sam Smith</h2>
        <span class="iconimg">    
        <a href="#" title="Log Call"><img src="../img/interface/png/phone-book.png" class="icon"/></a>
        <a href="#" title="Call History"><img src="../img/interface/png/clock.png" class="icon"/></a>
        <a href="#" title="Profile"><img src="../img/interface/png/user-3.png" class="icon"/></a>
        <a href="#" title="Case Notes"><img src="../img/interface/png/document.png" class="icon"/></a>
    </span>    
    <!--    
        <br>
					<div class="residentButtons">
						<input type="button" value="Add Call" class="button">
					</div>
					<div class="residentButtons">
						<input type="button" value="Resident Call" class="button">
					</div>
					<div class="residentButtons">
						<input type="button" value="View Profile" class="button">
					</div>
    -->
					
  </div>
  </div>
</div>      

<div class="row">
  <div class="column2" style="background-color:#FFC7AF;"> 
  	<div id = "outer">	
    <h2 class="inline">Jacob Jingleheimerschmidt</h2>
        <span class="iconimg">    
        <a href="#" title="Log Call"><img src="../img/interface/png/phone-book.png" class="icon"/></a>
        <a href="#" title="Call History"><img src="../img/interface/png/clock.png" class="icon"/></a>
        <a href="#" title="Profile"><img src="../img/interface/png/user-3.png" class="icon"/></a>
        <a href="#" title="Case Notes"><img src="../img/interface/png/document.png" class="icon"/></a>
    </span>    
        
    <!--    
        <br>
					<div class="residentButtons">
						<input type="button" value="Add Call" class="button">
					</div>
					<div class="residentButtons">
						<input type="button" value="Resident Call" class="button">
					</div>
					<div class="residentButtons">
						<input type="button" value="View Profile" class="button">
					</div>
    -->
					
  </div>
  </div>
</div>     
 <div class="row">
  <div class="column2" style="background-color:#B6D794;">
  	<div id = "outer">
    <h2 class="inline">Osmosis Jones</h2>
    <span class="iconimg">    
        <a href="#" title="Log Call"><img src="../img/interface/png/phone-book.png" class="icon"/></a>
        <a href="#" title="Call History"><img src="../img/interface/png/clock.png" class="icon"/></a>
        <a href="#" title="Profile"><img src="../img/interface/png/user-3.png" class="icon"/></a>
        <a href="#" title="Case Notes"><img src="../img/interface/png/document.png" class="icon"/></a>
    </span>    
    
 
    <!--    
        <br>
					<div class="residentButtons">
						<input type="button" value="Add Call" class="button">
					</div>
					<div class="residentButtons">
						<input type="button" value="Resident Call" class="button">
					</div>
					<div class="residentButtons">
						<input type="button" value="View Profile" class="button">
					</div>
    -->
					
  </div>
  </div>     
  
</div>


	<?php include "../lib/footer.php" ?>
	<?php include "../lib/script.php" ?>

</body>
</html>