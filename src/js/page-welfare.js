import Splide from "@splidejs/splide";

const application = document.querySelector("[data-welfare-application]");
const trigger = application?.querySelector("[data-welfare-application-open]");
const dialog = application?.querySelector("[data-welfare-application-dialog]");
const closeButton = dialog?.querySelector("[data-welfare-application-close]");
const smallScreen = window.matchMedia("(width < 1272px)");
let placeholder = null;
let previousFocus = null;
let previousOverflow = "";
let backgroundState = [];

function closeApplication(restoreFocus = true) {
  if (!dialog || !dialog.classList.contains("is-open")) return;
  dialog.classList.remove("is-open");
  dialog.removeAttribute("role");
  dialog.removeAttribute("aria-modal");
  dialog.removeAttribute("aria-labelledby");
  trigger.setAttribute("aria-expanded", "false");
  document.documentElement.style.overflow = previousOverflow;
  backgroundState.forEach(([element, wasInert]) => { element.inert = wasInert; });
  backgroundState = [];
  if (placeholder) {
    placeholder.replaceWith(dialog);
    placeholder = null;
  }
  dialog.hidden = smallScreen.matches;
  dialog.inert = smallScreen.matches;
  if (restoreFocus && previousFocus?.isConnected && smallScreen.matches) previousFocus.focus();
}

function openApplication() {
  if (!smallScreen.matches || !dialog || dialog.classList.contains("is-open")) return;
  previousFocus = document.activeElement;
  placeholder = document.createComment("welfare application position");
  dialog.before(placeholder);
  document.body.append(dialog);
  dialog.hidden = false;
  dialog.inert = false;
  dialog.classList.add("is-open");
  dialog.setAttribute("role", "dialog");
  dialog.setAttribute("aria-modal", "true");
  dialog.setAttribute("aria-labelledby", "welfare-application-title");
  trigger.setAttribute("aria-expanded", "true");
  backgroundState = [...document.body.children].filter(element => element !== dialog)
    .map(element => [element, element.inert]);
  backgroundState.forEach(([element]) => { element.inert = true; });
  previousOverflow = document.documentElement.style.overflow;
  document.documentElement.style.overflow = "hidden";
  closeButton.focus();
}

function updateApplicationLayout() {
  if (!dialog || !trigger) return;
  closeApplication(false);
  trigger.hidden = !smallScreen.matches;
  dialog.hidden = smallScreen.matches;
  dialog.inert = smallScreen.matches;
}

if (application && trigger && dialog && closeButton) {
  trigger.addEventListener("click", openApplication);
  closeButton.addEventListener("click", () => closeApplication());
  dialog.addEventListener("click", event => {
    if (event.target === dialog) closeApplication();
  });
  dialog.addEventListener("keydown", event => {
    if (!dialog.classList.contains("is-open")) return;
    if (event.key === "Escape") {
      event.preventDefault();
      closeApplication();
      return;
    }
    if (event.key !== "Tab") return;
    const focusable = [...dialog.querySelectorAll("a[href], button:not([disabled]), [tabindex='0']")]
      .filter(element => element.getClientRects().length > 0);
    const first = focusable[0], last = focusable.at(-1);
    if (event.shiftKey && document.activeElement === first) {
      event.preventDefault();
      last.focus();
    } else if (!event.shiftKey && document.activeElement === last) {
      event.preventDefault();
      first.focus();
    }
  });
  smallScreen.addEventListener("change", updateApplicationLayout);
  updateApplicationLayout();
}

const slider = document.querySelector("[data-welfare-slider]");
const sliderScreen = window.matchMedia("(width < 768px)");
let splide = null;

function updateSlider() {
  if (!slider) return;
  if (sliderScreen.matches && !splide) {
    splide = new Splide(slider, {
      type: "slide",
      rewind: true,
      perPage: 1,
      gap: "1rem",
      pagination: false,
      autoplay: false,
      i18n: {
        prev: "前の福利厚生を見る",
        next: "次の福利厚生を見る",
        first: "最初の福利厚生を見る",
        last: "最後の福利厚生を見る",
        slide: "福利厚生",
        slideLabel: "%s / %s",
      },
    });
    splide.on("mounted", () => {
      const { list, slides } = splide.Components.Elements;
      list.setAttribute("role", "list");
      slides.forEach(slide => slide.setAttribute("role", "listitem"));
    });
    splide.mount();
  } else if (!sliderScreen.matches && splide) {
    splide.destroy(true);
    splide = null;
  }
}

sliderScreen.addEventListener("change", updateSlider);
updateSlider();
