<?php
get_header();
?>

<body <?php body_class('relative h-full flex flex-col overflow-hidden'); ?>>

  <?php get_template_part('inc', 'header'); ?>

  <div class="js-scroll-container mt-60 pc:mt-90 flex-1 overflow-x-hidden flex flex-col justify-between">

    <?php
    if (!empty($args['content_template'])) {
      get_template_part($args['content_template']);
    }
    ?>

    <?php get_template_part('inc', 'footer'); ?>
  </div>
  <?php get_template_part('inc', 'page-top'); ?>
  <?php
  $recruit_page = get_page_by_path('recruit');

  if ($recruit_page) {
    $recruit_id = $recruit_page->ID;

    if (
      is_page($recruit_id) ||
      in_array($recruit_id, get_post_ancestors(get_queried_object_id()), true)
    ) :
  ?>
      <?php get_template_part('inc', 'recruit-banner'); ?>
  <?php
    endif;
  }
  ?>
  <?php get_template_part('inc', 'sp-menu'); ?>
  <?php wp_footer(); ?>
</body>

</html>