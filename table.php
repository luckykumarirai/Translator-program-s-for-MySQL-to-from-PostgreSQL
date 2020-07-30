
<html lang="en">
  <head>
    <title>converter program</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="converter" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: #0000FF">
  <a class="navbar-brand" href="#"> Converter  With Query Generation   </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">Converter<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="query.php">Query</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About project</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact Us</a>
      </li>
    </ul>
  </div>
 </nav>
 <div style="width:100%;height:50px;background-color:orange;"><h1 align='center' style="color:green">WELCOME HERE  !!...</h1></div>
 <body style="background-color:powderbluex;margin-top:30px;" >
<center>

  <table class="table" border="1" align="center" style="margin-top:30px;width:80%;">
    <tbody>


<?php
include("dbcon.php");
if(isset($_POST['submit1']))
{
  $t=$_POST['text'];
  $tn=$_POST['tablename'];
  $q="select column_name from information_schema.columns where table_name='$tn' ";
  foreach($dbcon->query($q) as $col)
  {
         ?><tr style="background-color:#000;color:#fff;">
        <td  bgcolor="orange"> <?php echo  $c=$col['column_name'];?></td>
        <?php

  $s="$t";
  foreach($dbcon->query($s) as $row)
			{
				?>
				<td> <?php print $row[$c]; ?> </td>
				<?php
			}
}
			echo "<br>";
			?>
			</tr>
			<?php
}
?>
</tbody>
</table>
</center>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>
