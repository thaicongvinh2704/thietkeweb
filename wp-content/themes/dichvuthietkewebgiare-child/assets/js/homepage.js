(function () {
	'use strict';

	var page = document.querySelector('.homepage-redesign');
	if (!page) {
		return;
	}

	var body = document.body;
	var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
	body.classList.add('hp-motion-ready');

	var revealItems = page.querySelectorAll('.reveal-up, .reveal-left, .reveal-right, .reveal-scale');
	if ('IntersectionObserver' in window && !reduceMotion.matches) {
		var revealObserver = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (!entry.isIntersecting) {
					return;
				}
				entry.target.classList.add('is-visible');
				revealObserver.unobserve(entry.target);
			});
		}, { threshold: 0.14, rootMargin: '0px 0px -28px' });

		revealItems.forEach(function (item, index) {
			item.style.transitionDelay = Math.min(index % 4, 3) * 65 + 'ms';
			revealObserver.observe(item);
		});
	} else {
		revealItems.forEach(function (item) {
			item.classList.add('is-visible');
		});
	}

	document.querySelectorAll('[data-open-consult]').forEach(function (button) {
		button.addEventListener('click', function () {
			var target = document.querySelector('#tu-van');
			if (target) {
				target.scrollIntoView({ behavior: reduceMotion.matches ? 'auto' : 'smooth', block: 'start' });
			}
		});
	});

	var getVisibleSlides = function () {
		if (window.innerWidth <= 768) {
			return 1;
		}
		if (window.innerWidth <= 1100) {
			return 2;
		}
		return 3;
	};

	var initCarousel = function (carousel) {
		var track = carousel.querySelector('.hp-carousel-track');
		var slides = Array.prototype.slice.call(track.querySelectorAll('.hp-slide'));
		var section = carousel.closest('section');
		var prev = section ? section.querySelector('[data-carousel-prev]') : null;
		var next = section ? section.querySelector('[data-carousel-next]') : null;
		var dots = carousel.querySelector('.hp-carousel-dots');
		var current = 0;
		var timer = 0;
		var paused = false;

		var maxIndex = function () {
			return Math.max(0, slides.length - getVisibleSlides());
		};

		var updateDots = function () {
			var buttons = dots.querySelectorAll('button');
			buttons.forEach(function (button, index) {
				var active = index === current;
				button.classList.toggle('is-active', active);
				button.setAttribute('aria-current', active ? 'true' : 'false');
			});
		};

		var goTo = function (index, smooth) {
			current = Math.max(0, Math.min(index, maxIndex()));
			var slide = slides[current];
			if (slide) {
				track.scrollTo({ left: slide.offsetLeft - track.offsetLeft, behavior: smooth && !reduceMotion.matches ? 'smooth' : 'auto' });
			}
			updateDots();
		};

		var renderDots = function () {
			dots.innerHTML = '';
			for (var index = 0; index <= maxIndex(); index += 1) {
				(function (dotIndex) {
					var dot = document.createElement('button');
					dot.type = 'button';
					dot.setAttribute('aria-label', 'Xem nhóm mẫu ' + (dotIndex + 1));
					dot.addEventListener('click', function () { goTo(dotIndex, true); });
					dots.appendChild(dot);
				})(index);
			}
			current = Math.min(current, maxIndex());
			updateDots();
		};

		var stop = function () {
			window.clearInterval(timer);
			timer = 0;
		};

		var start = function () {
			stop();
			if (reduceMotion.matches || paused || document.hidden || maxIndex() === 0) {
				return;
			}
			var delay = parseInt(carousel.getAttribute('data-autoplay'), 10) || 5200;
			timer = window.setInterval(function () {
				goTo(current >= maxIndex() ? 0 : current + 1, true);
			}, delay);
		};

		if (prev) {
			prev.addEventListener('click', function () { goTo(current <= 0 ? maxIndex() : current - 1, true); start(); });
		}
		if (next) {
			next.addEventListener('click', function () { goTo(current >= maxIndex() ? 0 : current + 1, true); start(); });
		}

		carousel.addEventListener('mouseenter', function () { paused = true; stop(); });
		carousel.addEventListener('mouseleave', function () { paused = false; start(); });
		carousel.addEventListener('focusin', function () { paused = true; stop(); });
		carousel.addEventListener('focusout', function (event) {
			if (!carousel.contains(event.relatedTarget)) {
				paused = false;
				start();
			}
		});

		var resizeTimer = 0;
		window.addEventListener('resize', function () {
			window.clearTimeout(resizeTimer);
			resizeTimer = window.setTimeout(function () { renderDots(); goTo(current, false); start(); }, 150);
		});
		document.addEventListener('visibilitychange', start);
		reduceMotion.addEventListener('change', start);

		renderDots();
		start();
	};

	page.querySelectorAll('[data-carousel]').forEach(initCarousel);

	var tabs = Array.prototype.slice.call(page.querySelectorAll('[role="tab"]'));
	var selectTab = function (tab, focus) {
		tabs.forEach(function (item) {
			var selected = item === tab;
			item.setAttribute('aria-selected', selected ? 'true' : 'false');
			item.setAttribute('tabindex', selected ? '0' : '-1');
			var panel = document.getElementById(item.getAttribute('aria-controls'));
			if (panel) {
				panel.hidden = !selected;
			}
		});
		if (focus) {
			tab.focus();
		}
	};

	tabs.forEach(function (tab, index) {
		tab.addEventListener('click', function () { selectTab(tab, false); });
		tab.addEventListener('keydown', function (event) {
			var nextIndex = index;
			if (event.key === 'ArrowDown' || event.key === 'ArrowRight') {
				nextIndex = (index + 1) % tabs.length;
			} else if (event.key === 'ArrowUp' || event.key === 'ArrowLeft') {
				nextIndex = (index - 1 + tabs.length) % tabs.length;
			} else if (event.key === 'Home') {
				nextIndex = 0;
			} else if (event.key === 'End') {
				nextIndex = tabs.length - 1;
			} else {
				return;
			}
			event.preventDefault();
			selectTab(tabs[nextIndex], true);
		});
	});

	var timeline = page.querySelector('[data-timeline]');
	if (timeline) {
		if ('IntersectionObserver' in window && !reduceMotion.matches) {
			var timelineObserver = new IntersectionObserver(function (entries) {
				if (entries[0].isIntersecting) {
					timeline.classList.add('is-visible');
					timelineObserver.disconnect();
				}
			}, { threshold: 0.18 });
			timelineObserver.observe(timeline);
		} else {
			timeline.classList.add('is-visible');
		}
	}

	var counter = page.querySelector('[data-counter]');
	if (counter) {
		var runCounter = function () {
			var target = parseInt(counter.getAttribute('data-counter'), 10) || 0;
			if (reduceMotion.matches) {
				counter.textContent = target;
				return;
			}
			var startTime = performance.now();
			var duration = 1400;
			var tick = function (now) {
				var progress = Math.min(1, (now - startTime) / duration);
				var eased = 1 - Math.pow(1 - progress, 3);
				counter.textContent = Math.round(target * eased);
				if (progress < 1) {
					window.requestAnimationFrame(tick);
				}
			};
			window.requestAnimationFrame(tick);
		};

		if ('IntersectionObserver' in window) {
			var counterObserver = new IntersectionObserver(function (entries) {
				if (entries[0].isIntersecting) {
					runCounter();
					counterObserver.disconnect();
				}
			}, { threshold: 0.35 });
			counterObserver.observe(counter);
		} else {
			runCounter();
		}
	}

	var projectSlider = page.querySelector('[data-project-slider]');
	if (projectSlider) {
		var projectTrack = projectSlider.querySelector('.hp-project-track');
		var projectSlides = projectTrack.querySelectorAll('figure');
		var projectIndex = 0;
		var moveProject = function (direction) {
			projectIndex = (projectIndex + direction + projectSlides.length) % projectSlides.length;
			projectTrack.scrollTo({ left: projectSlides[projectIndex].offsetLeft - projectTrack.offsetLeft, behavior: reduceMotion.matches ? 'auto' : 'smooth' });
		};
		projectSlider.querySelector('[data-project-prev]').addEventListener('click', function () { moveProject(-1); });
		projectSlider.querySelector('[data-project-next]').addEventListener('click', function () { moveProject(1); });
	}

	var animateAnswer = function (answer, opening) {
		if (reduceMotion.matches || typeof answer.animate !== 'function') {
			answer.hidden = !opening;
			return;
		}

		if (opening) {
			answer.hidden = false;
			var openHeight = answer.scrollHeight;
			var openAnimation = answer.animate(
				[{ height: '0px', opacity: 0 }, { height: openHeight + 'px', opacity: 1 }],
				{ duration: 260, easing: 'ease-out' }
			);
			openAnimation.onfinish = function () { answer.style.height = ''; };
		} else {
			var closeHeight = answer.scrollHeight;
			var closeAnimation = answer.animate(
				[{ height: closeHeight + 'px', opacity: 1 }, { height: '0px', opacity: 0 }],
				{ duration: 180, easing: 'ease-in' }
			);
			closeAnimation.onfinish = function () { answer.hidden = true; answer.style.height = ''; };
		}
	};

	page.querySelectorAll('.hp-faq-question').forEach(function (button) {
		button.addEventListener('click', function () {
			var willOpen = button.getAttribute('aria-expanded') !== 'true';
			page.querySelectorAll('.hp-faq-question[aria-expanded="true"]').forEach(function (openButton) {
				if (openButton === button) {
					return;
				}
				openButton.setAttribute('aria-expanded', 'false');
				var openAnswer = document.getElementById(openButton.getAttribute('aria-controls'));
				if (openAnswer) {
					animateAnswer(openAnswer, false);
				}
			});
			button.setAttribute('aria-expanded', willOpen ? 'true' : 'false');
			var answer = document.getElementById(button.getAttribute('aria-controls'));
			if (answer) {
				animateAnswer(answer, willOpen);
			}
		});
	});

	var backToTop = page.querySelector('[data-back-to-top]');
	if (backToTop) {
		var updateBackToTop = function () {
			backToTop.classList.toggle('is-visible', window.scrollY > 650);
		};
		window.addEventListener('scroll', updateBackToTop, { passive: true });
		backToTop.addEventListener('click', function () {
			window.scrollTo({ top: 0, behavior: reduceMotion.matches ? 'auto' : 'smooth' });
		});
		updateBackToTop();
	}

	var form = page.querySelector('[data-home-form]');
	if (form) {
		var validateField = function (field) {
			var message = '';
			if (field.validity.valueMissing) {
				message = field.type === 'checkbox' ? 'Vui lòng xác nhận đồng ý.' : 'Vui lòng nhập thông tin này.';
			} else if (field.validity.typeMismatch) {
				message = 'Thông tin chưa đúng định dạng.';
			}
			field.setAttribute('aria-invalid', message ? 'true' : 'false');
			var label = field.closest('label');
			var error = label ? label.querySelector('.hp-field-error') : null;
			if (error) {
				error.textContent = message;
			}
			return !message;
		};

		form.querySelectorAll('input, textarea, select').forEach(function (field) {
			field.addEventListener('blur', function () { validateField(field); });
		});

		form.addEventListener('submit', function (event) {
			var fields = Array.prototype.slice.call(form.querySelectorAll('input:not([type="hidden"]), textarea, select'));
			var invalid = fields.filter(function (field) { return !validateField(field); });
			if (invalid.length) {
				event.preventDefault();
				invalid[0].focus();
				var live = form.querySelector('.hp-form-live');
				if (live) {
					live.textContent = 'Vui lòng kiểm tra ' + invalid.length + ' trường chưa hợp lệ.';
				}
				return;
			}
			var submit = form.querySelector('button[type="submit"]');
			if (submit) {
				submit.classList.add('is-loading');
				submit.disabled = true;
				submit.querySelector('span').textContent = 'Đang gửi yêu cầu';
			}
		});
	}

	var menuToggle = document.querySelector('[data-menu-toggle]');
	var nav = document.querySelector('[data-primary-nav]');
	if (menuToggle && nav) {
		document.addEventListener('keydown', function (event) {
			if (event.key !== 'Tab' || !body.classList.contains('menu-open')) {
				return;
			}
			var focusable = nav.querySelectorAll('a[href], button:not([disabled])');
			if (!focusable.length) {
				return;
			}
			var first = focusable[0];
			var last = focusable[focusable.length - 1];
			if (event.shiftKey && document.activeElement === first) {
				event.preventDefault();
				menuToggle.focus();
			} else if (!event.shiftKey && document.activeElement === last) {
				event.preventDefault();
				menuToggle.focus();
			}
		});
	}
})();
