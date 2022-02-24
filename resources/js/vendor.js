import "../css/index.css";
import 'bootstrap';
/*import $ from "../lib/jquery-1.11.3.min.js";
window.jQuery = $;
window.$ = $;
*/
/*window.$ = window.jQuery = require('jquery');
require('bootstrap');
*/
var operaciones=require("./Inicio/index.js")
 
console.log(operaciones.suma(2,2));
console.log(operaciones.resta(5,2));

$(document).ready(function(){
alert("data 23123");
});
