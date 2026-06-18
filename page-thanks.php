<?php
/* Template Name: お問い合わせ完了 contact */
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
      <div class="form_area thanks">
       <div class="form_step">
        <div class="step01">
         <div class="step_inner">
          <span class="step_num"><span>1</span></span>
          <span class="step_text"><span>入力</span></span>
         </div>
        </div>
        <div class="step02">
         <div class="step_inner">
          <div class="step_num"><span>2</span></div>
          <div class="step_text"><span>確認</span></div>
         </div>
        </div>
        <div class="step03">
         <div class="step_inner">
          <div class="step_num"><span>3</span></div>
          <div class="step_text"><span>完了</span></div>
         </div>
        </div>
       </div>
       <div class="cont_area_inner color_inner">
        <div class="form_thanks_message">
         <h2>お問い合わせありがとうございます。</h2>
         <p>この度は当サイトにお問い合わせいただき、誠にありがとうございます。<br>
          担当者より改めてご連絡いたしますので、少々お待ちくださいませ。</p>
        </div>
       </div><!-- cont_area_inner -->

       <div class="cont_area_inner form_btn_area">
        <p class="buttons-area-confirm"><a href="/">トップページへ戻る</a></p>
       </div>
      </div>
     </div>
    </div>
   </div>
   <?php get_template_part('inc','page_top'); ?>
  </div><!-- main_area -->
  <?php get_template_part('inc','footer'); ?>
 </div><!-- wrapper -->
 <?php get_template_part('inc','sp_menu'); ?>
 <?php get_template_part('inc','js'); ?>
 <?php get_footer(); ?>
</body>
</html>
