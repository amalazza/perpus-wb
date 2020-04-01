<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>

<?php if (empty($this->oKunjungan)): ?>
    <p class="error">Post Data Not Found!</p>
<?php else: ?>

    <form action="" method="post">
        <p><label for="no_anggota">No Anggota:</label><br />
            <input type="text" name="no_anggota" id="no_anggota" value="<?=htmlspecialchars($this->oKunjungan->no_anggota)?>" required="required" />
        </p>

        <p><input type="submit" name="edit_submit" value="Update" /></p>
    </form>
<?php endif ?>

<?php require 'inc/footer.php' ?>
