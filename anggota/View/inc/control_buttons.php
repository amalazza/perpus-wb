<?php

?>
<?php if(!empty($_SESSION['is_logged'])): ?>

    <button type="button" onclick="window.location='<?=ROOT_URL?>?p=kunjungan&amp;a=edit&amp;id=<?=$oKunjungan->no_kunjungan?>'" class="bold">Edit</button> |
    <form action="<?=ROOT_URL?>?p=kunjungan&amp;a=delete&amp;id=<?=$oKunjungan->no_kunjungan?>" method="post" class="inline"><button type="submit" name="delete" value="1" class="bold">Delete</button></form> |
    <button type="button" onclick="window.location='<?=ROOT_URL?>?p=kunjungan&amp;a=add'" class="bold">Add New Post</button>

<?php endif ?>
