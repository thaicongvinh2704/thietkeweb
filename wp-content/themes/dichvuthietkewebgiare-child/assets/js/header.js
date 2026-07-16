(function () {
	'use strict';

	var header = document.querySelector('.brand-header');
	if (!header) {
		return;
	}

	var body = document.body;
	var menuToggle = header.querySelector('[data-menu-toggle]');
	var nav = header.querySelector('[data-primary-nav]');
	var menuOverlay = header.querySelector('[data-menu-overlay]');
	var submenuToggle = header.querySelector('.submenu-toggle');
	var submenu = header.querySelector('.services-mega');
	var servicesItem = header.querySelector('.menu-item-services');
	var hoverCloseTimer = null;

	var closeSubmenu = function (restoreFocus) {
		if (!submenuToggle || !submenu) {
			return;
		}
		window.clearTimeout(hoverCloseTimer);
		submenuToggle.setAttribute('aria-expanded', 'false');
		submenu.hidden = true;
		if (restoreFocus) {
			submenuToggle.focus();
		}
	};

	var openSubmenu = function (focusFirst) {
		if (!submenuToggle || !submenu) {
			return;
		}
		submenuToggle.setAttribute('aria-expanded', 'true');
		submenu.hidden = false;
		if (focusFirst) {
			var firstLink = submenu.querySelector('a');
			if (firstLink) {
				firstLink.focus();
			}
		}
	};

	if (submenuToggle && submenu) {
		submenuToggle.addEventListener('click', function () {
			if (submenuToggle.getAttribute('aria-expanded') === 'true') {
				closeSubmenu(false);
			} else {
				openSubmenu(false);
			}
		});

		submenuToggle.addEventListener('keydown', function (event) {
			if (event.key === 'ArrowDown') {
				event.preventDefault();
				openSubmenu(true);
			}
		});

		submenu.addEventListener('keydown', function (event) {
			if (event.key === 'Escape') {
				event.preventDefault();
				closeSubmenu(true);
			}
		});

		submenu.querySelectorAll('a').forEach(function (link) {
			link.addEventListener('click', function () {
				closeSubmenu(false);
			});
		});

		if (servicesItem && window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
			servicesItem.addEventListener('mouseenter', function () {
				window.clearTimeout(hoverCloseTimer);
				openSubmenu(false);
			});
			servicesItem.addEventListener('mouseleave', function () {
				hoverCloseTimer = window.setTimeout(function () {
					closeSubmenu(false);
				}, 140);
			});
		}
	}

	document.addEventListener('click', function (event) {
		if (submenu && servicesItem && !servicesItem.contains(event.target)) {
			closeSubmenu(false);
		}
	});

	var syncMenuState = function () {
		if (!menuToggle) {
			return;
		}
		var open = body.classList.contains('menu-open');
		var label = menuToggle.querySelector('.screen-reader-text');
		if (label) {
			label.textContent = open ? 'Đóng menu' : 'Mở menu';
		}
		if (!open) {
			closeSubmenu(false);
		}
	};

	if (menuToggle && nav) {
		menuToggle.addEventListener('click', function () {
			window.requestAnimationFrame(function () {
				syncMenuState();
				if (body.classList.contains('menu-open')) {
					var firstLink = nav.querySelector('a, button');
					if (firstLink) {
						firstLink.focus();
					}
				}
			});
		});

		nav.addEventListener('keydown', function (event) {
			if (event.key !== 'Tab' || !body.classList.contains('menu-open')) {
				return;
			}
			var focusable = Array.prototype.filter.call(
				nav.querySelectorAll('a[href], button:not([disabled])'),
				function (item) { return item.offsetParent !== null; }
			);
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

		nav.addEventListener('click', function (event) {
			if (event.target.closest('a')) {
				if (body.classList.contains('menu-open')) {
					menuToggle.click();
				}
				window.requestAnimationFrame(syncMenuState);
			}
		});
	}

	if (menuOverlay && menuToggle) {
		menuOverlay.addEventListener('click', function () {
			if (body.classList.contains('menu-open')) {
				menuToggle.click();
			}
		});
	}

	document.addEventListener('keydown', function (event) {
		if (event.key === 'Escape') {
			closeSubmenu(false);
			window.requestAnimationFrame(syncMenuState);
		}
	});

	window.addEventListener('resize', function () {
		if (window.innerWidth > 1024 && body.classList.contains('menu-open')) {
			body.classList.remove('menu-open');
			if (menuToggle) {
				menuToggle.setAttribute('aria-expanded', 'false');
			}
			syncMenuState();
		}
	});
})();
