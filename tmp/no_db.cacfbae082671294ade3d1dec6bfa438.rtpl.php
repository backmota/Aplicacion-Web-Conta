<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <title>FacturaScripts</title>
      <meta name="description" content="FacturaScripts es un software libre bajo licencia GNU/AGPL." />
      <link rel="shortcut icon" href="view/img/favicon.ico" />
      <link rel="stylesheet" type="text/css" href="view/login/login.css" />
      <script type="text/javascript" src="view/js/jquery.js"></script>
      <script type="text/javascript">
         $(document).ready(function() {
            $("#popup_feedback").show();
            $("#feedback_problem").click();
            document.feedback.feedback_text.focus();
         });
      </script>
   </head>
   <body>
      <?php if( $fsc->get_errors() ){ ?>

         <div class="error">
            <ul><?php $loop_var1=$fsc->get_errors(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?><li><?php echo $value1;?></li><?php } ?></ul>
         </div>
      <?php } ?>

      <?php if( $fsc->get_messages() ){ ?>

         <div class="message">
            <ul><?php $loop_var1=$fsc->get_messages(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?><li><?php echo $value1;?></li><?php } ?></ul>
         </div>
      <?php } ?>

      
      <?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("feedback") . ( substr("feedback",-1,1) != "/" ? "/" : "" ) . basename("feedback") );?>

   </body>
</html>