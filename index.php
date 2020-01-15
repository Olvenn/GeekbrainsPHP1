<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="author" content="Luka Cvrk (www.solucija.com)" />
    <link rel="stylesheet" href="main.css" type="text/css" />
    <?php
	$title = "minimalistica";
    $dateYear = date('Y');
    $titleH1 = "minimalisticaNew";
    echo "<title>$title</title>";
    ?>

</head>
<body>
	<div id="content">
        <?php
		echo "<h1>$titleH1</h1>"
        ?>
        
        <?php
/*
    $a = 5;
    $b = '05';
    var_dump($a == $b);          Почему true?
    // Это неявное приведение типа string переменной $b к типу number, 
    // которое выполняется интерпретатором автоматически.
    // Т.к. при == не сравниваются типы переменных, то '05' = 5.
    // 5 = 5 - это правда.
    
    var_dump((int)'012345');      Почему 12345?
        // При приведении строки к числу, если первая цифра 0, она отбрасывается,
        // потому остаеся число 12345
    
    var_dump((float)123.0 === (int)123.0);  Почему false?
        (float)123.0 - тип float, (int)123.0) - тип integer. 
        // При использовании оператора тождественно равно (===), сравниваются не только значения,
        // но и типы переменных.
    
    var_dump((int)0 === (int)'hello, world');  Почему true?
    // Если первый символ строки не является цифрой, точкой,
    //  знаком + или -, она преобразуется в 0
    */
   
    echo "<br>";
    
    $a = 1;
    $b = 2;
    $a += $b;
    $b = $a - $b;
    $a = $a - $b;
    echo "<br>";
	echo '<div 
	style = "clear: both; border-top: 1px solid #ddd; padding: 20px 20px; font-size: 1.9em; color: #D40000; background-color: #333"
	>';
    echo "Замена значение переменных: \$a = " . $a . "  \$b = " . $b;
    echo "</div>";
?>
		<ul id="menu">
			<li><a href="#">home</a></li>
			<li><a href="#">archive</a></li>
			<li><a href="#">contact</a></li>
		</ul>

	
		<div class="post">
			<div class="details">
				<h2><a href="#">Nunc commodo euismod massa quis vestibulum</a></h2>
				<p class="info">posted 3 hours ago in <a href="#">general</a></p>
			
			</div>
			<div class="body">
				<p>Nunc eget nunc libero. Nunc commodo euismod massa quis vestibulum. Proin mi nibh, dignissim a pellentesque at, ultricies sit amet sapien. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vel lorem eu libero laoreet facilisis. Aenean placerat, ligula quis placerat iaculis, mi magna luctus nibh, adipiscing pretium erat neque vitae augue. Quisque consectetur odio ut sem semper commodo. Maecenas iaculis leo a ligula euismod condimentum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut enim risus, rhoncus sit amet ultricies vel, aliquet ut dolor. Duis iaculis urna vel massa ultricies suscipit. Phasellus diam sapien, fermentum a eleifend non, luctus non augue. Quisque scelerisque purus quis eros sollicitudin gravida. Aliquam erat volutpat. Donec a sem consequat tortor posuere dignissim sit amet at ipsum.</p>
			</div>
			<div class="x"></div>
		</div>
		
		<div class="col">
			<h3><a href="#">Ut enim risus rhoncus</a></h3>
			<p>Quisque consectetur odio ut sem semper commodo. Maecenas iaculis leo a ligula euismod condimentum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut enim risus, rhoncus sit amet ultricies vel, aliquet ut dolor. Duis iaculis urna vel massa ultricies suscipit. Phasellus diam sapien, fermentum a eleifend non, luctus non augue. Quisque scelerisque purus quis eros sollicitudin gravida. Aliquam erat volutpat. Donec a sem consequat tortor posuere dignissim sit amet at.</p>
			<p>&not; <a href="#">read more</a></p>
		</div>
		<div class="col">
			<h3><a href="#">Maecenas iaculis leo</a></h3>
			<p>Quisque consectetur odio ut sem semper commodo. Maecenas iaculis leo a ligula euismod condimentum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut enim risus, rhoncus sit amet ultricies vel, aliquet ut dolor. Duis iaculis urna vel massa ultricies suscipit. Phasellus diam sapien, fermentum a eleifend non, luctus non augue. Quisque scelerisque purus quis eros sollicitudin gravida. Aliquam erat volutpat. Donec a sem consequat tortor posuere dignissim sit amet at.</p>
			<p>&not; <a href="#">read more</a></p>
		</div>
		<div class="col last">
			<h3><a href="#">Quisque consectetur odio</a></h3>
			<p>Quisque consectetur odio ut sem semper commodo. Maecenas iaculis leo a ligula euismod condimentum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut enim risus, rhoncus sit amet ultricies vel, aliquet ut dolor. Duis iaculis urna vel massa ultricies suscipit. Phasellus diam sapien, fermentum a eleifend non, luctus non augue. Quisque scelerisque purus quis eros sollicitudin gravida. Aliquam erat volutpat. Donec a sem consequat tortor posuere dignissim sit amet at.</p>
			<p>&not; <a href="#">read more</a></p>
		</div>
		
		<div id="footer">
			<p>Copyright &copy; <em>minimalistica</em> &middot; Design: Luka Cvrk, <a href="http://www.solucija.com/" title="Free CSS Templates">Solucija</a></p>
		</div>	
	</div>
</body>
</html>