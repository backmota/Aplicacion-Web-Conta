<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>


<script type="text/javascript">
   $(document).ready(function() {
      $("#b_nuevo_ejercicio").click(function(event) {
         event.preventDefault();
         fs_show_popup('popup_nuevo_ejercicio');
         document.f_nuevo_ejercicio.nombre.focus();
      });
   });
</script>

<div class="popup" id="popup_nuevo_ejercicio">
   <form name="f_nuevo_ejercicio" action="<?php echo $fsc->url();?>" method="post">
      <h1>Nuevo ejercicio</h1>
      <table>
         <tr>
            <td align="right">Código:</td>
            <td>
               <input type="text" name="codejercicio" value="<?php echo $fsc->ejercicio->get_new_codigo();?>" size="4" maxlength="4" autocomplete="off"/>
            </td>
         </tr>
         <tr>
            <td align="right">Nombre:</td>
            <td><input type="text" name="nombre" autocomplete="off"/></td>
         </tr>
         <tr>
            <td align="right">Fecha de inicio:</td>
            <td><input class="tcal" type="text" name="fechainicio" value="<?php echo $fsc->ejercicio->fechainicio;?>" size="12"/></td>
         </tr>
         <tr>
            <td align="right">Fecha fin:</td>
            <td><input class="tcal" type="text" name="fechafin" value="<?php echo $fsc->ejercicio->fechafin;?>" size="12"/></td>
         </tr>
         <tr>
            <td align="right">Estado:</td>
            <td>
               <select name="estado">
                  <option value="ABIERTO">ABIERTO</option>
                  <option value="CERRADO">CERRADO</option>
               </select>
            </td>
         </tr>
         <tr>
            <td colspan="2" align="right">
               <input class="submit" type="submit" value="guardar" onclick="this.disabled=true;this.form.submit();"/>
            </td>
         </tr>
      </table>
   </form>
</div>

<div class="rounded">
   <table class="list">
      <tr>
         <th align="left">Código + nombre</th>
         <th>Fecha de inicio</th>
         <th>Fecha fin</th>
         <th align="right">Estado</th>
      </tr>
      <?php $loop_var1=$fsc->ejercicio->all(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

      <tr>
         <td><a class="link" href="<?php echo $value1->url();?>"><?php echo $value1->codejercicio;?></a> <?php echo $value1->nombre;?></td>
         <td align="center"><?php echo $value1->fechainicio;?></td>
         <td align="center"><?php echo $value1->fechafin;?></td>
         <td align="right"><?php echo $value1->estado;?></td>
      </tr>
      <?php } ?>

   </table>
</div>

<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>