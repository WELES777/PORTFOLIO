<?php
defined('included') or die('Brak dostępu!');
$error_img = array();
if ($_FILES['upload_image']['error'] > 0) {
    switch ($_FILES['upload_image']['error']) {
        case 1:$error_img[] = 'Przekroczony rozmiar pliku UPLOAD_MAX_FILE_SIZE';
            break;
        case 2:$error_img[] = 'Przekroczony rozmiar pliku MAX_FILE_SIZE';
            break;
        case 3:$error_img[] = 'Nie udało wysłać część pliku';
            break;
        case 4:$error_img[] = 'Plik nie był wysłany';
            break;
        case 6:$error_img[] = 'Nie znaleziono czasowego folderu.';
            break;
        case 7:$error_img[] = 'Nie udało się pobrać plik na dysk.';
            break;
        case 8:$error_img[] = 'PHP-rozszerzenie skasowało wysłanie pliku.';
            break;
    }
} else {
    if ($_FILES['upload_image']['type'] == 'image/jpeg' || $_FILES['upload_image']['type'] == 'image/jpg' || $_FILES['upload_image']['type'] == 'image/png') {
        $imgext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES['upload_image']['name']));
        $uploaddir = '../upload_images/';
        $newfilename = $_POST["form_type"] . '-' . $id . rand(10, 100) . '.' . $imgext;
        $uploadfile = $uploaddir . $newfilename;
        if (move_uploaded_file($_FILES['upload_image']['tmp_name'], $uploadfile)) {
            $update = mysqli_query($link, "UPDATE table_products SET image='$newfilename' WHERE products_id = '$id'");
        } else {
            $error_img[] = "Błąd wysłania pliku.";
        }
    } else {
        $error_img[] = 'Dostępne formaty: jpeg, jpg, png';
    }
}
