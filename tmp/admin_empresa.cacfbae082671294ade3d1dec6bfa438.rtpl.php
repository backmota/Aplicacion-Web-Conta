<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>


<script type="text/javascript">
   $(document).ready(function() {
      $("#b_mail_options").click(function(event) {
         event.preventDefault();
         fs_show_popup('popup_mail_options');
         document.f_empresa.mail_host.select();
      });
      $("#b_add_logo").click(function(event) {
         fs_show_popup('popup_logo');
      });
   });
</script>

<form name="f_empresa" action="<?php echo $fsc->page->url();?>" method="POST">
   <div class="rounded">
      <h1>
         Datos generales:
         <span>
            <input class="submit" type="submit" value="guardar" onclick="this.disabled=true;this.form.submit();"/>
         </span>
      </h1>
      <div class="bloque">
         Nombre:
         <input type="text" name="nombre" size="60" value="<?php echo $fsc->empresa->nombre;?>" autocomplete="off"/>
      </div>
      <div class="bloque">
         RFC:
         <input type="text" name="cifnif" size="12" value="<?php echo $fsc->empresa->cifnif;?>" autocomplete="off"/>
      </div>
      <div class="bloque">
         administrador:
         <input type="text" name="administrador" size="60" value="<?php echo $fsc->empresa->administrador;?>" autocomplete="off"/>
      </div>
      <br/>
      <div class="bloque">
         <a class="link" href="<?php echo $fsc->pais->url();?>">País</a>:
         <select name="codpais">
         <?php $loop_var1=$fsc->pais->all(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

            <?php if( $fsc->empresa->codpais == $value1->codpais ){ ?>

               <option value="<?php echo $value1->codpais;?>" selected="selected"><?php echo $value1->nombre;?></option>
            <?php }else{ ?>

               <option value="<?php echo $value1->codpais;?>"><?php echo $value1->nombre;?></option>
            <?php } ?>

         <?php } ?>

         </select>
      </div>
      <div class="bloque">
         provincia:
         <input type="text" name="provincia" size="20" value="<?php echo $fsc->empresa->provincia;?>" autocomplete="off"/>
      </div>
      <div class="bloque">
         ciudad:
         <input type="text" name="ciudad" size="20" value="<?php echo $fsc->empresa->ciudad;?>" autocomplete="off"/>
      </div>
      <div class="bloque">
         dirección:
         <input type="text" name="direccion" size="60" value="<?php echo $fsc->empresa->direccion;?>" autocomplete="off"/>
      </div>
      <div class="bloque">
         código postal:
         <input type="text" name="codpostal" size="6" value="<?php echo $fsc->empresa->codpostal;?>" autocomplete="off"/>
      </div>
      <br/>
      <div class="bloque">
         Teléfono:
         <input type="text" name="telefono" size="12" value="<?php echo $fsc->empresa->telefono;?>" autocomplete="off"/>
      </div>
      <div class="bloque">
         fax:
         <input type="text" name="fax" size="12" value="<?php echo $fsc->empresa->fax;?>" autocomplete="off"/>
      </div>
      <div class="bloque">
         Web:
         <input type="text" name="web" size="50" value="<?php echo $fsc->empresa->web;?>" autocomplete="off"/>
      </div>
      <br/>
      <div class="bloque">
         <?php if( $fsc->empresa->contintegrada ){ ?>

            <input type="checkbox" name="contintegrada" id="contintegrada" value="TRUE" checked="checked"/>
         <?php }else{ ?>

            <input type="checkbox" name="contintegrada" id="contintegrada" value="TRUE"/>
         <?php } ?>

         <label for="contintegrada">Contabilidad integrada</label>
      </div>
      <div class="bloque">
         <a class="link" href="<?php echo $fsc->ejercicio->url();?>">Ejercicio</a>:
         <select name="codejercicio">
         <?php $loop_var1=$fsc->ejercicio->all(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

            <?php if( $fsc->empresa->codejercicio == $value1->codejercicio ){ ?>

               <option value="<?php echo $value1->codejercicio;?>" selected="selected"><?php echo $value1->nombre;?></option>
            <?php }else{ ?>

               <option value="<?php echo $value1->codejercicio;?>"><?php echo $value1->nombre;?></option>
            <?php } ?>

         <?php } ?>

         </select>
      </div>
      <div class="bloque">
         <a class="link" href="<?php echo $fsc->serie->url();?>">Serie</a>:
         <select name="codserie">
         <?php $loop_var1=$fsc->serie->all(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

            <?php if( $fsc->empresa->codserie == $value1->codserie ){ ?>

               <option value="<?php echo $value1->codserie;?>" selected="selected"><?php echo $value1->descripcion;?></option>
            <?php }else{ ?>

               <option value="<?php echo $value1->codserie;?>"><?php echo $value1->descripcion;?></option>
            <?php } ?>

         <?php } ?>

         </select>
      </div>
      <div class="bloque">
         Forma de pago:
         <select name="codpago">
         <?php $loop_var1=$fsc->forma_pago->all(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

            <?php if( $fsc->empresa->codpago == $value1->codpago ){ ?>

               <option value="<?php echo $value1->codpago;?>" selected="selected"><?php echo $value1->descripcion;?></option>
            <?php }else{ ?>

               <option value="<?php echo $value1->codpago;?>"><?php echo $value1->descripcion;?></option>
            <?php } ?>

         <?php } ?>

         </select>
      </div>
      <div class="bloque">
         Divisa:
         <select name="coddivisa">
         <?php $loop_var1=$fsc->divisa->all(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

            <?php if( $fsc->empresa->coddivisa == $value1->coddivisa ){ ?>

               <option value="<?php echo $value1->coddivisa;?>" selected="selected"><?php echo $value1->descripcion;?></option>
            <?php }else{ ?>

               <option value="<?php echo $value1->coddivisa;?>"><?php echo $value1->descripcion;?></option>
            <?php } ?>

         <?php } ?>

         </select>
      </div>
      <div class="bloque">
         <a class="link" href="<?php echo $fsc->almacen->url();?>">Almacén</a>:
         <select name="codalmacen">
         <?php $loop_var1=$fsc->almacen->all(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

            <?php if( $fsc->empresa->codalmacen == $value1->codalmacen ){ ?>

               <option value="<?php echo $value1->codalmacen;?>" selected="selected"><?php echo $value1->nombre;?></option>
            <?php }else{ ?>

               <option value="<?php echo $value1->codalmacen;?>"><?php echo $value1->nombre;?></option>
            <?php } ?>

         <?php } ?>

         </select>
      </div>
   </div>
   
   <div class="rounded">
      <h1>Email:</h1>
      <div>
         Email:
         <input type="text" name="email" size="30" value="<?php echo $fsc->empresa->email;?>" autocomplete="off"/>
         <input type="password" name="email_password" size="20" value="<?php echo $fsc->empresa->email_password;?>" placeholder="contraseña"/>
         Si no usas Gmail o Google Apps, haz clic <a id="b_mail_options" class="link" href="#">aquí</a>.
      </div>
      <div>
         <br/>Firma:<br/>
         <textarea name="email_firma"><?php echo $fsc->empresa->email_firma;?></textarea>
      </div>
   </div>
   
   <div class="popup" id="popup_mail_options">
      <h1>Opciones de email</h1>
      <table>
         <tr>
            <td align="right"><b>Host:</b></td>
            <td><input type="text" name="mail_host" size="30" value="<?php echo $fsc->mail['mail_host'];?>" autocomplete="off"/></td>
         </tr>
         <tr>
            <td align="right"><b>Puerto:</b></td>
            <td><input type="text" name="mail_port" size="30" value="<?php echo $fsc->mail['mail_port'];?>" autocomplete="off"/></td>
         </tr>
         <tr>
            <td align="right"><b>Encriptación (ssl ó tls):</b></td>
            <td><input type="text" name="mail_enc" size="30" value="<?php echo $fsc->mail['mail_enc'];?>" autocomplete="off"/></td>
         </tr>
         <tr>
            <td align="right"><b>Usuario:</b></td>
            <td><input type="text" name="mail_user" size="30" value="<?php echo $fsc->mail['mail_user'];?>" autocomplete="off"/></td>
         </tr>
         <tr>
            <td colspan="2" align="right">
               <input class="submit" type="submit" value="guardar" onclick="this.disabled=true;this.form.submit();"/>
            </td>
         </tr>
      </table>
   </div>
   
   <div class="rounded">
      <h1>Facturas:</h1>
      <div class="bloque">
         <a id="b_add_logo" class="button" href="#">Añadir logotipo</a>
      </div>
      <div class="bloque">
         Pie de página:
         <input type="text" name="pie_factura" size="80" maxlength="255" value="<?php echo $fsc->empresa->pie_factura;?>" autocomplete="off"/>
      </div>
   </div>
   
   <div class="rounded">
      <h1>Tickets:</h1>
      <div class="bloque">
         Lema:
         <input type="text" name="lema" size="30" maxlength="50" value="<?php echo $fsc->empresa->lema;?>" autocomplete="off"/>
      </div>
      <div class="bloque">
         Horario:
         <input type="text" name="horario" size="50" maxlength="100" value="<?php echo $fsc->empresa->horario;?>" autocomplete="off"/>
      </div>
   </div>
</form>

<div class="popup" id="popup_logo">
   <h1>Logotipo para las facturas</h1>
   <form enctype='multipart/form-data' action="<?php echo $fsc->url();?>" method="post">
      <input name='logo' type='hidden' value='TRUE'/>
      <table>
         <tr>
            <td colspan="2" align="center">
               <?php if( $fsc->logo ){ ?>

               <img src="tmp/logo.png" alt="logotipo"/>
               <?php }else{ ?>

               No hay ningún logotipo
               <?php } ?>

            </td>
         </tr>
         <tr>
            <td align="right">
               <input name='fimagen' type='file'/>
            </td>
            <td align="left">
               La imagen debe estar en formato PNG.
            </td>
         </tr>
         <tr><td colspan="2"><br/></td></tr>
         <tr>
            <td>
               <a class="delete" href="<?php echo $fsc->url();?>&delete_logo=TRUE">Eliminar</a>
            </td>
            <td align="right">
               <input class="submit" type="submit" value="guardar"/>
            </td>
         </tr>
      </table>
   </form>
</div>

<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>