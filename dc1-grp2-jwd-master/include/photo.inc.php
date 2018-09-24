<article class="col-4 miniature">

    <a href="photo.php?id=<?php echo $photo["id"]; ?>" title="<?php echo $photo["titre"]; ?>">
        <img src="images/<?php echo $photo["img"]; ?>" alt="<?php echo $photo["titre"]; ?>" title="<?php echo $photo["titre"]; ?>">
    </a>
    <p><?php echo $photo["nb_likes"]; ?> likes</p>

    <div class="infos">
        <h3><?php echo $photo["titre"]; ?> <?php echo $photo["categorie"]; ?></h3>
        <p>
            <?php $liste_tags = getAllTagsByPhoto($photo["id"]); ?>
            <?php foreach ($liste_tags as $tag) : ?>
            <a href="categorie.php?id=<?php echo $tag["id"]; ?>">
                # <?php echo $tag["libelle"]; ?>
            </a>
            <?php endforeach; ?>
        </p>
        <p><?php echo $photo["date_creation_format"]; ?></p>
        <p><?php echo $photo["description"];?></p>
    </div>

</article>