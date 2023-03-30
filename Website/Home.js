$(document).ready(function() {
  // select the carousel container
  const carousel = $('.carousel-container');

  // select the prev and next buttons
  const prevButton = carousel.find('.carousel-prev');
  const nextButton = carousel.find('.carousel-next');

  // select all the slides
  const slides = carousel.find('.carousel-slide img');

  // set the starting slide index
  let slideIndex = 0;

  // function to show the current slide
  function showSlide() {
    // hide all the slides
    slides.hide();
    // show the current slide
    slides.eq(slideIndex).show();
  }

  // function to show the next slide
  function nextSlide() {
    // increase the slide index
    slideIndex++;
    // check if the slide index is greater than or equal to the number of slides
    if (slideIndex >= slides.length) {
      // if it is, reset the slide index to 0
      slideIndex = 0;
    }
    // show the current slide
    showSlide();
  }

  // function to show the previous slide
  function prevSlide() {
    // decrease the slide index
    slideIndex--;
    // check if the slide index is less than 0
    if (slideIndex < 0) {
      // if it is, set the slide index to the last slide
      slideIndex = slides.length - 1;
    }
    // show the current slide
    showSlide();
  }

  // add click event listener to the prev and next buttons
  prevButton.on('click', prevSlide);
  nextButton.on('click', nextSlide);

  // show the first slide
  showSlide();
});

$(document).ready(function() {
  // smooth scroll to section when nav link is clicked
  $('nav a').on('click', function(e) {
    e.preventDefault();
    const target = $(this).attr('href');
    $('html, body').animate({
      scrollTop: $(target).offset().top
    }, 1000);
  });
});
