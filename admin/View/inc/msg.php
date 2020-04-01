<?php

?>
<?php if (!empty($this->sErrMsg)): ?>
	<div class="alert alert-danger" role="alert">
	  <?=$this->sErrMsg?>
	</div>
<?php endif ?>

<?php if (!empty($this->sSuccMsg)): ?>
	<div class="alert alert-success" role="alert">
	  <?=$this->sSuccMsg?>
	</div>
<?php endif ?>
