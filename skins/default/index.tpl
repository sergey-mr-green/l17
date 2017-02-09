<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo @$title; ?></title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<link href="./css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
  <header>
    <div>LOGO</div>
    <nav>
      <a href="./">Главная</a>
      <a href="./index.php?module=errros&page=404">404</a>
	  <a href="./index.php?module=cab&page=registration">Registration</a>
    </nav>
  </header>
  <div id="content">
    <?php include $_GET['module'].'/'.$_GET['page'].'.tpl'; echo '<p>'.$_GET['module'].'/'.$_GET['page'].'.tpl'.'<p>';?>
	 
  </div>
  <footer>Копирайты &copy; 2013</footer>
</body>

</html>