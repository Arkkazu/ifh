<?php
get_header();
?>

<body class="max-pc:pb-68">
  <?php //get_template_part('inc', 'header' );
  ?>
  <main class="pb-80 pc:pb-160 overflow-hidden">

    <section class="">
      <div class="flex justify-center items-center h-50 pc:h-104 bg-white">
        <h1 class="text-16 pc:text-26 font-normal">Ifh <span class="text-10 pc:text-19">×</span> Kimono</h1>
      </div>
      <div class="relative">
        <div class="">
          <picture>
            <!-- スマホ用の画像: 画面幅が767px以下の場合に使用 -->
            <source media="(max-width: 767px)" srcset="/wp-content/themes/ifh_theme/media/images/furisode/furisode_top_vol5_sp.webp">
            <!-- デフォルトの画像: それ以外の場合に使用 -->
            <img src="/wp-content/themes/ifh_theme/media/images/furisode/furisode_top_vol.5_PC.webp" alt="" class="p-furisode-kv__img" width="1919" height="961">
          </picture>

        </div>
        <!-- <div class="absolute top-[67%] md:top-[28%] left-[12%] md:left-[32%] w-[76%] md:w-[29.5%]">
          <img class='w-full' src='/wp-content/themes/ifh_theme/media/images/furisode/soudankai.svg' alt='' width='569' height='474'>
        </div> -->
      </div>
      <!-- <div class="p-furisode-kv__spTtl">
          <img src="/wp-content/themes/ifh_theme/assets/media/images/furisode/main-ttl-sp.svg" alt="" class="p-furisode-kv__spTtl-img" width="297" height="115">
        </div> -->
    </section>

    <!-- <div class="mt-80">
        <div class="mx-auto max-w-1300 px-20 lg:px-50">
          <video class='md:hidden' autoplay muted loop playsinline>
            <source src='/wp-content/themes/ifh_theme/assets/media/video/furisode_vol1.mp4' type='video/mp4'>
          </video>
          <img class="hidden md:block w-full" src="/wp-content/themes/ifh_theme/assets/media/images/furisode/furisode-img07.webp" alt="" class="p-furisode-kv__img" width="1200" height="280">
        </div>
      </div> -->


    <div class="pc:mt-64 mx-auto max-w-1300 pc:px-50">

      <div class="px-20 py-32 pc:p-32 bg-gradient-to-r from-[#6dc1c3] to-[#1bb8ce] flex flex-col items-center">
        <h2 class="text-21 pc:text-24 text-white text-center">
          ご来場特典
        </h2>
        <div class="mt-16 w-full">
          <div class="mx-auto pc:w-900 border-t border-white pt-16 flex flex-col items-center">
            <p class="text-15 pc:text-18 text-white text-center">
              無料振袖相談会にご来場の全てのお客様に<br class="md:hidden">選べる特典プレゼント!!
            </p>
            <div class="mt-8">
              <p class="text-12 text-white">
                ※ご来場にはご予約が必要となります。 <br class="md:hidden">※特典はいずれかお一つとなります。
              </p>
            </div>
          </div>
        </div>
        <div class="mt-16 w-full">
          <div class="grid md:grid-cols-2 pc:grid-cols-3 gap-y-10 gap-x-20">
            <div class="flex-1 bg-[rgba(255,255,255,0.7)] p-8 pc:p-12 flex justify-between">
              <div class="flex-1">
                <div class="relative py-16 px-12">
                  <div class="w-15 absolute top-0 left-0">
                    <img class="w-full" src="/wp-content/themes/ifh_theme/assets/media/images/furisode/triangle.svg" alt="三角" width="15" height="16">
                  </div>
                  <h3 class="text-16 font-noto-serif">
                    リファエスカラットレイ
                  </h3>
                  <div class="mt-4">
                    <p class="text-12 font-noto-serif">
                      Refa S CARAT RAY
                    </p>
                  </div>
                </div>
              </div>
              <div class="w-100 pc:w-132 shrink-0">
                <img class="w-full" src="/wp-content/themes/ifh_theme/assets/media/images/furisode/tokuten01.webp" alt="" width="132" height="102">
              </div>
            </div>
            <div class="flex-1 bg-[rgba(255,255,255,0.7)] p-8 pc:p-12 flex justify-between">
              <div class="flex-1">
                <div class="relative py-16 px-12">
                  <div class="w-15 absolute top-0 left-0">
                    <img class="w-full" src="/wp-content/themes/ifh_theme/assets/media/images/furisode/triangle.svg" alt="三角" width="15" height="16">
                  </div>
                  <h3 class="text-16 font-noto-serif">
                    フェイスハローセット
                  </h3>
                  <div class="mt-4">
                    <p class="text-12 font-noto-serif">
                      FACE HALO BODY&FACE SET
                    </p>
                  </div>
                </div>
              </div>
              <div class="-mr-8 w-100 pc:w-116 shrink-0">
                <img class="w-full" src="/wp-content/themes/ifh_theme/assets/media/images/furisode/tokuten02.webp" alt="" width="128" height="115">
              </div>
            </div>
            <div class="flex-1 bg-[rgba(255,255,255,0.7)] p-8 pc:p-12 flex justify-between">
              <div class="flex-1">
                <div class="relative py-16 px-12">
                  <div class="w-15 absolute top-0 left-0">
                    <img class="w-full" src="/wp-content/themes/ifh_theme/assets/media/images/furisode/triangle.svg" alt="三角" width="15" height="16">
                  </div>
                  <h3 class="text-16 font-noto-serif">
                    トリプルヒアルロン酸<br>
                    フェイスマスク（５枚）
                  </h3>
                  <div class="mt-4">
                    <p class="text-12 font-noto-serif">
                      TRIPL HYALURONIC FACE PACK
                    </p>
                  </div>
                </div>
              </div>
              <div class="-mr-8 w-100 pc:w-110 shrink-0">
                <img class="w-full" src="/wp-content/themes/ifh_theme/assets/media/images/furisode/tokuten03.webp" alt="" width="124" height="105">
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <section class="pc:mt-80 p-furisode-plan-sec">
      <div class="mx-auto px-24">

        <div class="-mx-24 pc:mx-auto max-w-[calc(100%+48rem)] pc:max-w-1200">
          <div class=" relative bg-[#e23362] w-full h-40 flex items-center pl-44 pc:pl-24">
            <!-- 通常表示用：ピンクのSVG -->
            <img class="absolute top-[50%] pc:top-[75%] right-0 -translate-y-1/2 w-80 pc:w-160 aspect-[186/198]" src="/wp-content/themes/ifh_theme/media/images/furisode/hato-only.svg" alt="" width="186" height="198">
            <!-- 背景色と重なる範囲だけ白くする用 -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
              <img
                class="absolute top-[50%] pc:top-[75%] right-0 -translate-y-1/2 w-80 pc:w-160 aspect-[186/198] brightness-0 invert"
                src="/wp-content/themes/ifh_theme/media/images/furisode/hato-only.svg"
                alt=""
                width="186"
                height="198">
            </div>
            <p class="relative text-18 text-white">
              rental full pack PLAN
            </p>
          </div>
        </div>

        <div class="mx-auto max-pc:px-20 w-full pc:max-w-1200">
          <div class="mx-auto max-w-1020">
            <div class="border-b-2 border-[#ab8f4a] pb-8 md:pb-16">
              <h2 class="mt-16 text-18 pc:text-20 text-center font-medium">振袖レンタルフルパックプラン</h2>
              <div class="flex max-md:flex-col md:items-end md:justify-center gap-y-8 gap-x-16">
                <div class="mt-8 flex items-end md:justify-center gap-x-8">
                  <span class="text-55 text-[#c92a1d] font-noto-serif font-bold leading-none">176,000</span>
                  <span class="text-24 text-[#c92a1d] font-bold">円～</span>
                </div>
                <p class="text-12 text-right font-bold">※税込価格</p>
              </div>
            </div>

            <p class="mt-24 text-16 text-center font-medium">
              大切な成人式を<span class="text-[#c92a1d]">トータル</span>で<br class="md:hidden"><span class="text-[#c92a1d]">フルサポート</span>します！
            </p>

            <div class="mt-24 flex max-pc:flex-col items-center justify-center gap-x-10 pc:gap-x-20 gap-y-10">
              <div class="px-16 pc:max-w-300 w-full h-48 pc:h-60 bg-gradient-to-r from-[#ff9aab] to-[#ff184c] flex justify-center items-center">
                <div class="text-white flex items-center gap-x-24 pc:gap-x-8">
                  <span class="text-40 font-noto-serif leading-none italic">01</span>
                  <span class="text-18 pc:text-20 font-noto-sans font-medium leading-[1.3] w-170 pc:w-auto flex justify-center">振袖コーディネート</span>
                </div>
              </div>

              <svg class="w-16 pc:w-20 rotate-90 pc:rotate-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.31 18.17">
                <g>
                  <polygon class="cls-1" points=".69 18.17 0 17.44 8.78 9.08 0 .72 .69 0 10.23 9.08 .69 18.17" />
                  <polygon class="cls-1" points="7.77 18.17 7.08 17.44 15.86 9.08 7.08 .72 7.77 0 17.31 9.08 7.77 18.17" />
                </g>
              </svg>
              <div class="px-16 pc:max-w-300 w-full h-48 pc:h-60 bg-gradient-to-r from-[#ff9aab] to-[#ff184c] flex justify-center items-center">
                <div class="text-white flex items-center gap-x-24 pc:gap-x-16">
                  <span class="text-40 font-noto-serif leading-none italic">02</span>
                  <span class="text-18 pc:text-20 font-noto-sans font-medium w-170 pc:w-auto flex justify-center">前撮り</span>
                </div>
              </div>
              <svg class="w-16 pc:w-20 rotate-90 pc:rotate-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.31 18.17">
                <g>
                  <polygon class="cls-1" points=".69 18.17 0 17.44 8.78 9.08 0 .72 .69 0 10.23 9.08 .69 18.17" />
                  <polygon class="cls-1" points="7.77 18.17 7.08 17.44 15.86 9.08 7.08 .72 7.77 0 17.31 9.08 7.77 18.17" />
                </g>
              </svg>
              <div class="px-16 pc:max-w-300 w-full h-48 pc:h-60 bg-gradient-to-r from-[#ff9aab] to-[#ff184c] flex justify-center items-center">
                <div class="text-white flex items-center gap-x-24 pc:gap-x-16">
                  <span class="text-40 font-noto-serif leading-none italic">03</span>
                  <span class="text-18 pc:text-20 font-noto-sans font-medium w-170 pc:w-auto flex justify-center">成人式当日</span>
                </div>
              </div>
            </div>

            <div class="mt-32 pc: bg-[#c8e7e9] p-16 font-noto-serif">
              <div class="text-16 text-center font-bold">パック内容<span class="u-sp-hide">　</span><span class="u-ib">（前撮り & 成人式当日）</span></div>
              <ul class="mt-20 md:px-64 flex flex-wrap gap-x-16 pc:gap-x-32 gap-y-16">
                <li class="text-14 pc:text-16 font-normal -indent-[1.5em] pl-[1.5em] w-full md:w-auto">□ 振袖・帯・小物一式</li>
                <li class="text-14 pc:text-16 font-normal -indent-[1.5em] pl-[1.5em] w-[calc((100%-16rem)/2)] md:w-auto">□ 着付け</li>
                <li class="text-14 pc:text-16 font-normal -indent-[1.5em] pl-[1.5em] w-[calc((100%-16rem)/2)] md:w-auto">□ ヘアメイク</li>
                <li class="text-14 pc:text-16 font-normal -indent-[1.5em] pl-[1.5em] w-[calc((100%-16rem)/2)] md:w-auto">□ ネイル</li>
                <li class="text-14 pc:text-16 font-normal -indent-[1.5em] pl-[1.5em] w-[calc((100%-16rem)/2)] md:w-auto">□ アイラッシュ</li>
                <li class="text-14 pc:text-16 font-normal -indent-[1.5em] pl-[1.5em] whitespace-pre-wrap break-keep">□ 前撮り10P アルバムプレゼント</li>
              </ul>
            </div>

          </div>

        </div>

        <div class="mt-32 pc:mt-40 mx-auto pc:max-w-1020">
          <div class="flex max-md:flex-col gap-y-32 gap-x-64">
            <button class="js-modal-trigger md:grow border border-[#ff9aab] flex justify-center items-center gap-x-24 py-8" data-modal-target="modal-content-1">
              <span class="max-md:w-172 pb-[0.1em] font-normal font-noto-serif">フルパックプラン詳細</span>
              <div class="flex items-center gap-x-8">
                <svg class="w-14 fill-coral" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.31 18.17">
                  <g>
                    <polygon class="fill-[#ff184c]" points=".69 18.17 0 17.44 8.78 9.08 0 .72 .69 0 10.23 9.08 .69 18.17" />
                    <polygon class="fill-[#ff184c]" points="7.77 18.17 7.08 17.44 15.86 9.08 7.08 .72 7.77 0 17.31 9.08 7.77 18.17" />
                  </g>
                </svg>
                <span class="pb-[0.1em] font-normal font-noto-serif">more</span>
              </div>
            </button>
            <button class="js-modal-trigger md:grow border border-[#ff9aab] flex justify-center items-center gap-x-24 py-8" data-modal-target="modal-content-2">
              <span class="max-md:w-172 pb-[0.1em] font-normal font-noto-serif">ママ振プラン詳細</span>
              <div class="flex items-center gap-x-8">
                <svg class="w-14 fill-coral" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.31 18.17">
                  <g>
                    <polygon class="fill-[#ff184c]" points=".69 18.17 0 17.44 8.78 9.08 0 .72 .69 0 10.23 9.08 .69 18.17" />
                    <polygon class="fill-[#ff184c]" points="7.77 18.17 7.08 17.44 15.86 9.08 7.08 .72 7.77 0 17.31 9.08 7.77 18.17" />
                  </g>
                </svg>
                <span class="pb-[0.1em] font-normal font-noto-serif">more</span>
              </div>
            </button>
          </div>
        </div>

        <div class="mt-80 mx-auto max-w-1200">
          <div class="splide splide-furisode">
            <div class="splide__track">
              <ul class="splide__list">
                <li class="splide__slide"><img src="/wp-content/themes/ifh_theme/media/images/furisode/model_1@2x.webp" alt="振袖女性"></li>
                <li class="splide__slide"><img src="/wp-content/themes/ifh_theme/media/images/furisode/model_2@2x.webp" alt="振袖女性"></li>
                <li class="splide__slide"><img src="/wp-content/themes/ifh_theme/media/images/furisode/model_3@2x.webp" alt="振袖女性"></li>
                <li class="splide__slide"><img src="/wp-content/themes/ifh_theme/media/images/furisode/model_4@2x.webp" alt="振袖女性"></li>
                <li class="splide__slide"><img src="/wp-content/themes/ifh_theme/media/images/furisode/model_5@2x.webp" alt="振袖女性"></li>
                <li class="splide__slide"><img src="/wp-content/themes/ifh_theme/media/images/furisode/model_6@2x.webp" alt="振袖女性"></li>
                <li class="splide__slide"><img src="/wp-content/themes/ifh_theme/media/images/furisode/model_7@2x.webp" alt="振袖女性"></li>
                <li class="splide__slide"><img src="/wp-content/themes/ifh_theme/media/images/furisode/model_8@2x.webp" alt="振袖女性"></li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section class="mt-80 pc:mt-160">
      <div class="mx-auto max-w-1200">

        <div class="bg-gradient-to-r from-[#6dc1c3] to-[#1bb8ce] pt-40 px-15 pc:px-25 pb-30">

          <div class="mx-auto max-w-900">
            <h2 class="text-21 md:text-24 text-white font-noto-sans text-center border-b border-white pb-12">無料振袖相談会ご予約特典</h2>
            <div class="mt-12 flex max-pc:flex-col lg:flex-row justify-center items-start lg:items-center gap-y-8 gap-x-40">
              <p class="max-pc:w-full text-16 md:text-18 text-center text-white ">無料振袖相談会にご参加いただいた方だけの<br class="md:hidden">特別な特典になります</p>
              <p class="max-pc:w-full text-12 md:text-14 text-white text-center">※定員になり次第締め切らせて頂きます</p>
            </div>
          </div>




          <div class="mt-40 grid grid-cols-1 md:grid-cols-2 pc:grid-cols-3 gap-x-10 pc:gap-x-20 md:gap-y-10">

            <div class="bg-white py-40 px-20">

              <div class="relative flex justify-center items-center">
                <img class="w-110" src="/wp-content/themes/ifh_theme/media/images/furisode/svg-gara.svg" alt="" loading="lazy" width="220" height="216">
                <div class="absolute top-[calc(50%+4rem)] left-1/2 abs-center flex flex-col items-center text-white font-medium font-noto-serif leading-none">
                  <span class="text-10 ">special</span>
                  <span class="text-28">01</span>
                </div>
              </div>

              <p class="mt-40 text-20 md:text-22 text-[#ff184c] font-medium font-noto-sans text-coral text-center">
                【相談会当日特典】<br>
                スタイリストによる<br>
                ヘアセット無料体験</p>

              <p class="js-furisode-card-desc mt-40 text-16 md:text-18 font-medium font-noto-serif">相談会で選んだお着物に合わせてプロの現役スタイリストがヘアメイク♪成人式当日の具体的なイメージがついて安心です</p>

              <div class="mt-40 bg-gradient-to-r from-[#ff9aab] to-[#ff184c] py-16 px-8 text-white">
                <div class="relative flex justify-center text-18 text-white font-noto-serif">
                  <span class="absolute top-1/2 left-0 -translate-y-1/2 w-[calc((100%-8em)/2)] h-px bg-white"></span>
                  <span class="absolute top-1/2 right-0 -translate-y-1/2 w-[calc((100%-8em)/2)] h-px bg-white"></span>
                  <span>ヘアセット</span>
                </div>
                <div class="flex justify-center items-end gap-x-20">
                  <div class="font-noto-serif">
                    <span class="text-24 pc:text-32 font-semibold leading-none">
                      5,000</span>
                    <span class="ml-4 text-14 pc:text-18 font-semibold leading-none">円相当</span>
                  </div>
                  <svg class="mb-16 w-32 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 37.01 10.12">
                    <g>
                      <path d="M37.01,5.06l-8.09,5.06V0l8.09,5.06Z" />
                      <path d="M8.09,5.06L0,10.12V0l8.09,5.06Z" />
                      <path d="M22.55,5.06l-8.09,5.06V0l8.09,5.06Z" />
                    </g>
                  </svg>
                  <div class="font-noto-serif">
                    <span class="text-40 pc:text-48 font-semibold leading-none">0</span>
                    <span class="ml-4 text-14 pc:text-18 font-semibold leading-none">円</span>
                  </div>
                </div>
              </div>

            </div>
            <div class="bg-white py-40 px-20">

              <div class="relative flex justify-center items-center">
                <img class="w-110" src="/wp-content/themes/ifh_theme/media/images/furisode/svg-gara.svg" alt="" loading="lazy" width="220" height="216">
                <div class="absolute top-[calc(50%+4rem)] left-1/2 abs-center flex flex-col items-center text-white font-medium font-noto-serif leading-none">
                  <span class="text-10 ">special</span>
                  <span class="text-28">02</span>
                </div>
              </div>

              <p class="mt-40 text-20 md:text-22 text-[#ff184c] font-medium font-noto-sans text-coral text-center">
                【相談会ご成約特典】<br>
                前撮りと成人式当日の<br>
                ネイル＆アイラッシュ無料!!
              </p>

              <p class="js-furisode-card-desc mt-40 text-16 md:text-18 font-medium font-noto-serif">
                前撮りと成人式当日のネイル&アイラッシュまたはまつ毛パーマが無料！トータルでかわいい成人式を迎えられます
              </p>

              <div class="mt-40 bg-gradient-to-r from-[#ff9aab] to-[#ff184c] py-16 px-8 text-white">
                <div class="relative flex justify-center text-18 text-white font-noto-serif">
                  <span class="absolute top-1/2 left-0 -translate-y-1/2 w-[calc((100%-13em)/2)] h-px bg-white"></span>
                  <span class="absolute top-1/2 right-0 -translate-y-1/2 w-[calc((100%-13em)/2)] h-px bg-white"></span>
                  <span>
                    ネイル＆アイラッシュ
                  </span>
                </div>
                <div class="flex justify-center items-end gap-x-20">
                  <div class="font-noto-serif">
                    <span class="text-24 pc:text-32 font-semibold leading-none">
                      33,000
                    </span>
                    <span class="ml-4 text-14 pc:text-18 font-semibold leading-none">円相当</span>
                  </div>
                  <svg class="mb-16 w-32 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 37.01 10.12">
                    <g>
                      <path d="M37.01,5.06l-8.09,5.06V0l8.09,5.06Z" />
                      <path d="M8.09,5.06L0,10.12V0l8.09,5.06Z" />
                      <path d="M22.55,5.06l-8.09,5.06V0l8.09,5.06Z" />
                    </g>
                  </svg>
                  <div class="font-noto-serif">
                    <span class="text-40 pc:text-48 font-semibold leading-none">
                      0
                    </span>
                    <span class="ml-4 text-14 pc:text-18 font-semibold leading-none">円</span>
                  </div>
                </div>
              </div>

            </div>
            <div class="bg-white py-40 px-20">

              <div class="relative flex justify-center items-center">
                <img class="w-110" src="/wp-content/themes/ifh_theme/media/images/furisode/svg-gara.svg" alt="" loading="lazy" width="220" height="216">
                <div class="absolute top-[calc(50%+4rem)] left-1/2 abs-center flex flex-col items-center text-white font-medium font-noto-serif leading-none">
                  <span class="text-10 ">special</span>
                  <span class="text-28">03</span>
                </div>
              </div>

              <p class="mt-40 text-20 md:text-22 text-[#ff184c] font-medium font-noto-sans text-coral text-center">
                【相談会ご成約特典】<br>
                お着物無料点検＆<br>
                お手入れサービス
              </p>

              <p class="js-furisode-card-desc mt-40 text-16 md:text-18 font-medium font-noto-serif">
                既にお着物をお持ちの方やママ振プランの方は京都の職人が丁寧に点検し、寸法直しやカビ落とし、シミ落としなどお手入れのお見積もりをその場でいたします
              </p>

              <div class="mt-40 bg-gradient-to-r from-[#ff9aab] to-[#ff184c] py-16 px-8 text-white">
                <div class="relative flex justify-center text-18 text-white font-noto-serif">
                  <span class="absolute top-1/2 left-0 -translate-y-1/2 w-[calc((100%-9em)/2)] h-px bg-white"></span>
                  <span class="absolute top-1/2 right-0 -translate-y-1/2 w-[calc((100%-9em)/2)] h-px bg-white"></span>
                  <span>
                    お持ちの振袖
                  </span>
                </div>
                <div class="flex justify-center items-center gap-x-20">
                  <div class="mt-4 font-noto-serif">
                    <span class="text-14 pc:text-16 font-semibold leading-none">老舗呉服店による点検</span>
                  </div>
                  <svg class="mt-4 w-32 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 37.01 10.12">
                    <g>
                      <path d="M37.01,5.06l-8.09,5.06V0l8.09,5.06Z" />
                      <path d="M8.09,5.06L0,10.12V0l8.09,5.06Z" />
                      <path d="M22.55,5.06l-8.09,5.06V0l8.09,5.06Z" />
                    </g>
                  </svg>
                  <div class="font-noto-serif">
                    <span class="text-40 pc:text-48 font-semibold leading-none">
                      0
                    </span>
                    <span class="ml-4 text-14 pc:text-18 font-semibold leading-none">円</span>
                  </div>
                </div>
              </div>

            </div>



          </div>

        </div>

      </div>
    </section>

    <section class="mt-80 pc:mt-160">
      <div class="relative mx-auto max-w-1200 pt-32 pc:pt-64 px-24 aspect-[1500/4476] md:aspect-[2400/1250] bg-[url('/wp-content/themes/ifh_theme/media/images/furisode/furisode_totalbeauty_SP@2x.webp')] md:bg-[url('/wp-content/themes/ifh_theme/media/images/furisode/furisode25_totalbeauty_PC@2x.webp')] bg-cover bg-center">
        <div class="flex justify-center">
          <h2 class="pb-4 border-b border-black text-18 pc:text-20 text-center">トータルビューティーサロン <span class="inline-block">Ifh groupの成人式はココが違う</span></h2>
        </div>
        <div class="js-fade absolute left-24 md:left-8 pc:left-[8%] top-120 md:top-80 pc:top-140 bg-gradient-to-l from-[#ff9aab] to-[#ff184c] w-200 pc:w-240 shrink-0 aspect-square rounded-full flex justify-center items-center">
          <p class="text-16 pc:text-18 text-center text-white font-noto-serif leading-[1.8]">流行やおしゃれに<br>
            感度の高い<br>
            現役スタイリストが<br>
            ヘアメイク</p>
        </div>
        <div class="js-fade absolute left-150 md:left-184 pc:left-[26%] top-300 md:top-196 pc:top-360 bg-gradient-to-l from-[#ff9aab] to-[#ff184c] w-200 pc:w-240 shrink-0 aspect-square rounded-full flex justify-center items-center">
          <p class="text-16 pc:text-18 text-center text-white font-noto-serif leading-[1.8]">ネイルも<br>
            アイラッシュも<br>
            トータルで<br>
            コーディネート</p>
        </div>
        <div class="js-fade absolute left-24 md:left-[40%] pc:left-560 top-480 md:top-130 pc:top-200 bg-gradient-to-l from-[#ff9aab] to-[#ff184c] w-200 pc:w-240 shrink-0 aspect-square rounded-full flex justify-center items-center">
          <p class="text-16 pc:text-18 text-center text-white font-noto-serif leading-[1.8]">京都の老舗呉服店<br>
            と提携<br>
            100点以上の<br>
            お着物から選べる</p>
        </div>
      </div>
    </section>

    <section class="mt-80 pc:mt-160 px-24">
      <div class="mx-auto max-w-1200">

        <h2 class="bg-[#484947] p-[0.5em] text-18 pc:text-20 text-center text-white font-noto-serif">
          よくあるご質問
        </h2>

        <dl class="mt-40 pc:mt-80 flex flex-col gap-y-40 pc:gap-y-80">
          <div class="flex pc:gap-x-80 max-pc:flex-col mx-auto max-w-900">
            <dt class="relative pc:w-1/2 pl-50 pc:pl-75 text-16 pc:text-18 font-noto-serif before:content-['Q.'] before:absolute before:-top-10 before:left-0 before:text-40 before:pc:text-48 before:font-cormorant before:leading-none">
              相談会はどのくらい時間がかかりますか？
            </dt>
            <dd class="max-pc:mt-40 pc:w-1/2 relative pl-50 pc:pl-75 text-16 pc:text-18 font-noto-serif before:content-['A.'] before:absolute before:-top-10 before:left-0 before:text-40 before:pc:text-48 before:font-cormorant before:leading-none">
              １組様あたり2時間半ほどのお時間を考えております。<br>
              ヘアスタイルやお着物、小物合わせももちろんしっかりとご納得いただけるプランをお選びいただけるよう、ゆとりを持った時間設定となっております。
            </dd>
          </div>
          <div class="border-t border-[#9e9d9d] pt-40 pc:pt-80 flex pc:gap-x-80 max-pc:flex-col mx-auto max-w-900">
            <dt class="relative pc:w-1/2 pl-50 pc:pl-75 text-16 pc:text-18 font-noto-serif before:content-['Q.'] before:absolute before:-top-10 before:left-0 before:text-40 before:pc:text-48 before:font-cormorant before:leading-none">自分の振袖をコーディネートするプランはありますか？</dt>
            <dd class="max-pc:mt-40 pc:w-1/2 relative pl-50 pc:pl-75 text-16 pc:text-18 font-noto-serif before:content-['A.'] before:absolute before:-top-10 before:left-0 before:text-40 before:pc:text-48 before:font-cormorant before:leading-none">当社のママ振プランが該当致します。小物や帯のみをレンタルできるプランです。<br>
              お手持ちの振袖を当日お持ちいただき、スタイリストがイメージに合わせてコーディネート提案致します。また、京都の職人が無料でお着物一式を点検し、寸法直しやカビ落とし、しみ落としなどのお見積もりもその場でさせて頂きます。お直しが必要の場合も安心してお任せください。</dd>
          </div>
          <div class="border-t border-[#9e9d9d] pt-40 pc:pt-80 flex pc:gap-x-80 max-pc:flex-col mx-auto max-w-900">
            <dt class="relative pc:w-1/2 pl-50 pc:pl-75 text-16 pc:text-18 font-noto-serif before:content-['Q.'] before:absolute before:-top-10 before:left-0 before:text-40 before:pc:text-48 before:font-cormorant before:leading-none">相談会には私一人で参加できますか？</dt>
            <dd class="max-pc:mt-40 pc:w-1/2 relative pl-50 pc:pl-75 text-16 pc:text-18 font-noto-serif before:content-['A.'] before:absolute before:-top-10 before:left-0 before:text-40 before:pc:text-48 before:font-cormorant before:leading-none">相談会のプランでのご成約には保護者様のご同意が必要となるため必ずご同行をお願いしております。</dd>
          </div>
          <div class="border-t border-[#9e9d9d] pt-40 pc:pt-80 flex pc:gap-x-80 max-pc:flex-col mx-auto max-w-900">
            <dt class="relative pc:w-1/2 pl-50 pc:pl-75 text-16 pc:text-18 font-noto-serif before:content-['Q.'] before:absolute before:-top-10 before:left-0 before:text-40 before:pc:text-48 before:font-cormorant before:leading-none">支払い方法を教えてください</dt>
            <dd class="max-pc:mt-40 pc:w-1/2 relative pl-50 pc:pl-75 text-16 pc:text-18 font-noto-serif before:content-['A.'] before:absolute before:-top-10 before:left-0 before:text-40 before:pc:text-48 before:font-cormorant before:leading-none">会場にてプランご成約後、内金として20,000円をお支払い頂き、残りの金額はお振込にて後日ご入金いただきます。なお、相談会当日に現金もしくはクレジットカード払いにて全額のお支払いも可能です。</dd>
          </div>
        </dl>

      </div>
    </section>

    <section class="mt-40 pc:mt-80 px-24">
      <div class="mx-auto max-w-1200">

        <h2 class="bg-[#484947] p-[0.5em] text-18 pc:text-20 text-center text-white font-noto-serif">
          無料振袖相談会会場
        </h2>

        <div class="mt-40 pc:mt-80 flex flex-wrap gap-40">
          <div class="w-full md:w-[calc((100%-40rem)/2)] pc:w-[calc((100%-80rem)/3)]">
            <img src="/wp-content/themes/ifh_theme/assets/media/images/furisode/p-place-img01.jpg" alt="" class="w-full h-full object-cover" width="391" height="258">
          </div>
          <div class="w-full md:w-[calc((100%-40rem)/2)] pc:w-[calc((100%-80rem)/3)]">
            <img src="/wp-content/themes/ifh_theme/assets/media/images/furisode/p-place-img02.jpg" alt="" class="w-full h-full object-cover" width="391" height="258">
          </div>
          <div class="w-full  pc:w-[calc((100%-80rem)/3)]">
            <img src="/wp-content/themes/ifh_theme/assets/media/images/furisode/p-place-img03.svg" alt="" class="w-full max-w-480 mx-auto" width="336" height="258">
          </div>
        </div>

        <div class="mt-40 pc:mt-80 mx-auto max-w-400 text-center font-noto-serif">
          <div class="text-20 pc:text-22 border-b border-[#9e9d9d]">Ifh group本社</div>
          <div class="text-18 pc:text-20">tel.027-329-6563</div>
          <div class="text-16 pc:text-18">〒370-0072 群馬県高崎市大八木町605-4</div>
        </div>

      </div>
    </section>

    <section class="mt-40 pc:mt-80 px-24">
      <div class="mx-auto max-w-1200">

        <h2 class="bg-[#484947] p-[0.5em] text-18 pc:text-20 text-center text-white font-noto-serif">
          Ifh group Salon list
        </h2>

        <div class="mt-40 pc:mt-80 mx-auto max-w-780 flex flex-wrap">
          <div class="w-full text-center font-noto-serif">
            <div class="text-20 pc:text-22 max-pc:leading-[2]">
              Ifh honten <br class="pc:hidden"><span class="max-pc:hidden">/ </span>Ifh honten iizuka <br class="pc:hidden"><span class="max-pc:hidden">/ </span>BIANCA maebashi <br class="pc:hidden"><span class="max-pc:hidden">/ </span>BIANCA isesaki
            </div>
          </div>

          <div class="mt-40 pc:mt-80 mx-auto w-full max-w-600 bg-gradient-to-l from-[#ff9aab] to-[#ff184c] p-24 rounded-8">
            <p class="text-20 text-white text-center font-medium leading-[1.8]">
              成人式に関する<br class="pc:hidden">お問い合わせ・ご質問・ご予約は<br>
              <span class="text-24 font-semibold border-b-2 border-white leading-none">公式 LINE</span> よりお願いいたします
            </p>
            <div class="mt-24 mx-auto w-full max-w-326 space-y-16 text-center text-[#484947]">
              <div class="overflow-hidden rounded-8">
                <p class="bg-[#f8e6e3] py-8 text-16 font-medium leading-[1.4]">振袖相談会 公式 LINE</p>
                <p class="bg-white px-16 py-8 text-14 leading-[1.5]">振袖相談会に関するお問い合わせ・ご予約</p>
              </div>
              <div class="overflow-hidden rounded-8">
                <p class="bg-[#c8e7e9] py-8 text-16 font-medium leading-[1.4]">成人式 公式 LINE</p>
                <p class="bg-white px-16 py-8 text-14 leading-[1.5]">成人式当日の着付・ヘアメイクに<br>関するお問い合わせ・ご予約</p>
              </div>
            </div>
          </div>

          <div class="z-[1] pc:mt-120 max-pc:bg-[rgba(35,24,21,0.3)] max-pc:p-4 max-pc:fixed max-pc:left-0 max-pc:bottom-0 w-full flex pc:justify-center gap-x-4 pc:gap-x-80">
            <a class="w-1/2 pc:w-336 h-60 flex items-center justify-center gap-16 bg-[#c8e7e9] hover:opacity-70 duration-300" href="https://lin.ee/WTzFDq6" target='_blank'>
              <span class="text-center leading-[1.3]">成人式 <br class="pc:hidden">公式 LINE</span>
              <?php [$src, $wh] = theme_img_src_wh("media/images/furisode/line.svg"); ?>
              <img class="w-40" src="<?php echo $src; ?>" alt="LINE" loading="lazy" <?php echo $wh; ?>>
            </a><a class="w-1/2 pc:w-336 h-60 flex items-center justify-center gap-16 bg-[#fad7d4] hover:opacity-70 duration-300" href="https://lin.ee/USNxXly" target='_blank'>
              <span class="text-center leading-[1.3]">振袖相談会 <br class="pc:hidden">公式 LINE</span>
              <?php [$src, $wh] = theme_img_src_wh("media/images/furisode/line.svg"); ?>
              <img class="w-40" src="<?php echo $src; ?>" alt="LINE" loading="lazy" <?php echo $wh; ?>>
            </a>
          </div>

        </div>



      </div>
    </section>


    <?php get_template_part('inc', 'page-top'); ?>
  </main><!-- main_area -->
  <?php get_template_part('inc', 'footer'); ?>
  <div id="modal_1" class="js-modal opacity-0 invisible fixed z-900 inset-0 w-full h-full overflow-x-hidden overflow-y-auto bg-[rgba(0,0,0,0.5)] transition-opacity duration-300">
    <!-- <div id="modal_1" class="js-modal fixed z-900 left-0 top-0 w-full h-full overflow-auto bg-[rgba(0,0,0,0.5)] transition-opacity duration-300"> -->
    <div class="absolute top-24 left-15 pc:left-[calc(50%+(100vw-100%)/2)] pc:-translate-x-1/2 w-345 md:w-738 pc:max-w-1220 max-h-[calc(100dvh-48rem)] overflow-hidden">
      <div class="c-scrollbar relative bg-white w-full h-full py-40 px-24 md:p-36 pc:py-90 pc:px-126 max-h-[calc(100dvh-48rem)] overflow-y-auto">
        <div class="text-white" id="modal-content">
          <!-- モーダルの内容がここに動的に挿入されます -->

        </div>
      </div>
      <div class="js-modal-close absolute top-8 pc:top-16 right-8 pc:right-16 text-32 pc:text-40 text-black leading-none hoverable:cursor-pointer">×</div>
    </div>
  </div>
  <div id="modal-content-1" class="hidden">
    <img class="w-full" src="/wp-content/themes/ifh_theme/media/images/furisode/svg-plan01.svg" alt="" width="352" height="951">
  </div>
  <div id="modal-content-2" class="hidden">
    <img class="w-full" src="/wp-content/themes/ifh_theme/media/images/furisode/svg-plan02.svg" alt="" width="352" height="730">
  </div>
  <?php get_template_part('inc', 'sp-menu'); ?>

  <script type="module" src="/wp-content/themes/ifh_theme/src/js/recruit-modal.js"></script>
  <?php wp_footer(); ?>
</body>

</html>