<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>CONTAD-ITO</title>
   <meta name="description" content="FacturaScripts es un software de facturación
         y contabilidad para pymes. Es software libre bajo licencia GNU/AGPL." />
   <link rel="shortcut icon" href="view/img/favicon.ico" />
   <link rel="stylesheet" type="text/css" href="view/css/<?php echo $fsc->css_file;?>" />
   <script type="text/javascript" src="view/js/jquery.js"></script>
   <script type="text/javascript" src="view/js/tcal.js"></script>
   <script type="text/javascript" src="view/js/base.js"></script>
   <?php if( $demo ){ ?>

   <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-417932-8']);
      _gaq.push(['_trackPageview']);
      (function() {
         var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
         ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
         var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
   </script>
   <?php } ?>

   <script type="text/javascript">
      function show_precio(precio)
      {
         <?php if( $pos_divisa=='right' ){ ?>

         return number_format(precio, <?php echo $nf0;?>, '<?php echo $nf1;?>', '<?php echo $nf2;?>')+' <?php echo $fsc->simbolo_divisa();?>';
         <?php }else{ ?>

         return '<?php echo $fsc->simbolo_divisa();?>'+number_format(precio, <?php echo $nf0;?>, '<?php echo $nf1;?>', '<?php echo $nf2;?>');
         <?php } ?>

      }
      function show_numero(numero)
      {
         return number_format(precio, <?php echo $nf0;?>, '<?php echo $nf1;?>', '<?php echo $nf2;?>');
      }
   </script>
</head>
<body>
   <div class="header">
      <div class="header_box">
         <div id="header_folders">
         <?php $loop_var1=$fsc->folders(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

            <?php if( $value1==$fsc->page->folder ){ ?>

               <a href="#" id="b_folder_<?php echo $value1;?>" class="selected" onclick="fs_select_folder('<?php echo $value1;?>')"><?php echo $value1;?></a>
            <?php }else{ ?>

               <a href="#" id="b_folder_<?php echo $value1;?>" onclick="fs_select_folder('<?php echo $value1;?>')"><?php echo $value1;?></a>
            <?php } ?>

         <?php } ?>

         </div>
         <div id="header_logo">
            <H1>CONTAD-ITO</H1>
            </div>
         <div id="header_user">
            <a class="btn" href="#" id="b_user_list"><?php echo $fsc->user->nick;?></a>
            <a id="fs_exit" href="<?php echo $fsc->url();?>&logout=TRUE"><img src="view/img/logout.png" alt="salir" title="cerrar sesión"/></a>
         </div>
      </div>
   </div>
   
   <?php if( $fsc->get_errors() ){ ?>

   
   <?php } ?>

   <?php if( $fsc->get_messages() ){ ?>

   
   <?php } ?>

   <?php if( $fsc->get_advices() ){ ?>


   <?php } ?>

   
   <?php if( $fsc->page->name ){ ?>

   <div class="header2">
      <div class="header_box">
         <div id="header_buttons">
            <div id="header_location">
               <?php if( $fsc->is_admin_page() ){ ?>

               <img src="view/img/lock.png" alt="*" title="necesitas ser administrador para ver esta página"/>
               <?php } ?>

               <a href="<?php echo $fsc->url();?>"><img src="view/img/reload.png" alt="r" title="recargar la página"/></a>
               <?php if( $fsc->page->show_on_menu ){ ?>

                  <?php if( $fsc->page->is_default() ){ ?>

                  <a href="<?php echo $fsc->url();?>&amp;default_page=FALSE"><img src="view/img/star_on.png" alt="P" title="página predeterminada"/></a>
                  <?php }else{ ?>

                  <a href="<?php echo $fsc->url();?>&amp;default_page=TRUE"><img src="view/img/star_off.png" alt="p" title="marcar como página predeterminada"/></a>
                  <?php } ?>

               <?php } ?>

               &nbsp;
               <?php if( $fsc->ppage ){ ?><a class="link" href="<?php echo $fsc->ppage->url();?>"><?php echo $fsc->ppage->title;?></a> »<?php } ?>

               <?php echo $fsc->page->title;?>

            </div>
            <?php $loop_var1=$fsc->buttons; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?><?php echo $value1->HTML();?><?php } ?>

         </div>
         <div id="header_search">
            <?php if( $fsc->custom_search ){ ?>

            <form name="f_custom_search" action="<?php echo $fsc->url();?>" method="post">
               <input type="text" name="query" value="<?php echo $fsc->query;?>" size="20" autocomplete="off"/>
               <input type="image" src="view/img/zoom2.png" alt="buscar" onclick="this.disabled=true;this.form.submit();"/>
            </form>
            <?php } ?>

         </div>
      </div>
   </div>
   <?php } ?>

   <div class="pages">
      <?php $loop_var1=$fsc->folders(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

         <div id="folder_<?php echo $value1;?>">
            <img id="folder_<?php echo $value1;?>_img" src="view/img/flecha_submenu.png" alt="*"/>
            <ul>
            <?php $loop_var2=$fsc->pages($value1); $counter2=-1; if($loop_var2) foreach( $loop_var2 as $key2 => $value2 ){ $counter2++; ?>

               <?php if( $value2->showing() ){ ?>

                  <li class="selected"><a href="<?php echo $value2->url();?>"><?php echo $value2->title;?></a></li>
               <?php }else{ ?>

                  <li><a href="<?php echo $value2->url();?>"><?php echo $value2->title;?></a></li>
               <?php } ?>

            <?php } ?>

            </ul>
         </div>
      <?php } ?>

      <div id="user_list">
         <img id="user_list_img" src="view/img/flecha_submenu.png" alt="*"/>
         <ul>
            <li><a href="<?php echo $fsc->user->url();?>">Tus datos de usuario</a></li>
            <?php if( $fsc->user->codagente ){ ?>

            <li><a href="<?php echo $fsc->user->get_agente_url();?>">Tus datos de agente</a></li>
            <?php } ?>

            <?php if( !$demo ){ ?>

               <?php if( count($fsc->user->all())>1 ){ ?>

                  <li><hr/></li>
                  <?php $loop_var1=$fsc->user->all(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

                     <?php if( $value1->nick != $fsc->user->nick ){ ?>

                     <li><a href="index.php?logout=TRUE&amp;nlogin=<?php echo $value1->nick;?>"><?php echo $value1->nick;?></a></li>
                     <?php } ?>

                  <?php } ?>

               <?php } ?>

            <?php } ?>

         </ul>
      </div>
   </div>
   <div id="shadow"></div>
   <a id="b_close_popup" href="#" onclick="fs_hide_popups(); return false;">
      <img src="view/img/close.png" alt="close"/>
   </a>
   <div class="main_div">
      <?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("feedback") . ( substr("feedback",-1,1) != "/" ? "/" : "" ) . basename("feedback") );?>