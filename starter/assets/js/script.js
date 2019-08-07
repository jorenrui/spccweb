function toggleNavResponsive() {
    let siteNav = document.getElementById('siteNav');

    if (siteNav.className === 'site-nav') {
        siteNav.className += ' responsive';
    } else {
        siteNav.className = 'site-nav';
    }

    let navIcon = document.getElementById('navIcon');

    if (navIcon.className === 'fa fa-2x fa-bars') {
        navIcon.className = ' fa fa-2x fa-times';
    } else {
        navIcon.className = 'fa fa-2x fa-bars';
    }
}

$('.tab-nav a').click(function (e) {
    e.preventDefault();
    const target = $(this).data("target");
    $('.tab-content > div').removeClass("tab-current");
    $(target).addClass("tab-current");
});

(() => {
    'use strict';

    // Particles.js - Site header bg config
    let particles = Particles.init({
        selector: '.particles-background',
        color: '#f2f2f2',
        connectParticles: true,
        maxParticles: 100,
        responsive: [{
                breakpoint: 1023,
                options: {
                    maxParticles: 50
                }
            },
            {
                breakpoint: 500,
                options: {
                    maxParticles: 30,
                    connectParticles: false
                }
            },
            {
                breakpoint: 320,
                options: {
                    maxParticles: 0
                }
            }
        ]
    });

})();