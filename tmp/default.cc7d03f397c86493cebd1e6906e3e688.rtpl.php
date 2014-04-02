<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>CONTAD -ITO</title>
   <meta name="description" content="Facturación y contabilidad fácil, libre y con actualizaciones constantes.
         Es software libre bajo licencia GNU/AGPL." />
   <meta name="keywords" content="facturascripts, facturación, contabilidad, abanq, eneboo, facturalux, facturaplus"/>
   <link rel="shortcut icon" href="view/img/favicon.ico" />
   <link rel="stylesheet" type="text/css" href="view/login/login.css" />
   <script type="text/javascript" src="view/js/jquery.js"></script>
   <script type="text/javascript">
<?php if( $demo ){ ?>

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-417932-8']);
      _gaq.push(['_trackPageview']);
      (function() {
         var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
         ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
         var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
<?php } ?>

      $(document).ready(function() {
         <?php if( $demo ){ ?>

         document.f_login.user.focus();
         <?php }else{ ?>

         document.f_login.password.focus();
         <?php } ?>

         <?php if( !$demo ){ ?>

         $("#b_new_password").click(function() {
            $("#popup_new_password").show();
         });
         <?php } ?>

         $("#b_feedback").click(function() {
            $("#b_feedback").hide();
            $("#popup_feedback").show();
            document.feedback.feedback_text.focus();
         });
         $("#b_sql").click(function() {
            $("#b_sql").hide();
            $("#popup_sql").show();
         });
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

   
   <div class="header">
      <h1>CONTAD - ITO</h1>
      
      <?php if( $nlogin ){ ?>

         <h2>¡Hola <?php echo $nlogin;?>! Bienvenido </h2>
         Si no eres <?php echo $nlogin;?> ignora este saludo.
      <?php }else{ ?>

         <h2>¡Hola! Bienvenido </h2>
      <?php } ?>

      
      <br/>
      
      <div class="popup">
         <?php if( $demo ){ ?>

            <div style="text-align: center;">Escribe tu nombre y entra.</div>
            <br/>
            <form name="f_login" action="index.php?nlogin=<?php echo $nlogin;?>" method="post">
               <input type="text" class="full" name="user" maxlength="12" placeholder="Escribe tu nombre" autocomplete="off"/>
               <input type="hidden" name="password" value="demo"/>
               <br/>
               <input type="submit" class="full" value="entrar"/>
            </form>
         <?php }else{ ?>

            <form name="f_login" action="index.php?nlogin=<?php echo $nlogin;?>" method="post">
               <select name="user" onchange="document.f_login.password.focus()">
               <?php $loop_var1=$fsc->user->all(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

                  <?php if( $value1->nick == $nlogin ){ ?>

                  <option value="<?php echo $value1->nick;?>" selected><?php echo $value1->nick;?></option>
                  <?php }else{ ?>

                  <option value="<?php echo $value1->nick;?>"><?php echo $value1->nick;?></option>
                  <?php } ?>

               <?php } ?>

               </select>
               <input type="password" name="password" maxlength="20" placeholder="contraseña"/>
               <a id="b_new_password" class="link" href="#new_password">¿Has olvidado la contraseña?</a>
               <br/><br/>
               <input type="submit" class="full" value="entrar"/>
            </form>
         <?php } ?>

      </div>
      
     
   </div>
   
   
   <?php if( !$demo ){ ?>

   <a name="new_password"></a>
   <div class="popup" id="popup_new_password" style="display: none;">
      <h1>¿Has olvidado la contraseña?</h1>
      <form action="index.php" method="post">
         <select name="user" onchange="document.f_login.password.focus()">
            <?php $loop_var1=$fsc->user->all(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

               <?php if( $value1->nick == $nlogin ){ ?>

               <option value="<?php echo $value1->nick;?>" selected><?php echo $value1->nick;?></option>
               <?php }else{ ?>

               <option value="<?php echo $value1->nick;?>"><?php echo $value1->nick;?></option>
               <?php } ?>

            <?php } ?>

         </select>
         <input type="password" name="new_password" maxlength="20" placeholder="nueva contraseña"/>
         <input type="password" name="new_password2" maxlength="20" placeholder="repite la nueva contraseña"/>
         <input type="password" name="db_password" maxlength="20" placeholder="contraseña de la base de datos"/>
         <br/>
         <input type="submit" class="full" value="cambiar"/>
      </form>
   </div>
   <br/>
   <?php } ?>

   
   <a name="feedback"></a>
   <?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("feedback") . ( substr("feedback",-1,1) != "/" ? "/" : "" ) . basename("feedback") );?>

   <br/>
   
   <?php if( $db_history ){ ?>

   <a name="sql"></a>
   <div class="popup" id="popup_sql" style="display: none;">
      <h1>Consultas SQL:</h1>
      <ol><?php $loop_var1=$fsc->get_db_history(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?><li><?php echo $value1;?></li><?php } ?></ol>
   </div>
   <?php } ?>

</body>
</html>