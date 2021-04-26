<?php
$menuHTML = '	<div class="menu_bar">
<a href="#" class="bt-menu">
     <img src="imagenes/menuclassic.png" width="50px">
</a>
</div>	
<nav id="topnav" class="menu-vip navincial">
<ul id="main_nav">
          <li class="sin"><a class="smoothScroll" href="index.php">Home</a></li>
          <li class="sin"><a  class="smoothScroll" href="nosotros.php">Nosotros</a></li>
          <li class="submenu"><a class="smoothScroll" href="#">Actividades</a>
               <ul class="children">
               <li><a href="pilates.php">Pilates</a></li>
               <li><a href="vibrofitness.php">Vibrofitness</a></li>
               <li><a href="kickboxing.php">Kickboxing</a></li>
               <li><a href="fitexp.php">Fitness Express</a></li>
               </ul>
          </li>
          <li class="submenu"><a class="smoothScroll" href="#">Servicios</a>
               <ul class="children">
               <li><a href="servicios.php#adel">Adelgazamiento</a></li>
               <li><a href="servicios.php#fisio">Fisioestética</a></li>
               </ul>
          </li>
          <li class="sin"><a class="smoothScroll" href="#contacto">Contacto</a></li>
     </ul>
</nav>';
echo $menuHTML;
?>