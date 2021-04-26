<?php
$pieHTML = '<footer id="contacto">
<div class="pie1">
     <h3>STARGYM DONOSTI</h3>
     <p>
          Area kalea 27, bajos C <br />
          24200 DONOSTIA
     </p>
     <p>Teléfono: 943 00 00 00</p>
     <p>e-mail: donostia@stargym.com</p>
</div>
<div class="pie2">
     <h2>Contacta con nosotros</h2>
     <form class="miform">
          <input id="nom" type="text" placeholder="Nombre" required />
          <input id="ape" type="text" placeholder="Apellido" required />
          <textarea id="msg-1" placeholder="Message"></textarea>

          <button type="button" data-size="sm" data-filled="empty">Enviar</button>
     </form>
</div>
</footer>';
echo $pieHTML;
?>