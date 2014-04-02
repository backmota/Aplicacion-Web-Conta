<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>


<script type="text/javascript">
   $(document).ready(function() {
      $("#feedback_problem").click();
   });
</script>

<div class="rounded">
   <h1>Página no encontrada:</h1>
   <ul>
      <li>No se encuentra el controlador de esta página.</li>
      <li>Consulta con el administrador.</li>
      <li>
         Si crees que es un error de FacturaScripts, no dudes en notificármelo.
         <b>Haz clic en el botón de ayuda</b>, abajo a la derecha y <b>notifícame el error</b>.
      </li>
   </ul>
   <div style="text-align: center;">
      <img src="view/img/fuuu_face.png" alt="fuuuuu"/>
   </div>
</div>

<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>