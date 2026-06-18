<?php
/* Template Name: お問い合わせ contact */
get_header();
?><body id="contact" class="contact lower">
 <div id="wrapper">
  <?php get_template_part('inc','header'); ?>
  <div id="main_area" role="main">
   <div id="main_title">
    <div class="main_width">
     <div class="main_title_inner">
      <h1><span>CONTACT</span></h1>
      <div class="content_title_jp"><span>QUAKER STATEへのお問い合わせ</span></div>
     </div>
    </div>
   </div>
   <div class="content_wrapper">
    <div class="main_width">
     <div class="main_cont">
<?php echo do_shortcode('[contact-form-7 id="10" title="お問い合わせフォーム"]'); ?>
     </div>
    </div>
   </div>
   <?php get_template_part('inc','page_top'); ?>
  </div><!-- main_area -->
  <?php get_template_part('inc','footer'); ?>
 </div><!-- wrapper -->
 <?php get_template_part('inc','sp_menu'); ?>
 <?php get_template_part('inc','js'); ?>
 <script>
   //電話番号・郵便番号を数字のみ入力に指定
   $('.inpnumber').attr('pattern', '^[0-9]+$');
   $(document).on('keyup', '.inpnumber', function(e) {
    var val = this.value;
    var pattern = /^\d*$/;
    if(!pattern.test(val)) {
     //数値以外なら空にする
     $(this).val('');
    }
   });


  //「完了画面」
  document.addEventListener( 'wpcf7mailsent', function( event ) {
   location = '<?php echo site_url('/'); ?>contact/thanks/';
  }, false );
 </script>
 <?php get_footer(); ?>
</body>
</html>
