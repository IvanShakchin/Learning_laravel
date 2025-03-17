<!DOCTYPE html>
<head>
<title>Мой сайт</title>
</head>
<body>
<header>
<p>a: <?=$a?></p>
<p>b: <?=$b?></p>
<?php if (isset($composer_data)) { ?>
    <p>composer data: <?=$composer_data?></p>
<?php } ?>
<p>global_var: <?=$global_var?></p>
<?php 
echo '<pre>';
print_r($clients);
echo '</pre>';
?>
</header>
</body>
</html>