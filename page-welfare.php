<?php
if (is_page('welfare')) :
  get_template_part(
    'inc',
    'template-lower',
    [
      'content_template' => 'template-parts/page-welfare',
    ]
  );
endif;
