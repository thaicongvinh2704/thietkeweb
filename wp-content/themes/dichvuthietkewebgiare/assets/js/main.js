(function () {
	'use strict';

	var body = document.body;
	var header = document.querySelector('[data-header]');
	var menuToggle = document.querySelector('[data-menu-toggle]');
	var nav = document.querySelector('[data-primary-nav]');
	var modal = document.querySelector('[data-consult-modal]');
	var lastFocus = null;

	body.classList.add('reveal-ready');

	var setHeaderState = function () {
		if (header) {
			header.classList.toggle('is-scrolled', window.scrollY > 20);
		}
	};

	setHeaderState();
	window.addEventListener('scroll', setHeaderState, { passive: true });

	var closeMenu = function () {
		body.classList.remove('menu-open');
		if (menuToggle) {
			menuToggle.setAttribute('aria-expanded', 'false');
		}
	};

	if (menuToggle && nav) {
		menuToggle.addEventListener('click', function () {
			var open = !body.classList.contains('menu-open');
			body.classList.toggle('menu-open', open);
			menuToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
		});

		nav.addEventListener('click', function (event) {
			if (event.target && event.target.tagName === 'A') {
				closeMenu();
			}
		});
	}

	document.querySelectorAll('a[href^="#"]').forEach(function (link) {
		link.addEventListener('click', function (event) {
			var id = link.getAttribute('href');
			var target = id && id.length > 1 ? document.querySelector(id) : null;
			if (!target) {
				return;
			}
			event.preventDefault();
			target.scrollIntoView({ behavior: 'smooth', block: 'start' });
		});
	});

	var revealItems = document.querySelectorAll('.reveal');
	if ('IntersectionObserver' in window && revealItems.length) {
		var revealObserver = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					entry.target.classList.add('is-visible');
					revealObserver.unobserve(entry.target);
				}
			});
		}, { threshold: 0.12, rootMargin: '0px 0px -40px' });

		revealItems.forEach(function (item, index) {
			item.style.transitionDelay = Math.min(index % 6, 5) * 45 + 'ms';
			revealObserver.observe(item);
		});
	} else {
		revealItems.forEach(function (item) {
			item.classList.add('is-visible');
		});
	}

	var openModal = function (trigger) {
		if (!modal) {
			return;
		}
		lastFocus = trigger || document.activeElement;
		modal.hidden = false;
		body.classList.add('modal-open');
		var first = modal.querySelector('input, textarea, select, button');
		if (first) {
			first.focus();
		}
	};

	var closeModal = function () {
		if (!modal || modal.hidden) {
			return;
		}
		modal.hidden = true;
		body.classList.remove('modal-open');
		if (lastFocus && typeof lastFocus.focus === 'function') {
			lastFocus.focus();
		}
	};

	document.querySelectorAll('[data-open-consult]').forEach(function (button) {
		button.addEventListener('click', function () {
			openModal(button);
		});
	});

	document.querySelectorAll('[data-close-consult]').forEach(function (button) {
		button.addEventListener('click', closeModal);
	});

	if (modal) {
		modal.addEventListener('keydown', function (event) {
			if (event.key === 'Escape') {
				closeModal();
				return;
			}
			if (event.key !== 'Tab') {
				return;
			}
			var focusable = modal.querySelectorAll('a[href], button:not([disabled]), input:not([disabled]), textarea:not([disabled]), select:not([disabled])');
			if (!focusable.length) {
				return;
			}
			var first = focusable[0];
			var last = focusable[focusable.length - 1];
			if (event.shiftKey && document.activeElement === first) {
				event.preventDefault();
				last.focus();
			} else if (!event.shiftKey && document.activeElement === last) {
				event.preventDefault();
				first.focus();
			}
		});
	}

	document.querySelectorAll('.faq-question').forEach(function (button) {
		button.addEventListener('click', function () {
			var expanded = button.getAttribute('aria-expanded') === 'true';
			document.querySelectorAll('.faq-question[aria-expanded="true"]').forEach(function (openButton) {
				if (openButton !== button) {
					openButton.setAttribute('aria-expanded', 'false');
					var openAnswer = openButton.closest('.faq-item').querySelector('.faq-answer');
					if (openAnswer) {
						openAnswer.hidden = true;
					}
				}
			});
			button.setAttribute('aria-expanded', expanded ? 'false' : 'true');
			var answer = button.closest('.faq-item').querySelector('.faq-answer');
			if (answer) {
				answer.hidden = expanded;
			}
		});
	});

	document.addEventListener('keydown', function (event) {
		if (event.key === 'Escape') {
			closeMenu();
			closeModal();
		}
	});
})();
