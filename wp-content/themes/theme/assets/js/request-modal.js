(function () {
  const modal = document.querySelector('[data-request-modal-root]');
  const forms = document.querySelectorAll('[data-request-form]');
  const config = window.themeRequestModal || {};

  if (!modal && forms.length === 0) {
    return;
  }

  const modalForm = modal ? modal.querySelector('[data-request-modal-form]') : null;
  const modalStatus = modal ? modal.querySelector('[data-request-modal-status]') : null;
  const closeButtons = modal ? modal.querySelectorAll('[data-request-modal-close]') : [];
  const focusableSelector = 'a[href], button:not([disabled]), input:not([disabled]), select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"])';
  const initialModalStatus = modalStatus ? modalStatus.textContent : '';
  let lastFocusedElement = null;

  const getHash = function (href) {
    try {
      return new URL(href, window.location.href).hash;
    } catch (error) {
      return '';
    }
  };

  const isContactCta = function (trigger, hash) {
    if (hash !== '#contacts') {
      return false;
    }

    const text = trigger.textContent.trim();

    if (/whatsapp|telegram/i.test(text)) {
      return false;
    }

    return trigger.classList.contains('button--accent') && /(рассч|расчет|расчёт|стоим|заяв|связаться|производств|фото|обсудить)/i.test(text);
  };

  const findTrigger = function (target) {
    const trigger = target.closest('a, button');

    if (!trigger) {
      return null;
    }

    if (trigger.hasAttribute('data-request-modal')) {
      return trigger;
    }

    const href = trigger.getAttribute('href') || '';
    const hash = getHash(href);

    if (hash === '#request' || isContactCta(trigger, hash)) {
      return trigger;
    }

    return null;
  };

  const setOpenState = function (isOpen) {
    if (!modal) {
      return;
    }

    modal.hidden = !isOpen;
    modal.setAttribute('aria-hidden', isOpen ? 'false' : 'true');
    document.documentElement.classList.toggle('is-request-modal-open', isOpen);
    document.body.classList.toggle('is-request-modal-open', isOpen);
  };

  const openModal = function (trigger) {
    lastFocusedElement = document.activeElement;
    setOpenState(true);

    if (modalForm) {
      const pageInput = modalForm.elements.page;
      const contextInput = modalForm.elements.context;

      if (pageInput) {
        pageInput.value = window.location.href;
      }

      if (contextInput) {
        contextInput.value = trigger.dataset.requestModalContext || trigger.textContent.trim();
      }
    }

    window.setTimeout(function () {
      const firstInput = modal.querySelector('input[name="name"], input[name="phone"], button');

      if (firstInput) {
        firstInput.focus();
      }
    }, 20);
  };

  const resetModalDetails = function () {
    if (!modalForm) {
      return;
    }

    const details = modalForm.querySelector('.request-modal__details');

    if (details) {
      details.open = false;
    }
  };

  const closeModal = function () {
    setOpenState(false);
    resetModalDetails();

    if (modalStatus) {
      modalStatus.textContent = initialModalStatus;
      modalStatus.classList.remove('is-error', 'is-success');
    }

    if (lastFocusedElement && typeof lastFocusedElement.focus === 'function') {
      lastFocusedElement.focus();
    }
  };

  document.addEventListener('click', function (event) {
    if (!modal) {
      return;
    }

    const trigger = findTrigger(event.target);

    if (!trigger || modal.contains(trigger)) {
      return;
    }

    event.preventDefault();
    openModal(trigger);
  });

  closeButtons.forEach(function (button) {
    button.addEventListener('click', closeModal);
  });

  document.addEventListener('keydown', function (event) {
    if (!modal || modal.hidden) {
      return;
    }

    if (event.key === 'Escape') {
      closeModal();
      return;
    }

    if (event.key !== 'Tab') {
      return;
    }

    const focusable = Array.from(modal.querySelectorAll(focusableSelector)).filter(function (element) {
      return element.offsetParent !== null;
    });

    if (focusable.length === 0) {
      return;
    }

    const first = focusable[0];
    const last = focusable[focusable.length - 1];

    if (event.shiftKey && document.activeElement === first) {
      event.preventDefault();
      last.focus();
    } else if (!event.shiftKey && document.activeElement === last) {
      event.preventDefault();
      first.focus();
    }
  });

  forms.forEach(function (form) {
    const status = form.querySelector('[data-request-form-status]');
    const initialStatus = status ? status.textContent : '';

    form.addEventListener('submit', function (event) {
      event.preventDefault();

      const submit = form.querySelector('[type="submit"]');
      const formData = new FormData(form);

      if (!formData.get('action')) {
        formData.set('action', 'theme_request_form');
      }

      if (config.nonce && !formData.get('nonce')) {
        formData.set('nonce', config.nonce);
      }

      if (!formData.get('page')) {
        formData.set('page', window.location.href);
      }

      if (submit) {
        submit.disabled = true;
      }

      if (status) {
        status.textContent = 'Отправляем заявку...';
        status.classList.remove('is-error', 'is-success');
      }

      fetch(config.ajaxUrl || '/wp-admin/admin-ajax.php', {
        method: 'POST',
        credentials: 'same-origin',
        body: formData,
      })
        .then(function (response) {
          return response.json().then(function (data) {
            if (!response.ok || !data.success) {
              throw new Error(data && data.data && data.data.message ? data.data.message : 'Ошибка отправки.');
            }

            return data;
          });
        })
        .then(function (data) {
          if (status) {
            status.textContent = data.data && data.data.message ? data.data.message : 'Заявка отправлена.';
            status.classList.remove('is-error');
            status.classList.add('is-success');
          }

          form.reset();

          if (form.matches('[data-request-modal-form]')) {
            resetModalDetails();
          }
        })
        .catch(function (error) {
          if (status) {
            status.textContent = error.message || 'Не удалось отправить заявку.';
            status.classList.remove('is-success');
            status.classList.add('is-error');
          }
        })
        .finally(function () {
          if (submit) {
            submit.disabled = false;
          }
        });
    });
  });
}());
