const header = document.querySelector('#solhydrix-header');
const toggle = document.querySelector('.menu-toggle');
const nav = document.querySelector('#site-nav');
const desktopNavigation = window.matchMedia('(min-width: 1121px)');

function setMenu(open, restoreFocus = false) {
  if (!toggle || !nav) return;
  toggle.setAttribute('aria-expanded', String(open));
  toggle.setAttribute('aria-label', open ? 'Close navigation menu' : 'Open navigation menu');
  const icon = toggle.querySelector('.menu-icon');
  if (icon) icon.textContent = open ? '×' : '☰';
  nav.classList.toggle('open', open);
  if (restoreFocus) toggle.focus();
}
toggle?.addEventListener('click', () => setMenu(toggle.getAttribute('aria-expanded') !== 'true'));
nav?.querySelectorAll('a').forEach(link => link.addEventListener('click', () => setMenu(false)));
document.addEventListener('keydown', event => {
  if (event.key === 'Escape' && nav?.classList.contains('open')) setMenu(false, true);
});
document.addEventListener('click', event => {
  if (header && !header.contains(event.target) && nav?.classList.contains('open')) setMenu(false);
});
header?.querySelector('.brand')?.addEventListener('click', () => setMenu(false));
desktopNavigation.addEventListener('change', () => setMenu(false));

let scrollQueued = false;
function updateHeader() {
  if (!header) return;
  // Separate thresholds avoid flickering during the height transition.
  if (window.scrollY > 80) header.classList.add('is-compact');
  else if (window.scrollY < 16) header.classList.remove('is-compact');
  scrollQueued = false;
}
window.addEventListener('scroll', () => {
  if (!scrollQueued) { scrollQueued = true; window.requestAnimationFrame(updateHeader); }
}, {passive: true});
window.addEventListener('pageshow', updateHeader);
updateHeader();
if (header) {
  const updateOffset = () => {
    const top = Number.parseFloat(getComputedStyle(header).top) || 0;
    document.documentElement.style.setProperty('--header-offset', `${Math.ceil(header.getBoundingClientRect().height + top)}px`);
  };
  new ResizeObserver(updateOffset).observe(header);
  window.addEventListener('resize', updateOffset, {passive: true});
  updateOffset();
}

document.querySelectorAll('[data-material]').forEach(card => card.addEventListener('click', () => {
  const field = document.querySelector('#roof-material');
  if (field) field.value = card.dataset.material;
}));
