window.onscroll = function () {
  const header = this.document.querySelector('nav');
  const fixedNav = nav.offsetTop;

  if (window.pageYOffset > fixedNav) {
    header.classList.add('sticky-top');
  } else {
    header.classList.remove('sticky-top');
  }
};
