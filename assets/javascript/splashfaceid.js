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
                    span.classList.add('fade');
                }, (span + 1) * 50);
            });
        }, 2000);
        
        setTimeout(() => {

            intro.style.top = '-100vh';
            
        }, 45000);

   });

});