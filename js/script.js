const slider = document.querySelector(".slider");
const prevBut = document.querySelector(".prev_but");
const nextBut = document.querySelector(".next_but");
const slides = Array.from(slider.querySelectorAll('dir'));
const slideCount = slides.length; 
let slideIndex = 0;

//События кнопок
prevBut.addEventListener('click', showPreviousSlide);
nextBut.addEventListener('click', shovNextSlide);

//Показ предыдущего слайда
function showPreviousSlide(){
    slideIndex = (slideIndex - 1 + slideCount) % slideCount;
    updeateSlider();
}

//Показ следующего слайда
function shovNextSlide(){
    slideIndex = (slideIndex + 1) % slideCount;
    updeateSlider();
}

//Обновление слайдера
function updeateSlider(){
    slides.forEach((slide, index) =>{
        if(index === slideIndex){
          slide.style.display = 'grid';
        }
        else{
          slide.style.display = 'none';
        }
      });
}

updeateSlider();