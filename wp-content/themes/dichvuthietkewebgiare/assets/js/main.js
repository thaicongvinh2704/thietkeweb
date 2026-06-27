(function () {
	'use strict';

	var body = document.body;
	body.classList.add('reveal-ready');

	var toggle = document.querySelector('[data-menu-toggle]');
	var nav = document.querySelector('[data-primary-nav]');

	if (toggle && nav) {
		var closeMenu = function () {
			body.classList.remove('menu-open');
			toggle.setAttribute('aria-expanded', 'false');
		};

		var openMenu = function () {
			body.classList.add('menu-open');
			toggle.setAttribute('aria-expanded', 'true');
		};

		toggle.addEventListener('click', function (event) {
			event.stopPropagation();
			if (body.classList.contains('menu-open')) {
				closeMenu();
			} else {
				openMenu();
			}
		});

		nav.addEventListener('click', function (event) {
			if (event.target && event.target.tagName === 'A') {
				closeMenu();
			}
		});

		document.addEventListener('click', function (event) {
			if (!body.classList.contains('menu-open')) {
				return;
			}
			if (!nav.contains(event.target) && !toggle.contains(event.target)) {
				closeMenu();
			}
		});

		document.addEventListener('keydown', function (event) {
			if (event.key === 'Escape') {
				closeMenu();
			}
		});
	}

	var header = document.querySelector('[data-header]');
	var updateHeader = function () {
		if (!header) {
			return;
		}
		header.classList.toggle('is-scrolled', window.scrollY > 8);
	};
	updateHeader();
	window.addEventListener('scroll', updateHeader, { passive: true });

	var revealItems = document.querySelectorAll('.reveal');
	if ('IntersectionObserver' in window && revealItems.length) {
		var observer = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					entry.target.classList.add('is-visible');
					observer.unobserve(entry.target);
				}
			});
		}, { threshold: 0.12 });

		revealItems.forEach(function (item) {
			observer.observe(item);
		});
	} else {
		revealItems.forEach(function (item) {
			item.classList.add('is-visible');
		});
	}

	document.querySelectorAll('.faq-item').forEach(function (item) {
		item.addEventListener('toggle', function () {
			if (!item.open) {
				return;
			}
			document.querySelectorAll('.faq-item[open]').forEach(function (other) {
				if (other !== item) {
					other.open = false;
				}
			});
		});
	});
})();
