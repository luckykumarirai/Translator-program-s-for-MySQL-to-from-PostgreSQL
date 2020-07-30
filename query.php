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
        <a class="nav-link" href="query.php">Query<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="index.html">Converter</a>
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
  <body style="background-color:powderblue" >

          <div class="container-fluid" style="text-align:center;"><!--div for conatianer-fluid-->
              <div class="row" style="height:10%;background-color:orange;"><!--div for row on top-->
                  <div class="col-sm-12" style="margin-top:10px;"><!--div for column grid12d-->
                     <button type="button" onclick="changeContentinsert();" class="btn btn-info">insert</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

                    <button type="button" onclick="changeContentdel();" class="btn btn-info">delete</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

                    <button type="button" onclick="changeContentselectall();"class="btn btn-info">select *</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

                    <button type="button" onclick="changeContentselect();" class="btn btn-info">select</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

                    <button type="button" onclick="changeContentupdate();" class="btn btn-info">update</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  </div><!--div for column of grid12-->

                </div><!--end div for row on top bar -->

                
        <div class="row" style="margin-top:30px;"><!--div for row in button-->
          <div class="col-sm-5"><!--div for grid 5-->
          <form id="2" method="post" class="form" style=" margin-left:40px;">
            <?php
            include("dbcon.php");
            $query="select *from pg_catalog.pg_tables where schemaname !='pg_catalog' and schemaname !='information_schema'";
            ?>
            <div class="form-row">
            <h3 style="text-align:center;">Select table</h3>
            </div>
            <div class="form-row">
            <select class="form-control" name="u1" style="width:300px;">
            <option> _ _ _ _ _ _ _ _ _ _ _</option>
                <?php
              	foreach($dbcon->query($query) as $row)
              	{
              	?>

              		 <option> <?php  print $row["tablename"]; ?> </option>

              	<?php
              	}
                ?>
              </select><br /><br /><br />
              </div>
               <div class="form-row">
                 <input type="submit" class="btn btn-success"   style="width:150px"; name="submit" value="SQL"  />
              </div>
            </form>
          </div><!--end div for grid 5-->

        <?php
        //this function for finding the number of culumn in table selected by user
        if(isset($_POST['submit']))
        {
            $tn=$_POST['u1'];
            $q1="select column_name from information_schema.columns where table_name='$tn'";
            $a=array();
            $k=0;
        		foreach($dbcon->query($q1) as $row1)
        		{


        			   $a[$k]=$row1["column_name"];
                 $k++;

        		}
            $arrlength = count($a);

        }
         ?>
         <div class="col-sm-7" >
           <form class="form"  method="post" action="table.php">
               <h2>Query result:-</h2>
             <textarea class="form-control" name="text" id="textArea1" style="width: 100%;color:blue;background-color:cornsilk;border: 1px solid black;border-radius: 10px;text-align:center;" rows="15">

             </textarea><br /><br />
             <input type="hidden" value="<?php echo $tn; ?>" name="tablename" />
            <input  type="submit"  name="submit1" class="btn btn-success"  style="width:200px"; >

          </form>
        </div><!--end div for grid 7-->
     </div><!--end div row-->



        <script>
        function changeContentinsert() {
            document.getElementById('textArea1').innerHTML
                    = "insert into <?php echo $tn." "; echo "(";
                    for($i=0;$i<$arrlength;$i++)
                    {
                        if($i==$arrlength-1)
                        echo "`".$a[$i]."`";
                        else
                        {
                          echo "`".$a[$i]."`"." ,";
                        }
                    }
                    echo ")  values (";
                    for($i=0;$i<$arrlength;$i++)
                    {

                        if($i==$arrlength-1)
                        echo " ' "."values$i"." ' ";
                        else {
                        echo " ' "."values$i"."  '".",";
                        }
                    }
                    echo ");";
                    ?>";
        }
        function changeContentdel() {
            document.getElementById('textArea1').innerHTML
                    = "delete from <?php echo $tn ?> ;";
        }
        function changeContentselectall() {
            document.getElementById('textArea1').innerHTML
                    = "select * from <?php echo $tn ?> ;";
        }
        function changeContentselect() {
            document.getElementById('textArea1').innerHTML
                    = "select <?php

                    for($i=0;$i<$arrlength;$i++)
                    {
                        if($i==$arrlength-1)
                        echo $a[$i] ;
                        else
                        {
                          echo  $a[$i].",";
                        }
                    }
                      echo   "  "."from"."  ".$tn ."  "."where".";"?>";
        }
        function changeContentupdate() {
            document.getElementById('textArea1').innerHTML
                    = "alter  table  <?php echo  $tn ?> set  ;";
        }
    </script>
</div><!--end fluid-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>
