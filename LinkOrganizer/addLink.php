<?php
include_once('Link.php');
foreach(array_keys($_POST) as $key){
    echo "<p>" . $key . " => " . $_POST[$key] . "</p>";
}
    $Link = new Link($_POST['URL'], $_POST['Name'], $_POST['Description']);
    $Link->insert('lo_links');
?>