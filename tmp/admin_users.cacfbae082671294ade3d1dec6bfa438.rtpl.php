<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>


<script type="text/javascript">
   $(document).ready(function() {
      $("#b_nuevo_usuario, #b_nuevo_usuario2").click(function(event) {
         event.preventDefault();
         fs_show_popup('popup_nuevo_usuario');
         document.f_nuevo_usuario.nnick.focus();
      });
   });
</script>

<div class="popup" id="popup_nuevo_usuario">
   <h1>Nuevo usuario</h1>
   <form name="f_nuevo_usuario" action="<?php echo $fsc->page->url();?>" method="POST">
      <table>
         <tr>
            <td align="right">Nick:</td>
            <td><input type="text" name="nnick"  size="12" maxlength="12" autocomplete="off"/></td>
         </tr>
         <tr>
            <td align="right">Contraseña:</td>
            <td><input type="password" name="npassword"  size="12" maxlength="12"/></td>
         </tr>
         <tr>
            <td align="right"><a class="link" href="<?php echo $fsc->agente->url();?>">Agente</a>:</td>
            <td>
               <select name="ncodagente">
                  <option value="">- ninguno -</option>
                  <option value="">-----------</option>
                  <?php $loop_var1=$fsc->agente->all(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

                  <option value="<?php echo $value1->codagente;?>"><?php echo $value1->get_fullname();?></option>
                  <?php } ?>

               </select>
            </td>
         </tr>
         <tr>
            <td align="right"><input type="checkbox" name="nadmin" value="TRUE" id="usuario_admin"/></td>
            <td><label for="usuario_admin">Administrador</label></td>
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
         <th align="left">nick</th>
         <th align="left">agente</th>
         <th>administrador</th>
         <th>IP</th>
         <th align="left">Página de inicio</th>
         <th>Ejercicio</th>
         <th align="right">último login</th>
      </tr>
      <?php $loop_var1=$fsc->user->all(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

      <tr>
         <td><a class="link" href="<?php echo $value1->url();?>"><?php echo $value1->nick;?></a></td>
         <td><?php echo $value1->get_agente_fullname();?></td>
         <td align="center"><?php if( $value1->admin ){ ?>Si<?php }else{ ?>-<?php } ?></td>
         <td align="center"><?php echo $value1->last_ip;?></td>
         <td><?php echo $value1->fs_page;?></td>
         <td align="center"><?php echo $value1->codejercicio;?></td>
         <td align="right"><?php echo $value1->show_last_login();?></td>
      </tr>
      <?php } ?>

      <tr>
         <td colspan="7">
            <div class="new_line">
               <a id="b_nuevo_usuario2" href="#">Nuevo usuario</a>
            </div>
         </td>
      </tr>
   </table>
</div>

<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>