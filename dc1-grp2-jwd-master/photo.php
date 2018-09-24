<?php
require_once 'functions.php';
require_once 'model/database.php';

$id = $_GET["id"];

$photo = getPhoto($id);
$liste_tags = getAllTagsByPhoto($id);
$Cahuete = getAllcommentaires($id);

getHeader($photo["titre"], "Description page photo");
?>

<header>
    <div class="row col_center">
        <?php getMenu(); ?>
    </div>
</header>

<main class="row col_center">

    <h1><?php echo $photo["titre"]; ?></h1>
    <h2><?php echo $photo["date_creation"]; ?></h2>
    <img src="images/<?php echo $photo["img"]; ?>">

    <ul>
        <?php foreach ($liste_tags as $tag) : ?>
            <li># <?php echo $tag["libelle"]; ?></li>
        <?php endforeach; ?>
    </ul>

    <p> <?php echo $photo["description"]; ?> </p>
    <p> <?php echo $photo["nb_likes"]; ?> Likes </p>
    <a href="categorie.php?id=<?php echo $tag["id"]; ?>"><?php echo $tag["libelle"]; ?></a>

    <section class="esp_com">
        <form action="" method="POST">
            <textarea id="contenu" name="contenu" placeholder="Votre message">  </textarea>
            <button type="button" onclick="inscription(); document.location.reload(true);"> Valider </button>
        </form>
        <?php foreach ($Cahuete as $commentaire) : ?>
            <article>
                <p>Posté le <?php echo $commentaire["date_creation"]; ?></p>
                <p><?php echo $commentaire["contenu"]; ?></p>
            </article>
        <?php endforeach; ?>
    </section>

    <p id="result"></p>

    <script>
        function inscription() {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', "insert-commentaire.php");
            xhr.onload = function() {
                document.getElementById('result').innerHTML = this.responseText;
            };
            xhr.onerror = function() {
                document.getElementById('result').innerHTML = this.responseText;
            };

            var contenu = document.getElementById('contenu').value;
            var id_photo = <?php echo $id; ?>;
            var formData = new FormData();
            formData.append('contenu', contenu);
            formData.append('id_photo', id_photo);

            xhr.send(formData);
        }
    </script>

</main>

<?php getFooter(); ?>