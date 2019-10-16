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