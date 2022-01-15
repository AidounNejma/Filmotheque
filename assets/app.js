/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */


// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';
// start the Stimulus application
import 'bootstrap';


/* Ajouts de ma part */

//Import du CSS de Bootstrap
import 'bootstrap/dist/css/bootstrap.css'

//Import du CSS de fontAwesome
import '@fortawesome/fontawesome-free/css/all.min.css'



/* API intersection observer */
/* Animation des blocs  */

/* Utilisation de l'API instersection Observer pour détecter quand un bloc est 
    visible à l'écran (voir tuto grafikart) */

    const ratio = .2
    const options = {
        root: null,
        rootMargin: '0px',
        threshold: ratio
    }
    
    const handleIntersect = function (entries, observer) {
        entries.forEach(function (entry) {
            if (entry.intersectionRatio > ratio) {
                entry.target.classList.add('reveal-visible')
                observer.unobserve(entry.target) //une fois que l'élément a été vu une fois, il ne fera plus aucun appel (éviter la répétition de l'animation)
            } 
        })
    }
    const observer = new IntersectionObserver(handleIntersect, options);
    document.querySelectorAll('[class*="reveal-"]').forEach(function (r){ /* boucle pour prendre plusieurs éléments dans l'animation */
        observer.observe(r)
    })
    