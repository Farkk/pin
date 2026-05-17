(function () {
  var root = document.querySelector('[data-social-float]');

  if (!root) {
    return;
  }

  var toggle = root.querySelector('[data-social-float-toggle]');
  var panel = root.querySelector('[data-social-float-panel]');

  if (!toggle || !panel) {
    return;
  }

  function setOpen(isOpen) {
    root.classList.toggle('is-open', isOpen);
    panel.hidden = !isOpen;
    toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
  }

  toggle.addEventListener('click', function () {
    setOpen(toggle.getAttribute('aria-expanded') !== 'true');
  });

  panel.addEventListener('click', function (event) {
    if (event.target.closest('a')) {
      setOpen(false);
    }
  });

  document.addEventListener('click', function (event) {
    if (!root.contains(event.target)) {
      setOpen(false);
    }
  });

  document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
      setOpen(false);
    }
  });
})();
