document.querySelector('[data-demo-action="assessment"]')?.addEventListener('click', () => {
  const response = document.querySelector('.demo-response');
  if (response) { response.hidden = false; response.scrollIntoView({block: 'nearest', behavior: 'smooth'}); }
});
