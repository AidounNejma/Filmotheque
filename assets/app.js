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

//Import de Jquery pour Bootstrap
const $ = require('jquery');
// fixe le problème d'utilisation tardive de jQuery 
global.$ = global.jQuery = $;
require('bootstrap');

//Import du CSS de fontAwesome
import '@fortawesome/fontawesome-free/css/all.min.css'
