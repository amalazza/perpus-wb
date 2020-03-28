<!--page to see pdf-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?=\TestProject\Engine\Config::SITE_NAME?></title>

	</head>
	<body>
<?php  if (empty($this->oView)): 
echo $this->oView->no_katalog;?>
<p class="error">Post Data Not Found!</p>
<?php else: 
header('Content-Type:application/pdf');
echo $this->oView->e_book;?>
<?php endif ?>
</body>
</html>