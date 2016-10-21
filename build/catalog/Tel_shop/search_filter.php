<?php
define('included', true);
include "include/db_connect.php";
include "functions/functions.php";
session_start();
include "include/auth_cookie.php";
$cat  = clear_string($link, $_GET["cat"]);
$type = clear_string($link, $_GET["type"]);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-2" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="trackbar/trackbar.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/js/jcarousellite_1.0.1.js"></script>
    <script type="text/javascript" src="/js/shop-script.js"></script>
    <script type="text/javascript" src="/js/jquery.cookie.min.js"></script>
    <script type="text/javascript" src="/trackbar/jquery.trackbar.js"></script>
    <script type="text/javascript" src="/js/TextChange.js"></script>

  <title>Wyszukiwanie za parametrami </title>
</head>
<body>

<div id="block-body">
<?php
include "include/block-header.php";
?>
<div id="block-right">
<?php
include "include/block-category.php";
include "include/block-parameter.php";
include "include/block-news.php";
?>
</div>
<div id="block-content">



<?php

if ($_GET["model"]) {
    $check_model = implode(',', $_GET["model"]);
}

$start_price = (int) $_GET["start_price"];
$end_price   = (int) $_GET["end_price"];

if (!empty($check_model) or !empty($end_price)) {

    if (!empty($check_model)) {
        $query_model = " AND model_id IN($check_model)";
    }

    if (!empty($end_price)) {
        $query_price = " AND price BETWEEN $start_price AND $end_price";
    }

}

$result = mysqli_query($link, "SELECT * FROM table_products WHERE visible='1' $query_model $query_price ORDER BY products_id DESC");

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);

    echo '
 <div id="block-sorting">
<p id="nav-breadcrumbs"><a href="index.php" >Strona Główna</a> \ <span>Wszystkie towary</span></p>
<ul id="options-list">
<li>Rodzaj: </li>
<li><img id="style-grid" src="/images/icon-grid.png" /></li>
<li><img id="style-list" src="/images/icon-list.png" /></li>
<li><a id="select-sort">' . $sort_name . '</a>
<ul id="sorting-list">
<li><a href="view_cat.php?' . $catlink . 'type=' . $type . '&sort=price-asc" >Od tanich do drogich</a></li>
<li><a href="view_cat.php?' . $catlink . 'type=' . $type . '&sort=price-desc" >Od drogich do tanich</a></li>
<li><a href="view_cat.php?' . $catlink . 'type=' . $type . '&sort=popular" >Popularne</a></li>
<li><a href="view_cat.php?' . $catlink . 'type=' . $type . '&sort=news" >Nowości</a></li>
<li><a href="view_cat.php?' . $catlink . 'type=' . $type . '&sort=model" >Od A do Z</a></li>
</ul>
</li>
</ul>
</div>

 <ul id="block-tovar-grid" >

 ';

    do {

        if ($row["image"] != "" && file_exists("./upload_images/" . $row["image"])) {
            $img_path             = './upload_images/' . $row["image"];
            $max_width            = 200;
            $max_height           = 200;
            list($width, $height) = getimagesize($img_path);
            $ratioh               = $max_height / $height;
            $ratiow               = $max_width / $width;
            $ratio                = min($ratioh, $ratiow);
            $width                = intval($ratio * $width);
            $height               = intval($ratio * $height);
        } else {
            $img_path = "/images/no-image.png";
            $width    = 110;
            $height   = 200;
        }
          $query_reviews = mysqli_query($link, "SELECT * FROM table_reviews WHERE products_id ='{$row["products_id"]}' AND moderat='1' ORDER BY reviews_id DESC");
            $count_reviews = mysqli_num_rows($query_reviews);

        echo '

  <li>
  <div class="block-images-grid" >
  <img src="' . $img_path . '" width="' . $width . '" height="' . $height . '" />
  </div>
  <p class="style-title-grid" ><a href="view_content.php?id='.$row["products_id"].'" >'.$row["title"].'</a></p>
  <ul class="reviews-and-counts-grid">
  <li><img src="/images/eye-icon.png" /><p>' . $row["count"] . '</p></li>
  <li><img src="/images/comment-icon.png" /><p>' . $count_reviews . '</p></li>
  </ul>
  <a class="add-cart-style-grid" tid="'.$row["products_id"].'"></a>
  <p class="style-price-grid" ><strong>' . $row["price"] . '</strong> zł.</p>
  <div class="mini-features" >
  ' . $row["mini_features"] . '
  </div>
  </li>

  ';

    } while ($row = mysqli_fetch_array($result));

    ?>
</ul>


<ul id="block-towar-list" >

<?php

    $result = mysqli_query($link, "SELECT * FROM table_products WHERE visible='1' $query_model $query_price ORDER BY products_id DESC");

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        do {

            if ($row["image"] != "" && file_exists("./upload_images/" . $row["image"])) {
                $img_path             = './upload_images/' . $row["image"];
                $max_width            = 150;
                $max_height           = 150;
                list($width, $height) = getimagesize($img_path);
                $ratioh               = $max_height / $height;
                $ratiow               = $max_width / $width;
                $ratio                = min($ratioh, $ratiow);
                $width                = intval($ratio * $width);
                $height               = intval($ratio * $height);
            } else {
                $img_path = "/images/noimages80x70.png";
                $width    = 80;
                $height   = 70;
            }
              $query_reviews = mysqli_query($link, "SELECT * FROM table_reviews WHERE products_id ='{$row["products_id"]}' AND moderat='1' ORDER BY reviews_id DESC");
            $count_reviews = mysqli_num_rows($query_reviews);

            echo '

  <li>
  <div class="block-images-list" >
  <img src="' . $img_path . '" width="' . $width . '" height="' . $height . '" />
  </div>

  <ul class="reviews-and-counts-list">
  <li><img src="/images/eye-icon.png" /><p>' . $row["count"] . '</p></li>
  <li><img src="/images/comment-icon.png" /><p>' . $count_reviews . '</p></li>
  </ul>

  <p class="style-title-list" ><a href="view_content.php?id='.$row["products_id"].'" >'.$row["title"].'</a></p>

  <a class="add-cart-style-list"  tid="'.$row["products_id"].'"></a>
  <p class="style-price-list" ><strong>' . $row["price"] . '</strong> zł.</p>
  <div class="style-text-list" >
  ' . $row["mini_description"] . '
  </div>
  </li>

  ';

        } while ($row = mysqli_fetch_array($result));
    }
} else {
    echo '<h3>Kategoria nie jest dostępna lub nie istnieje!</3>';
}

?>
</ul>


</div>

<?php
include "include/block-footer.php";
?>
</div>

</body>
</html>
