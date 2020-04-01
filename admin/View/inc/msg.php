<?php

?>
<?php if (!empty($this->sErrMsg)): ?>
    <p class="error"><?=$this->sErrMsg?></p>
<?php endif ?>

<?php if (!empty($this->sSuccMsg)): ?>
	<div class="alert alert-success" role="alert">
	  <?=$this->sSuccMsg?>
	</div>
<?php endif ?>
