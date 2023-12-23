$(function () {
  const classActive = 'nav__link--active';
  const $navLinks = $('.nav .nav__link:not(.nav__link--disabled):not(.nav__link--never-active)');
  $navLinks.on('click', function () {
    $navLinks.removeClass(classActive);
    $(this).addClass(classActive);
 })
});