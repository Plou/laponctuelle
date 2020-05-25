'use strict'

// Website wide scripts
// @Author Dummy Team


const $homeSlide = document.querySelector('.background-slides')

if ($homeSlide) {
  const $slides = document.querySelectorAll('.background-slides__item')

  let $first = document.querySelector('.background-slides__item.is-first')

  $first.classList.add('is-active')
  $first.classList.remove('is-inactive')
  $first.classList.remove('is-first')

  let i = 0
  setInterval( () => {
    i = i < 4 ? i + 1 : 0
    $slides.forEach(el => {
      el.classList.remove('is-active')
      el.classList.add('is-inactive')
      setTimeout( () => {
        el.classList.remove('is-inactive')
      }, 5000)
    })
    $slides[i].classList.add('is-active')
    $slides[i].classList.remove('is-inactive')
  }, 8000)
}


const $artistSlide = document.querySelector('.artist-list')

if ($artistSlide) {
  const $slides = document.querySelectorAll('.artist__link')

  $artistSlide.addEventListener('mouseleave', function() {    
    $artistSlide.classList.remove('is-active')
    $slides.forEach($slide => {
      $slide.classList.remove('is-active')
    })
  })
  $artistSlide.addEventListener('mouseenter', function() {    
    $artistSlide.classList.add('is-active')
  })

  $slides.forEach($slide => {
    
    $slide.addEventListener('mouseenter', function() {
      $slides.forEach($slide => {
        $slide.classList.remove('is-active')
      })
      this.classList.add('is-active')
    })  
  })
}
