<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>


<?php if( $fsc->ejercicio ){ ?>


<script type="text/javascript">
   function cerrar_ejercicio()
   {
      location.href = '<?php echo $fsc->url();?>&cerrar=TRUE&petid=<?php echo $fsc->random_string();?>';
   }
   $(document).ready(function() {
      <?php if( $fsc->importar_url ){ ?>setTimeout("location.href = '<?php echo $fsc->importar_url;?>';", 2000);<?php } ?>

      $("#b_importar").click(function(event) {
         event.preventDefault();
         fs_show_popup('popup_importar');
      });
      $("#b_eliminar").click(function(event) {
         event.preventDefault();
         if( confirm("¿Realmente desea eliminar este ejercicio?") )
            window.location.href = '<?php echo $fsc->ppage->url();?>&delete=<?php echo $fsc->ejercicio->codejercicio;?>';
      });
   });
</script>

<div class="popup" id="popup_importar">
   <h1>Importar datos del ejercicio</h1>
   <form enctype='multipart/form-data' action="<?php echo $fsc->url();?>" method="post">
      <input name='archivo' type='hidden' value='TRUE'/>
      Se importarán balances, grupos, epígrafes, cuentas, cuentas especiales y subcuentas
      desde...
      <br/><br/>
      <table width="100%">
         <tr>
            <td>
               <input type="radio" id="rb_archivo" name="fuente" value="archivo"/>
               <label for="rb_archivo">Un archivo externo:</label>
               <input name='farchivo' type='file'/>
            </td>
         </tr>
         <tr>
            <td align="right">
               <input class="submit" type="submit" value="importar" onclick="this.disabled=true;this.form.submit();"/>
            </td>
         </tr>
      </table>
   </form>
</div>

<div class="rounded">
   <form action="<?php echo $fsc->url();?>" method="post">
      <input type="hidden" name="codejercicio" value="<?php echo $fsc->ejercicio->codejercicio;?>"/>
      <table class="list">
         <tr>
            <th align="left">Nombre</th>
            <th align="left">Fecha inicio</th>
            <th align="left">Fecha fin</th>
            <th align="left">Longitud subcuenta</th>
            <th align="left">Estado</th>
            <td align="right">
               <input class="submit" type="submit" value="guardar" onclick="this.disabled=true;this.form.submit();"/>
            </td>
         </tr>
         <tr>
            <td><input type="text" name="nombre" value="<?php echo $fsc->ejercicio->nombre;?>" autocomplete="off"/></td>
            <td><input class="tcal" type="text" name="fechainicio" value="<?php echo $fsc->ejercicio->fechainicio;?>" size="10"/></td>
            <td><input class="tcal" type="text" name="fechafin" value="<?php echo $fsc->ejercicio->fechafin;?>" size="10"/></td>
            <td>
               <input type="text" name="longsubcuenta" value="<?php echo $fsc->ejercicio->longsubcuenta;?>" size="2" autocomplete="off"/>
            </td>
            <td>
               <select name="estado">
               <?php if( $fsc->ejercicio->abierto() ){ ?>

                  <option value="ABIERTO" selected="selected">ABIERTO</option>
                  <option value="CERRADO">CERRADO</option>
               <?php }else{ ?>

                  <option value="ABIERTO">ABIERTO</option>
                  <option value="CERRADO" selected="selected">CERRADO</option>
               <?php } ?>

               </select>
               <?php if( $fsc->ejercicio->abierto() ){ ?>

               <input class="button" type="button" value="cerrar ejercicio" onclick="cerrar_ejercicio()"/>
               <?php } ?>

            </td>
         </tr>
      </table>
      <?php if( $fsc->asiento_apertura_url ){ ?>

         <div class="bloque"><a class="link" href="<?php echo $fsc->asiento_apertura_url;?>">Asiento de apertura</a></div>
      <?php } ?>

      <?php if( $fsc->asiento_cierre_url ){ ?>

         <div class="bloque"><a class="link" href="<?php echo $fsc->asiento_cierre_url;?>">Asiento de cierre</a></div>
      <?php } ?>

      <?php if( $fsc->asiento_pyg_url ){ ?>

         <div class="bloque"><a class="link" href="<?php echo $fsc->asiento_pyg_url;?>">Asiento de pérdidas y ganancias</a></div>
      <?php } ?>

   </form>
</div>

<div class="rounded">
   <?php if( $fsc->listar=='grupos' ){ ?>

   <div class="select">
      <a href="<?php echo $fsc->url();?>&listar=grupos" class="selected">Grupos</a>
      <a href="<?php echo $fsc->url();?>&listar=cuentas">Cuentas</a>
      <a href="<?php echo $fsc->url();?>&listar=subcuentas">Subcuentas</a>
   </div>
   <br/><br/>
   <table class="list">
      <tr>
         <th align="left">Código</th>
         <th align="left">Descripción</th>
      </tr>
      <?php $loop_var1=$fsc->listado; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

      <tr>
         <td><a class="link" href="<?php echo $value1->url();?>"><?php echo $value1->codgrupo;?></a></td>
         <td><a class="link" href="<?php echo $value1->url();?>"><?php echo $value1->descripcion;?></a></td>
      </tr>
      <?php }else{ ?>

      <tr>
         <td colspan="2">
            Sin resultados. Debes importar los datos del ejercicio, pulsa el botón <b>importar</b>.
         </td>
      </tr>
      <?php } ?>

   </table>
   <?php } ?>

   
   <?php if( $fsc->listar=='epigrafes' ){ ?>

   <div class="select">
      <a href="<?php echo $fsc->url();?>&listar=grupos">Grupos</a>
    
      <a href="<?php echo $fsc->url();?>&listar=cuentas">Cuentas</a>
      <a href="<?php echo $fsc->url();?>&listar=subcuentas">Subcuentas</a>
   </div>
   <br/><br/>
   <table class="list">
      <tr>
         <th align="left">Grupo</th>
         <th align="left">Código</th>
         <th align="left">Descripción</th>
      </tr>
      <?php $loop_var1=$fsc->listado; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

      <tr>
         <td><?php echo $value1->codgrupo;?></td>
         <td><a class="link" href="<?php echo $value1->url();?>"><?php echo $value1->codepigrafe;?></a></td>
         <td><a class="link" href="<?php echo $value1->url();?>"><?php echo $value1->descripcion;?></a></td>
      </tr>
      <?php }else{ ?>

      <tr>
         <td colspan="3">
            Sin resultados. Debes importar los datos del ejercicio, pulsa el botón <b>importar</b>.
         </td>
      </tr>
      <?php } ?>

   </table>
   <?php } ?>

   
   <?php if( $fsc->listar=='cuentas' ){ ?>

   <div class="select">
      <a href="<?php echo $fsc->url();?>&listar=grupos">Grupos</a>
      
      <a href="<?php echo $fsc->url();?>&listar=cuentas" class="selected">Cuentas</a>
      <a href="<?php echo $fsc->url();?>&listar=subcuentas">Subcuentas</a>
   </div>
   <br/><br/>
   <table class="list">
      <tr>
        
         <th align="left">Código</th>
         <th align="left">Descripción</th>
      </tr>
      <?php $loop_var1=$fsc->listado; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

      <tr>
         <td><?php echo $value1->codepigrafe;?></td>
         <td><a class="link" href="<?php echo $value1->url();?>"><?php echo $value1->codcuenta;?></a></td>
         <td><a class="link" href="<?php echo $value1->url();?>"><?php echo $value1->descripcion;?></a></td>
      </tr>
      <?php }else{ ?>

      <tr>
         <td colspan="3">
            Sin resultados. Debes importar los datos del ejercicio, pulsa el botón <b>importar</b>.
         </td>
      </tr>
      <?php } ?>

   </table>
   <?php } ?>

   
   <?php if( $fsc->listar=='subcuentas' ){ ?>

   <div class="select">
      <a href="<?php echo $fsc->url();?>&listar=grupos">Grupos</a>

      <a href="<?php echo $fsc->url();?>&listar=cuentas">Cuentas</a>
      <a href="<?php echo $fsc->url();?>&listar=subcuentas" class="selected">Subcuentas</a>
   </div>
   <br/><br/>
   <table class="list">
      <tr>
         <th align="left">Cuenta</th>
         <th align="left">Código</th>
         <th align="left">Descripción</th>
         <th align="right">Saldo</th>
      </tr>
      <?php $loop_var1=$fsc->listado; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

      <tr>
         <td><?php echo $value1->codcuenta;?></td>
         <td><a class="link" href="<?php echo $value1->url();?>"><?php echo $value1->codsubcuenta;?></a></td>
         <td><a class="link" href="<?php echo $value1->url();?>"><?php echo $value1->descripcion;?></a></td>
         <td align="right"><?php echo $fsc->show_precio($value1->saldo, $value1->coddivisa);?></td>
      </tr>
      <?php }else{ ?>

      <tr>
         <td colspan="4">
            Sin resultados. Debes importar los datos del ejercicio, pulsa el botón <b>importar</b>.
         </td>
      </tr>
      <?php } ?>

   </table>
   <?php } ?>

</div>
<?php }else{ ?>

<div class="rounded" style="text-align: center;">
   <img src="view/img/fuuu_face.png" alt="fuuuuu"/>
</div>
<?php } ?>


<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>