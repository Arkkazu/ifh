<script>
  // JavaScriptでの動的コンテンツの挿入
  const salonCard = (number, title, description) => `
<div class="bg-beige py-40 px-30">
  <span class="font-playfair-display font-medium italic text-38 leading-none -tracking-5">${number}.</span>
  <h3 class="mt-8 text-16 leading-26 font-medium">${title}</h3>
  <p class="mt-16 text-13 leading-23">${description}</p>
  <div class="mt-24 flex justify-center gap-x-40">
    <a class="border border-solid border-black w-100 aspect-square flex justify-center items-center" href="https://line.me/R/ti/p/@602zauhc" target='_blank'>
      <img class="w-52" src="/wp-content/themes/ifh_theme/assets/media/images/common/svg-line.svg" alt="line" width="52" height="52">
    </a>
    <a class="border border-solid border-black w-100 aspect-square flex justify-center items-center" href="https://www.instagram.com/ifh_group/" target='_blank'>
      <img class="w-52" src="/wp-content/themes/ifh_theme/assets/media/images/common/svg-insta.svg" alt="instagram" width="40" height="40">
    </a>
  </div>
</div>
`;
  document.getElementById('someElementId').innerHTML = salonCard("01.", "サロン見学", "サロン見学希望を...");
</script>