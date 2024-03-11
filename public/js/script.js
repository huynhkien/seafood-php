// slider-banner
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("slides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
var myIndex = 0;
carousel();
function carousel() {
var i;
var x = document.getElementsByClassName("slides");
for (i = 0; i < x.length; i++) {
x[i].style.display = "none";  
}
myIndex++;
if (myIndex > x.length) {myIndex = 1}    
x[myIndex-1].style.display = "block";  
setTimeout(carousel, 4000); 
}
//product
let btnLeft = document.getElementById('btn--left');
let btnRight = document.getElementById('btn--right');
let slider = document.getElementById('slider');
btnLeft.onclick = () =>{
    slider.scrollLeft -=250;
}    
btnRight.onclick = () =>{
    slider.scrollLeft +=250;
} 
let sliderWidth = slider.scrollWidth -slider.clientWidth;
function autoPlay() {
    if (slider.scrollLeft > (sliderWidth - 1)){
        slider.scrollLeft -=sliderWidth;
    }else{
        slider.scrollLeft +=1
    }
} 
let play = setInterval( autoPlay, 100);

let isDragging = false, startX, startScrollLeft;

const dragStart =(e) => {
    isDragging=true;
    slider.classList.add("dragging");
    startX =e.pageX;
    startScrollLeft = slider.scrollLeft;
}
const dragging = (e) => {
    /*console.log(e.pageX);*/
    if(!isDragging) return;
    slider.scrollLeft= startScrollLeft - (e.pageX - startX);
}
const dragStop = () =>{
    isDragging =false;
    slider.classList.remove("dragging");
}
slider.addEventListener("mousedown",dragStart);
slider.addEventListener("mousemove",dragging);
document.addEventListener("mouseup",dragStop);
/* feedback*/
let slides = document.getElementById('slider--img');
let sliderWidthImg = slides.scrollWidth -slides.clientWidth;
function autoPlayImg() {
    if (slides.scrollLeft > (sliderWidthImg - 1)){
        slides.scrollLeft -=sliderWidthImg;
    }else{
        slides.scrollLeft +=1
    }
} 
let imgPlay = setInterval( autoPlayImg, 50);

let isDraggingImg = false, startXImg, startScrollLeftImg;

const dragStartImg =(e) => {
    isDraggingImg=true;
    slides.classList.add("draggingImg");
    startXImg =e.pageX;
    startScrollLeftImg = slides.scrollLeft;
}
const draggingImg = (e) => {
    /*console.log(e.pageX);*/
    if(!isDraggingImg) return;
    slides.scrollLeft= startScrollLeftImg - (e.pageX - startXImg);
}
const dragStopImg = () =>{
    isDraggingImg =false;
    slides.classList.remove("draggingImg");
}
slides.addEventListener("mousedown",dragStartImg);
slides.addEventListener("mousemove",draggingImg);
document.addEventListener("mouseup",dragStopImg);
//login
