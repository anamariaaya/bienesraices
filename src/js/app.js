document.addEventListener('DOMContentLoaded', function(){
    eventListeners();

    darkMode();
});

function darkMode(){

    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark');
    //Si tiene dark mode en el navegador
    if(prefiereDarkMode.matches){
        document.body.classList.add('.dark-mode');
    } else{
        document.body.classList.remove('.dark-mode');
    }

    prefiereDarkMode.addEventListener('change', function(){
        if(prefiereDarkMode.matches){
            document.body.classList.add('.dark-mode');
        } else{
            document.body.classList.remove('.dark-mode');
        }
    });

    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
        botonDarkMode.classList.toggle('light');

        if (document.body.classList.contains('dark-mode')) {
            localStorage.setItem('modo-oscuro','true');
        } else {
            localStorage.setItem('modo-oscuro','false');
        }

    });

    if (localStorage.getItem('modo-oscuro') === 'true') {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }
}

function eventListeners(){
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);
}

function navegacionResponsive(){
    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostrar');
}

// function navegacionResponsive(){
//     const navegacion = document.querySelector('.navegacion');

//     if(navegacion.classList.contains('mostrar')){
//         navegacion.classList.remove('mostrar');
//     } else{
//         navegacion.classList.add('mostrar');
//     }
// }