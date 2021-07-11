/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import "./styles/app.scss";
import { Tooltip, Toast, Popover } from "bootstrap";
// start the Stimulus application
import "./bootstrap";
 
const $ = require("jquery");


// Generate embedded forms for Image and video collection

const newItem = (e) => {
    
    const collectionHolder = document.querySelector(e.currentTarget.dataset.collection);
    const item = document.createElement("div");
    item.classList.add("col-11");
    
    item.innerHTML = collectionHolder.dataset.prototype.replace(
        /__name__/g,
        collectionHolder.dataset.index
    );

    item.querySelector(".btn-remove").addEventListener("click", () => item.remove());
    
    collectionHolder.appendChild(item);
    collectionHolder.dataset.index++;
};


document
.querySelectorAll(".btn-remove")
.forEach((btn) => btn.addEventListener("click", e => e.currentTarget.closest("col").remove()));

document
.querySelectorAll(".btn-new")
.forEach( (btn) => btn.addEventListener("click", newItem));

// Display the input field for the current trick Image/Video to edit
const editMedia = (e) => {
    // Create the input element
    let uploadField = document.querySelector(".uploadField");
    if (uploadField.classList.contains("visually-hidden"))
    {
        uploadField.classList.remove("visually-hidden");
    }
    else
    {
        uploadField.classList.add("visually-hidden");
    }
    
};

document
.querySelectorAll(".editMedia")
.forEach( (btn) => btn.addEventListener("click", editMedia));

// Remove the current image from the trick Form - only possible for saved images
document
.querySelectorAll(".deleteMedia")
.forEach((btn) => btn.addEventListener("click", e  => e.currentTarget.closest("div").remove()));

// jQuery section - the loadmore button
$(function(){
    $(".trick").slice(0, 4).show();
    $("#loadmore").on("click", function(e){
         e.preventDefault();
         // Display more tricks when available
         $(".trick:hidden").slice(0, 4).slideDown();
         
         // If no more tricks - disabled button
         if($(".trick:hidden").length === 0) {
             $("#loadmore").addClass("disabled");
         }
    });
});

// Manage the media display for trick details on mobile
const displayMedia = (e) => {
    let mobileCaroussel = document.getElementById("mobileMediaList");

    if (mobileCaroussel.classList.contains("visually-hidden"))
    {
        mobileCaroussel.classList.remove("visually-hidden");
    }
    else
    {
        mobileCaroussel.classList.add("visually-hidden");
    }

};

document
.getElementById("moreMedia").addEventListener("click", displayMedia);

