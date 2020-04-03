<?php require 'inc/header.php' ?>

<?php if (empty($this->oBuku)): ?>
    <p class="error">The post can't be be found!</p>
<?php else: ?>

    <article>
        <time datetime="<?=$this->oPost->createdDate?>" pubdate="pubdate"></time>

        <h1><?=htmlspecialchars($this->oBuku->pengarang)?></h1>
        <p><?=nl2br(htmlspecialchars($this->oBuku->judul))?></p>

        <?php
            $oBuku = $this->oBuku;
            require 'inc/control_buttons.php';
        ?>
    </article>

<?php endif ?>

<?php require 'inc/footer.php' ?>