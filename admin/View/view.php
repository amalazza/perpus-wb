<!--page to see pdf-->
<?php  if (empty($this->oView)):?>
<p class="error">Post Data Not Found!</p>
<?php else: 
header('Content-Type:application/pdf');
echo $this->oView->e_book;?>
<?php endif ?>