<?php
	defined('included') or die('Brak dostępu!');
?>
<script type="text/javascript">
$(document).ready(function() {
	    $('#blocktrackbar').trackbar({
	onMove : function() {
    document.getElementById("start-price").value = this.leftValue;
	document.getElementById("end-price").value = this.rightValue;	
	},
	width : 160,
	leftLimit : 0,
	leftValue : <?php
	
    if ((int)$_GET["start_price"] >=0 AND (int)$_GET["start_price"] <= 3000)  
    {
       echo (int)$_GET["start_price"];   
    }else
    {
        echo "1000";
    }
    
?>,
	rightLimit : 10000,
	rightValue : <?php
	
    if ((int)$_GET["end_price"] >=100 AND (int)$_GET["end_price"] <= 3000)  
    {
       echo (int)$_GET["end_price"];   
    }else
    {
        echo "30000";
    }
    
?>,
	roundUp : 10
});
});
</script>

<div id="block-parameter">
<p class="header-title" >Wyszukiwanie za parametrami</p>

<p class="title-filter">Cena</p>

<form method="GET" action="search_filter.php">


<div id="block-input-price">
<ul>
<li><p>od</p></li>
<li><input type="text" id="start-price" name="start_price" value="1" /></li>
<li><p>do</p></li>
<li><input type="text" id="end-price" name="end_price" value="3000" /></li>
<li><p>zł</p></li>
</ul>
</div>

<div id="blocktrackbar"></div>


<p class="title-filter">Producenci</p>


<ul class="checkbox-model" >

<?php

$result = mysqli_query($link, "SELECT * FROM category WHERE type='switch'");
 
 If (mysqli_num_rows($result) > 0)
{
$row = mysqli_fetch_array($result);
 do
 {
 $checked_model = ""; 
 if ($_GET["model"])
 {
    if (in_array($row["id"],$_GET["model"]))
    {
        $checked_model = "checked";
    }
    
 } 
  
  
  echo '

<li><input '.$checked_model.' type="checkbox" name="model[]" value="'.$row["id"].'" id="checkbrend'.$row["id"].'" /><label for="checkbrend'.$row["id"].'">'.$row["model"].'</label></li>
  
  
  '; 

 }
  while ($row = mysqli_fetch_array($result));	
} 

	
?>

</ul>

<center><input type="submit" name="submit" id="button-param-search" value=" " /></center> 

</form>


</div>
