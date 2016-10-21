<?php
defined('included') or die('Brak dostępu!');
?>
<div id="block-category">
  <p class="header-title" >Kategorie towarów</p>
  <ul>
    <li><a id="index1" ><img src="/images/switch-icon.gif" id="switch-images" />Switche</a>
      <ul class="category-section">
        <li><a href="view_cat.php?type=switch"><strong>Wszystkie modele</strong> </a></li>
        <?php
        $result = mysqli_query($link, "SELECT * FROM category WHERE type='switch'");
        If (mysqli_num_rows($result) > 0)
        {
          $row = mysqli_fetch_array($result);
          do
          {
           echo '
           <li><a href="view_cat.php?cat='.strtolower($row["model"]).'&type='.$row["type"].'">'.$row["model"].'</a></li>
           ';
         }
         while ($row = mysqli_fetch_array($result));
       } 
       ?>
     </ul>
   </li>
   <li><a id="index2" ><img src="/images/router-icon.gif" id="router-images" />Routery</a>
    <ul class="category-section">
      <li><a href="view_cat.php?type=router"><strong>Wszystkie modele</strong> </a></li>
      <?php
      $result = mysqli_query($link, "SELECT * FROM category WHERE type='router'");
      If (mysqli_num_rows($result) > 0)
      {
        $row = mysqli_fetch_array($result);
        do
        {
         echo '
         <li><a href="view_cat.php?cat='.strtolower($row["model"]).'&type='.$row["type"].'">'.$row["model"].'</a></li>
         ';
       }
       while ($row = mysqli_fetch_array($result));
     } 
     ?>
 </ul>
 </li>
 <li><a id="index4" ><img src="/images/cable-icon.gif" id="cable-images" />Kable</a>
  <ul class="category-section">
    <li><a href="view_cat.php?type=cable"><strong>Wszystkie kategorie</strong> </a></li>
    <?php
    $result = mysqli_query($link, "SELECT * FROM category WHERE type='cable'");
    If (mysqli_num_rows($result) > 0)
    {
      $row = mysqli_fetch_array($result);
      do
      {
       echo '
       <li><a href="view_cat.php?cat='.strtolower($row["model"]).'&type='.$row["type"].'">'.$row["model"].'</a></li>
       ';
     }
     while ($row = mysqli_fetch_array($result));
   } 
   ?>
 </ul>
</li>
<li><a id="index5" ><img src="/images/access-icon.gif" id="cable-images" />Akcesoria</a>
  <ul class="category-section">
    <li><a href="view_cat.php?type=acces"><strong>Wszystkie podkategorie</strong> </a></li>
    <?php
    $result = mysqli_query($link, "SELECT * FROM category WHERE type='acces'");
    If (mysqli_num_rows($result) > 0)
    {
      $row = mysqli_fetch_array($result);
      do
      {
       echo '
       <li><a href="view_cat.php?cat='.strtolower($row["model"]).'&type='.$row["type"].'">'.$row["model"].'</a></li>
       ';
     }
     while ($row = mysqli_fetch_array($result));
   } 
   ?>
 </ul>
</li>
</ul>
</div>
