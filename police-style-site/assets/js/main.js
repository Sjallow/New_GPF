document.addEventListener('DOMContentLoaded', () => {
  const yearSpan = document.getElementById('year');
  if (yearSpan) yearSpan.textContent = String(new Date().getFullYear());

  // Mobile nav
  const toggle = document.querySelector('.nav-toggle');
  const nav = document.getElementById('primary-nav');
  if (toggle && nav) {
    toggle.addEventListener('click', () => {
      const isOpen = nav.classList.toggle('open');
      toggle.setAttribute('aria-expanded', String(isOpen));
    });
  }

  // Simple hero slider
  const slider = document.querySelector('.hero-slider');
  if (!slider) return;
  const slides = Array.from(slider.querySelectorAll('.hero-slide'));
  const prevBtn = slider.querySelector('.hero-prev');
  const nextBtn = slider.querySelector('.hero-next');
  const dotsWrap = slider.querySelector('.hero-dots');
  const autoplayMs = Number(slider.getAttribute('data-autoplay') || 7000);
  let index = slides.findIndex(s => s.classList.contains('is-active'));
  if (index < 0) index = 0;

  function renderDots(){
    if (!dotsWrap) return;
    dotsWrap.innerHTML = '';
    slides.forEach((_, i) => {
      const b = document.createElement('button');
      b.type = 'button';
      b.setAttribute('role', 'tab');
      b.setAttribute('aria-selected', String(i === index));
      b.addEventListener('click', () => goTo(i));
      dotsWrap.appendChild(b);
    });
  }

  function goTo(i){
    slides[index]?.classList.remove('is-active');
    index = (i + slides.length) % slides.length;
    slides[index]?.classList.add('is-active');
    const dotButtons = dotsWrap ? Array.from(dotsWrap.querySelectorAll('button')) : [];
    dotButtons.forEach((b, bi) => b.setAttribute('aria-selected', String(bi === index)));
  }

  function next(){ goTo(index + 1); }
  function prev(){ goTo(index - 1); }

  prevBtn?.addEventListener('click', prev);
  nextBtn?.addEventListener('click', next);
  renderDots();

  let timer = 0;
  function start(){
    stop();
    timer = window.setInterval(next, autoplayMs);
  }
  function stop(){ if (timer) window.clearInterval(timer); timer = 0; }

  slider.addEventListener('mouseenter', stop);
  slider.addEventListener('mouseleave', start);
  start();
});

