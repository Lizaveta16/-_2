<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="description" content="Chef Fest - ресторан итальянской кухни. В меню представлены как классические итальянские блюда в авторской подаче, так и больше 200 позиций вин разных стран.">

	<link href="https://fonts.googleapis.com/css2?family=Cormorant:wght@300&family=Pacifico&family=Source+Sans+Pro&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/reservation.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

	<title>LChefFest</title>
</head>
<body>

	<!--Header-->
	<header class="header">
		<div class="container">
			<div class="header__inner">
				<div class="header__title">
					<h2>Restaurant</h2>
				</div>

				<div>
					<input type="checkbox" name="toggle" id="menu" class="toggleMenu">
					<label for="menu" class="toggleMenu"><i class="fa fa-bars"></i></label>
					
					<?php
						// Создаем массив значений пунктов меню
						$navs = array('Chef Fest', 'Меню', 'Бронирование', 'Новости', 'О нас');
						// Проверяем существование пункта меню
						if (isset($_GET['id'])){
							$id = $_GET['id'];
						}
						else{
							$id = 0;
						}

					?>
					<nav >
						<ul class = "nav">
							<?php
							// Цикл по всем пунктам меню
							foreach($navs as $key => $nav):                                    
								?>
								<li > <?php if($key <> $id) {?>  
									<a class="nav__link" href="reservation.php?id=<?=$key?>"><?=$nav?></a>
									<?php } else { ?>
									<a class="nav__active" href="#"><?=$nav?></a>
									<?php } ?>
								</li>

							<?php endforeach;?>
						</ul>
					</nav>

					<!-- <ul class="nav">
					<li><a class="nav__link" href="index.html">Chef Fest</a></li>
					<li><a class="nav__link" href="menu.html">Меню</a></li>
					<li><a class="nav__link" href="reservation.html">Бронирование</a></li>
					<li><a class="nav__link" href="news.html">Новости</a></li>
					<li><a class="nav__link" href="AboutUs.html">О нас</a></li>
					</ul>	 -->

				</div>
			</div>		
		</div>
	</header>

	<!-- Reservation section -->
	<section class="section">
		<div class="container">
			<div class="section__header">
				<h2 class="section__title">Бронирование</h2>
			</div>
			<div class="section__info">

				<div class="section__res">
				<form method="POST" >
					<input name="number_of_rows" type="number" class="feedback-input" placeholder="Количество строк">
					<input name = "done" type="submit" value="Построить таблицу" />
            	</form>
				</div>
			</div>

			<div class="section__table">
				<!-- Если кнопка была нажата -->
				<?php if(isset($_POST["done"])) {?>
						<table class="table">
							
							<?php
							$r = 0;
							$g = 0;
							$b = 0;
							// В цикле создаем необходимое кол-во строк
							for($i = 1; $i <= $_POST["number_of_rows"]; $i++){
								$r++; 
								$g++; 
								$b++;
								if ($r == 256){
									$r = $g = $b = 0;
								}
								if($i % 5 == 0) {
									echo "<tr bgcolor = \"#89ed87\">";									 
									$r--; 
									$g--; 
									$b--;
								} 
								else {
									$rhex = dechex($r);
									$ghex = dechex($g);
									$bhex = dechex($b);?>
									<tr bgcolor = "#<?php 
									if ($r < 16){ 
										echo "0".$rhex."0".$ghex."0".$bhex;
									}
									else echo $rhex.$ghex.$bhex;
									?>">
								<?php } 
										echo "<td>строка $i </td>";
							 } ?>
						</table>
				<?php } ?>					
			</div>

		</div>
	</section> 

	<!--Footer-->
	<footer>
			<p>&#169; 2021 <a href="https://www.instagram.com/r.a.k.u.sh.k.a/">ELIZAVETA ZAITSEVA</a></p>
		</footer>

</body>
</html>