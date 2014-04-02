<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>


<div class="rounded">
   <table class="list">
      <tr>
         <th align="left">Código</th>
         <th>Naturalez</th>
         <th>Nivel 1</th>
         <th align="left">Descripción 1</th>
      </tr>
      <?php $loop_var1=$fsc->balance->all(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

      <tr>
         <td><a class="link" href="<?php echo $value1->url();?>"><?php echo $value1->codbalance;?></a></td>
         <td align="center"><?php echo $value1->naturaleza;?></td>
         <td align="center"><?php echo $value1->nivel1;?></td>
         <td><?php echo $value1->descripcion1;?></td>
      </tr>
      <?php }else{ ?>

      <tr>
         <td colspan="4">No hay datos.</td>
      </tr>
      <?php } ?>

   </table>
</div>

<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>