<?php if(!class_exists('raintpl')){exit;}?>   <?php if( $db_history ){ ?>

      <div id="sql_history">
         <h1>Consultas SQL:</h1>
         <ol>
         <?php $loop_var1=$fsc->get_db_history(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?><li><?php echo $value1;?></li><?php } ?>

         </ol>
      </div>
   <?php } ?>

   </div>
  
   <div class="footer">
      <table>
         <tr>
            <td class="left">
               CSS:
               <?php if( $fsc->css_file=='base.css' ){ ?>

                  <a class="selected" href="<?php echo $fsc->url();?>&css_file=base.css">normal</a>
                  <a href="<?php echo $fsc->url();?>&css_file=touch.css">touch</a>
               <?php }else{ ?>

                  <a href="<?php echo $fsc->url();?>&css_file=base.css">normal</a>
                  <a class="selected" href="<?php echo $fsc->url();?>&css_file=touch.css">touch</a>
               <?php } ?>

            </td>
          
         </tr>
      </table>
   </div>
</body>
</html>
