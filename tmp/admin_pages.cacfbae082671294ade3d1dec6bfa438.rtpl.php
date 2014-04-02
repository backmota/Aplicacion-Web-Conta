<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>


<script type="text/javascript">
   function fs_marcar_todo()
   {
      $('#f_enable_pages input:checkbox').attr('checked', true);
   }
   function fs_marcar_nada()
   {
      $('#f_enable_pages input:checkbox').attr('checked', false);
   }
</script>

<div class="rounded">
   <form id="f_enable_pages" action="<?php echo $fsc->url();?>" method="post">
      <input type="hidden" name="modpages" value="TRUE"/>
      <div>
         <input class="button" type="button" value="todo" onclick="fs_marcar_todo()"/>
         <input class="button" type="button" value="nada" onclick="fs_marcar_nada()"/>
         <input class="submit pull_right" type="submit" value="Guardar" onclick="this.disabled=true;this.form.submit();"/>
      </div>
      <br/>
      
      <table class="list">
         <tr>
            <th align="left">página</th>
            <th align="left">carpeta</th>
            <th align="left">titulo</th>
            <th align="left">versión</th>
            <th>en menú</th>
            <th>importante</th>
            <th>existe</th>
         </tr>
         <?php $loop_var1=$fsc->paginas; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

         <tr>
            <?php if( $value1->exists ){ ?>

            <td>
            <?php }else{ ?>

            <td class="locked">
            <?php } ?>

               <?php if( $value1->enabled ){ ?>

               <input type="checkbox" name="enabled[]" value="<?php echo $value1->name;?>" checked="checked"/>
               <?php }else{ ?>

               <input type="checkbox" name="enabled[]" value="<?php echo $value1->name;?>"/>
               <?php } ?>

               <a class="link" target="_blank" href="<?php echo $value1->url();?>"><?php echo $value1->name;?></a>
            </td>
            <td><?php echo $value1->folder;?></td>
            <td><?php echo $value1->title;?></td>
            <td><?php echo $value1->version;?></td>
            <td align="center"><?php if( $value1->show_on_menu ){ ?>Si<?php }else{ ?>-<?php } ?></td>
            <td align="center"><?php if( $value1->important ){ ?>Si<?php }else{ ?>-<?php } ?></td>
            <td align="center"><?php if( $value1->exists ){ ?>Si<?php }else{ ?>-<?php } ?></td>
         </tr>
         <?php } ?>

      </table>
      
      <br/>
      <div>
         <input class="button" type="button" value="todo" onclick="fs_marcar_todo()"/>
         <input class="button" type="button" value="nada" onclick="fs_marcar_nada()"/>
         <input class="submit pull_right" type="submit" value="Guardar" onclick="this.disabled=true;this.form.submit();"/>
      </div>
   </form>
</div>

<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>