let intro = document.querySelector('.intro');
let logo = document.querySelector('.logo');
let logoSapan = document.querySelectorAll('.logo-parts');

window.addEventListener('DOMContentLoaded', () => {

   setTimeout(() => {
    logoSapan.forEach((span, index) => {
        setTimeout(() => {
            span.classList.add('active');
        }, (index + 1) *100);
    });

    setTimeout(() => {
        logoSapan.forEach((span, index) =>{
            setTimeout(() => {
                span.classList.remove('active');
                span.classList.add('inactive');
            }, (index + 1) * 100);
        });
    }, 3000);

    setTimeout(() => {
        logoSapan.forEach((span, index) =>{
            setTimeout(() => {
                span.classList.remove('inactive');
                span.classList.add('active');
            }, (index + 1) * 100);
        });
    }, 6000);

    setTimeout(() => {
        logoSapan.forEach((span, index) =>{
            setTimeout(() => {
                span.classList.remove('active');
                span.classList.add('fade');
            }, (index + 1) * 100);
        });
    }, 9000);

    setTimeout(() => {
        logoSapan.forEach((span, index) =>{
            setTimeout(() => {
                span.classList.remove('fade');
                span.classList.add('active');
            }, (index + 1) * 100);
        });
    }, 12000);
        
        setTimeout(() => {

            intro.style.top = '-100vh';
            
        }, 20000);

   });

});