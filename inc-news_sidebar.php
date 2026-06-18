<div id="sidebar">
  <div class="cat_list">
    <dl>
      <dt>カテゴリー</dt>
      <dd>
        <ul>
          <li class="current-cat"><a href="<?php echo esc_url( home_url( '/' ) ); ?>/news/"><span>すべて</span></a></li>
          <?php wp_list_categories(array('title_li' => '', 'taxonomy' => 'newscat')); ?>
        </ul>
      </dd>
    </dl>
  </div><!-- cat_list -->
  <div class="cat_list">
    <dl>
      <dt>年間アーカイブ</dt>
      <dd>
        <ul>
          <?php wp_get_archives( 'post_type=news&type=yearly' ); ?>
        </ul>
      </dd>
    </dl>
  </div><!-- cat_list -->
</div><!-- sidebar -->
