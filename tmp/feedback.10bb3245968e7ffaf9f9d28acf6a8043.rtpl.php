<?php if(!class_exists('raintpl')){exit;}?><div id="popup_feedback" class="popup" style="display: none;">
   <h1>¿Necesitas ayuda?</h1>
   <p>
      La <a class="link" href="<?php echo $community_url;?>" target="_blank">comunidad FacturaScripts</a>
      está para ayudarte. Escribe tus preguntas o sugerencias y te contestaremos
      lo antes posible.
   </p>
   <br/>
   <form name="feedback" action="<?php echo $community_url;?>/feedback.php" method="post" target="_blank">
      <input type="hidden" name="feedback_info" value="<?php echo $fsc->system_info();?>"/>
      <div class="etiquetas">
         <span>Elige una opción:</span>
         <input id="feedback_question" type="radio" name="feedback_type" value="question" checked="checked">
         <label for="feedback_question">Preguntar</label>
         <input id="feedback_problem" type="radio" name="feedback_type" value="error">
         <label for="feedback_problem">Informar de un error</label>
         <input id="feedback_idea" type="radio" name="feedback_type" value="idea">
         <label for="feedback_idea">Aportar una idea</label>
         <label onclick="window.open('<?php echo $community_url;?>','_blank')">Buscar en la ayuda</label>
      </div>
      <br/>
      <?php if( $fsc->empresa ){ ?>

      <textarea name="feedback_text" rows="12"><?php echo $fsc->empresa->email_firma;?></textarea>
      <input type="text" name="feedback_email" size="30" placeholder="introduce tu email" value="<?php echo $fsc->empresa->email;?>"/>
      <?php }else{ ?>

      <textarea name="feedback_text" rows="12"></textarea>
      <input type="text" name="feedback_email" size="30" placeholder="introduce tu email"/>
      <?php } ?>

      <input class="submit" type="submit" value="enviar"/>
   </form>
   <?php if( !$demo AND mt_rand(0,99)==0 ){ ?>

   <div style="display: none;">
      <iframe src="<?php echo $community_url;?>/stats.php?add=TRUE&version=<?php echo $fsc->version();?>&corp=<?php echo urlencode($fsc->empresa->nombre); ?>" height="0"></iframe>
   </div>
   <?php } ?>

</div>