/**--------------Owl Carousel------------ */
$('.owl-carousel').owlCarousel({

    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 4
        }
    }
});
/**--------------Owl Carousel------------ */



/**--------------Toggle menu------------ */
var menuitems = document.getElementById("menuitms");

menuitems.style.maxHeight = "0px";

function menutoggle() {
    if (menuitems.style.maxHeight == "0px") {
        menuitems.style.maxHeight = "200px";
    }
    else {
        menuitems.style.maxHeight = "0px";
    }
}
/**--------------Toggle menu------------ */

/**--------------product gallery------- */
var productimg = document.getElementById("product-img");
var smallimg = document.getElementsByClassName("small-img");

smallimg[0].onclick = function(){
    productimg.src = smallimg[0].src;
}
smallimg[1].onclick = function(){
    productimg.src = smallimg[1].src;
}
smallimg[2].onclick = function(){
    productimg.src = smallimg[2].src;
}
smallimg[3].onclick = function(){
    productimg.src = smallimg[3].src;
}
/**--------------product gallery------- */

/**--------------Login & Regester------- */
var loginform = document.getElementById("login");
var regform = document.getElementById("regestrastion");
var indicator = document.getElementById("indicator");

function regestor(){
    regform.style.transform = "translateX(0px)";
    loginform.style.transform = "translateX(0px)";
}

function login(){
    regform.style.transform = "translateX(300px)";
    loginform.style.transform = "translateX(300px)";
}
/**--------------Login & Regester------- */