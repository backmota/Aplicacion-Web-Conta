<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>


<div class="rounded">
   <table class="list">
      <tr>
         <th><b>FacturaScripts</b></th>
         <th><b>PHP</b></th>
         <th><b>Base de datos</b></th>
         <th><b>Motor de base de datos</b></th>
         <th><b>Memcache</b></th>
      </tr>
      <tr>
         <td align="center"><?php echo $fsc->version();?></td>
         <td align="center"><?php echo $fsc->php_version();?></td>
         <td align="center"><?php echo $fsc->fs_db_name();?></td>
         <td align="center"><?php echo $fsc->fs_db_version();?></td>
         <td align="center"><?php echo $fsc->cache_version();?></td>
      </tr>
   </table>
</div>

<div class="rounded">
   <table class="list">
      <tr>
         <td align="right"><b>Sistema Operativo:</b></td>
         <td><?php echo $fsc->uname();?></td>
      </tr>
      <?php if( $fsc->linux() ){ ?>

      <tr>
         <td align="right"><b>Uptime:</b></td>
         <td><?php echo $fsc->sys_uptime();?></td>
      </tr>
      <tr>
         <td align="right"><b>Memoria:</b></td>
         <td><pre><?php echo $fsc->sys_free();?></pre></td>
      </tr>
      <tr>
         <td align="right"><b>Disco duro:</b></td>
         <td><pre><?php echo $fsc->sys_df();?></pre></td>
      </tr>
      <?php } ?>

   </table>
</div>

<div class="rounded">
   <h1>Bloqueos en la base de datos:</h1>
   <table class="list">
      <tr>
         <th align="left">Base de datos</th>
         <th align="left">relname</th>
         <th align="left">relation</th>
         <th align="left">transaction ID</th>
         <th align="left">PID</th>
         <th align="left">modo</th>
         <th align="left">granted</th>
      </tr>
      <?php $loop_var1=$fsc->get_locks(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

      <tr>
         <td><?php echo $value1["database"];?></td>
         <td><?php echo $value1["relname"];?></td>
         <td><?php echo $value1["relation"];?></td>
         <td><?php echo $value1["transactionid"];?></td>
         <td><?php echo $value1["pid"];?></td>
         <td><?php echo $value1["mode"];?></td>
         <td><?php echo $value1["granted"];?></td>
      </tr>
      <?php }else{ ?>

      <tr>
         <td colspan="7">Ningún bloqueo detectado.</td>
      </tr>
      <?php } ?>

   </table>
</div>

<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>