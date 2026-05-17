(function () {
  var header = document.querySelector('.site-header');

  if (!header) {
    return;
  }

  var toggle = header.querySelector('.site-header__menu-toggle');
  var menu = document.getElementById('site-header-menu');
  var close = header.querySelector('.site-header__menu-close');

  if (!toggle || !menu) {
    return;
  }

  header.classList.add('is-menu-ready');

  function setMenuState(isOpen) {
    header.classList.toggle('is-menu-open', isOpen);
    document.body.classList.toggle('is-site-menu-open', isOpen);
    toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
  }

  var desktopQuery = window.matchMedia('(min-width: 1024px)');

  function closeOnDesktop(event) {
    if (event.matches) {
      setMenuState(false);
    }
  }

  toggle.addEventListener('click', function () {
    setMenuState(toggle.getAttribute('aria-expanded') !== 'true');
  });

  if (close) {
    close.addEventListener('click', function () {
      setMenuState(false);
    });
  }

  menu.addEventListener('click', function (event) {
    if (event.target.closest('a')) {
      setMenuState(false);
    }
  });

  document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
      setMenuState(false);
    }
  });

  if (desktopQuery.addEventListener) {
    desktopQuery.addEventListener('change', closeOnDesktop);
  } else {
    desktopQuery.addListener(closeOnDesktop);
  }
})();
