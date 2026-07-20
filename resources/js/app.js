// resources/js/app.js
// Dark mode toggle and count‑up animation for statistics cards

document.addEventListener('DOMContentLoaded', () => {
  // ----- Dark Mode -----
  const htmlEl = document.documentElement;
  const toggleBtn = document.getElementById('darkModeToggle');
  const themeIcon = document.getElementById('themeIcon');

  // Initialize theme from localStorage
  const storedTheme = localStorage.getItem('theme');
  if (storedTheme === 'dark') {
    htmlEl.classList.add('dark');
    if (themeIcon) themeIcon.setAttribute('d', 'M10 2a8 8 0 100 16 8 8 0 000-16z'); // moon icon path (placeholder)
  }

  if (toggleBtn) {
    toggleBtn.addEventListener('click', () => {
      htmlEl.classList.toggle('dark');
      const isDark = htmlEl.classList.contains('dark');
      localStorage.setItem('theme', isDark ? 'dark' : 'light');
      // Simple icon swap (sun / moon)
      if (themeIcon) {
        if (isDark) {
          // Moon
          themeIcon.setAttribute('d', 'M21 12.79A9 9 0 1111.21 3a7 7 0 009.79 9.79z');
        } else {
          // Sun
          themeIcon.setAttribute('d', 'M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41M12 6a6 6 0 100 12 6 6 0 000-12z');
        }
      }
    });
  }

  // ----- Count‑Up Animation -----
  const counters = document.querySelectorAll('.stats-card h3');
  const animateCount = (el, target) => {
    const duration = 1500; // ms
    const start = 0;
    const startTime = performance.now();
    const step = (now) => {
      const progress = Math.min((now - startTime) / duration, 1);
      const current = Math.floor(start + progress * (target - start));
      el.textContent = current;
      if (progress < 1) requestAnimationFrame(step);
    };
    requestAnimationFrame(step);
  };

  counters.forEach((el) => {
    const target = parseInt(el.textContent.replace(/[^0-9]/g, ''), 10);
    if (!isNaN(target)) {
      el.textContent = '0';
      animateCount(el, target);
    }
  });
});

