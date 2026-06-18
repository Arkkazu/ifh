window.loadVideo = function (element) {
  const videoId = element.getAttribute("data-video-id");
  if (!videoId) return;

  const iframe = document.createElement("iframe");
  iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
  iframe.allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture";
  iframe.allowFullscreen = true;
  iframe.classList.add("absolute", "inset-0", "w-full", "h-full", "border-0");

  element.replaceWith(iframe);
};
