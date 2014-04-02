<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>


<script type="text/javascript">
   $(document).ready(function() {
      $("#b_cuentas_especiales").click(function(event) {
         event.preventDefault();
         fs_show_popup('popup_cuentas_especiales');
      });
      $("#b_show_cuentas").click(function() {
         $("#resultados_subcuentas").hide();
         $("#resultados_cuentas").show('slow');
         $("#b_show_cuentas").addClass('selected');
         $("#b_show_subcuentas").removeClass('selected');
      });
      $("#b_show_subcuentas").click(function() {
         $("#resultados_cuentas").hide();
         $("#resultados_subcuentas").show('slow');
         $("#b_show_subcuentas").addClass('selected');
         $("#b_show_cuentas").removeClass('selected');
      });
      <?php if( $fsc->resultados ){ ?>

      $("#resultados_subcuentas").hide();
      <?php }else{ ?>

      $("#resultados_cuentas").hide();
      <?php } ?>

      document.f_custom_search.query.focus();
   });
</script>

<div class="popup" id="popup_cuentas_especiales">
   <h1>Cuentas especiales</h1>
   <table class="list">
      <tr>
         <th align="left" width="100">Código</th>
         <th align="left">Descripción</th>
      </tr>
      <?php $loop_var1=$fsc->cuentas_especiales; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

      <tr>
         <td><?php echo $value1->idcuentaesp;?></td>
         <td><?php echo $value1->descripcion;?></td>
      </tr>
      <?php }else{ ?>

      <tr>
         <td colspan="2">Sin resultados.</td>
      </tr>
      <?php } ?>

   </table>
</div>

<?php if( $fsc->query=='' ){ ?>

<div class="rounded">
   <table width="100%">
      <tr>
        
         <td align="right">
            <form name="f_filtro_cuentas" action="<?php echo $fsc->url();?>" method="post">
               <b>Ejercicio:</b>
               <select name="ejercicio" onchange="document.f_filtro_cuentas.submit()">
                  <?php $loop_var1=$fsc->ejercicio->all(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

                     <?php if( $value1->is_default() ){ ?>

                     <option value="<?php echo $value1->codejercicio;?>" selected="selected"><?php echo $value1->nombre;?> (<?php echo $value1->codejercicio;?>)</option>
                     <?php }else{ ?>

                     <option value="<?php echo $value1->codejercicio;?>"><?php echo $value1->nombre;?> (<?php echo $value1->codejercicio;?>)</option>
                     <?php } ?>

                  <?php } ?>

               </select>
            </form>
         </td>
      </tr>
   </table>
   <br/>
   <table class="list">
      <tr>
         <th align="left">Ejercicio</th>
         <th align="left">Código</th>
         <th align="left">Descripción</th>
      </tr>
      <?php $loop_var1=$fsc->resultados; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

      <tr>
         <td><?php echo $value1->codejercicio;?></td>
         <td><a class="link" href="<?php echo $value1->url();?>"><?php echo $value1->codcuenta;?></a></td>
         <td><a class="link" href="<?php echo $value1->url();?>"><?php echo $value1->descripcion;?></a></td>
      </tr>
      <?php }else{ ?>

      <tr><td colspan="3">Sin resultados.</td></tr>
      <?php } ?>

      <tr><td colspan="3">&nbsp;</td></tr>
      <tr>
         <td>
         <?php if( $fsc->anterior_url()!='' ){ ?>

         <a class="next" href="<?php echo $fsc->anterior_url();?>">anterior</a>
         <?php } ?>

         </td>
         <td></td>
         <td align="right">
         <?php if( $fsc->siguiente_url()!='' ){ ?>

         <a class="next" href="<?php echo $fsc->siguiente_url();?>">siguiente</a>
         <?php } ?>

         </td>
      </tr>
   </table>
</div>
<?php }else{ ?>

<div class="rounded">
   <div class="select">
      &nbsp; Resultados de la búsqueda '<?php echo $fsc->query;?>': &nbsp;
      <?php if( $fsc->resultados ){ ?>

      <a id="b_show_cuentas" href="#" class="selected">Cuentas</a>
      <a id="b_show_subcuentas" href="#">Subcuentas</a>
      <?php }else{ ?>

      <a id="b_show_cuentas" href="#">Cuentas</a>
      <a id="b_show_subcuentas" href="#" class="selected">Subcuentas</a>
      <?php } ?>

   </div>
   <br/><br/>
   <table class="list" id="resultados_cuentas">
      <tr>
         <th align="left">Ejercicio</th>
         <th align="left">Código</th>
         <th align="left">Descripción</th>
      </tr>
      <?php $loop_var1=$fsc->resultados; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

      <tr>
         <td><?php echo $value1->codejercicio;?></td>
         <td><a class="link" href="<?php echo $value1->url();?>"><?php echo $value1->codcuenta;?></a></td>
         <td><a class="link" href="<?php echo $value1->url();?>"><?php echo $value1->descripcion;?></a></td>
      </tr>
      <?php }else{ ?>

      <tr><td colspan="3">Sin resultados.</td></tr>
      <?php } ?>

      <tr><td colspan="3">&nbsp;</td></tr>
      <tr>
         <td>
         <?php if( $fsc->anterior_url()!='' ){ ?>

         <a class="next" href="<?php echo $fsc->anterior_url();?>">anterior</a>
         <?php } ?>

         </td>
         <td></td>
         <td align="right">
         <?php if( $fsc->siguiente_url()!='' ){ ?>

         <a class="next" href="<?php echo $fsc->siguiente_url();?>">siguiente</a>
         <?php } ?>

         </td>
      </tr>
   </table>
   <table class="list" id="resultados_subcuentas">
      <tr>
         <th align="left">Ejercicio</th>
         <th align="left">Código</th>
         <th align="left">Descripción</th>
         <th align="right">Debe</th>
         <th align="right">Haber</th>
         <th align="right">Saldo</th>
      </tr>
      <?php $loop_var1=$fsc->resultados2; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

      <tr>
         <td><?php echo $value1->codejercicio;?></td>
         <td><a class="link" href="<?php echo $value1->url();?>"><?php echo $value1->codsubcuenta;?></a></td>
         <td><a class="link" href="<?php echo $value1->url();?>"><?php echo $value1->descripcion;?></a></td>
         <td align="right"><?php echo $fsc->show_precio($value1->debe, $value1->coddivisa);?></td>
         <td align="right"><?php echo $fsc->show_precio($value1->haber, $value1->coddivisa);?></td>
         <td align="right"><?php echo $fsc->show_precio($value1->saldo, $value1->coddivisa);?></td>
      </tr>
      <?php }else{ ?>

      <tr><td colspan="6">Sin resultados.</td></tr>
      <?php } ?>

   </table>
</div>
<?php } ?>


<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>