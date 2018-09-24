<?php
require_once 'functions.php';
require_once 'model/database.php';

$id=$_GET["id"];
$categorie = getEntity("tag", $id);
$liste_photos = getAllPhotosByTag($id);

getHeader($categorie["libelle"], "Une categorie", ["css/contact.css", "css/test.css"]);
?>

    <header>
        <div class="row col_center">
            <?php getMenu(); ?>
        </div>
    </header>

    <h1><?php echo $categorie["libelle"]; ?></h1>

    <section id="gallery">
    <div id="gallery_content" class="row col_center flex_wrapper">
        <?php foreach ($liste_photos as $photo) : ?>
            <?php include 'include/photo.inc.php'; ?>
        <?php endforeach; ?>
    </div>

    </section>

<?php getFooter(); ?>