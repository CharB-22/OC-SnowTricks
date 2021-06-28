/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';
import { Tooltip, Toast, Popover } from 'bootstrap';
// start the Stimulus application
import './bootstrap';
 
const $ = require('jquery');



const newItem = (e) => {
    
    const collectionHolder = document.querySelector(e.currentTarget.dataset.collection);
    const item = document.createElement("div");
    item.classList.add("col-11");
    
    item.innerHTML = collectionHolder.dataset.prototype.replace(
        /__name__/g,
        collectionHolder.dataset.index
    );

    item.querySelector('.btn-remove').addEventListener("click", () => item.remove());
    
    collectionHolder.appendChild(item);
    collectionHolder.dataset.index++;
}


document
.querySelectorAll('.btn-remove')
.forEach(btn => btn.addEventListener("click", e => e.currentTarget.closest("col").remove()));

document
.querySelectorAll('.btn-new')
.forEach( btn => btn.addEventListener("click", newItem));


// jQuery section - the loadmore button
$(function(){
    $(".trick").slice(0, 4).show();
    $("#loadmore").on("click", function(e){
         e.preventDefault();
         // Display more tricks when available
         $(".trick:hidden").slice(0, 4).slideDown();
         
         // If no more tricks - disabled button
         if($(".trick:hidden").length == 0) {
             $("#loadmore").addClass("disabled");
         }
    });
});