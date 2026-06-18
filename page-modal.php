<?php
get_header();
?>

<body <?php body_class('relative h-full flex flex-col overflow-hidden'); ?>>
  <?php get_template_part('inc', 'header'); ?>

  <div class="mt-60 pc:mt-90 flex-1 overflow-x-hidden">
    <main class="pb-80 pc:pb-160">

      <div class="relative">
        <h1 class="">
          <picture>
            <source media="(min-width: 1272px)" srcset="/wp-content/themes/ifh_theme/media/images/recruit/recruit_pc_1.webp">
            <img class="w-full" src="/wp-content/themes/ifh_theme/media/images/recruit/recruit_sp_1.webp" alt="Recruit" loading="lazy" width="750" height="1202">
          </picture>
        </h1>
      </div>

      <div class="flex justify-center">
        <button class="js-modal-trigger bg-red flex items-center justify-center" type="button">
          <span class="block text-white text-100 -translate-y-[0.08em]">
            モーダルトリガー
          </span>
        </button>
      </div>

      <div class="js-modal hidden opacity transition-opacity duration-300 m-auto inset-0 fixed bg-white w-[calc(100%-32rem)] max-w-1200 max-h-[calc(100%-80rem)] z-1000">

      </div>

      <div class="mt-80 px-20">
        <div class="mx-auto max-w-640">
          <div class="border-y border-black py-16">
            <h2 class="text-19 text-center font-normal">
              2026年<br class="md:hidden"><span class="max-md:hidden">　</span><span class="bg-[linear-gradient(to_bottom,transparent_60%,#FFF700_60%)]">新卒2次募集　7/15～ START</span>
            </h2>
            <div class="mt-16">
              <p class="text-12 text-center">
                1次募集は6/30で締切となりました<br>
                2次募集は定員に達し次第告知はせず終了となります
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-80 px-20">
        <div class="mx-auto max-w-640">
          <h2 class="text-16 text-center">
            株式会社Ifh<br>
            地域と共に、未来へつなぐサロンづくり
          </h2>
          <div class="mt-24">
            <p class="text-14">
              私たちは、地域の皆様に愛されるサロンとして、幅広い年齢層のお客様に寄り添い、お客様の美しさと笑顔を支える場所を目指しています。<br>
              世代を超えて安心して通えるサロンであり続けるために、確かな技術力とおもてなしの心を大切にしながら、新しいことに積極的にチャレンジする文化を育んでいます。<br>
              常に新しい技術、トレンド、サービスを取り入れ、スタッフ一人ひとりが成長し続けることで、お客様に最高の満足と感動を提供します。<br>
              共に働く仲間を大切にし、働きやすく、挑戦を応援する環境づくりにも力を注いでいます。<br>
              “安心できる居場所”でありながら、“常に新しい発見と感動があるサロン”として、お客様、スタッフ、そして地域社会と共に未来をつくっていきます。
            </p>
          </div>
        </div>
      </div>


    </main>
    <?php get_template_part('inc', 'footer'); ?>
  </div>

  <?php get_template_part('inc', 'page-top'); ?>
  <?php get_template_part('inc', 'sp-menu'); ?>
  <?php get_template_part('inc', 'modal-overlay'); ?>

  <?php wp_footer(); ?>
</body>

</html>