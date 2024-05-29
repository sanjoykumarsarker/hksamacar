$('document').ready(function(){


     
    //animated header class
    $(window).scroll(function () {
        if ($(window).scrollTop() > 100) {
            $(".navbar-default").addClass("animated");
        } else {
            $(".navbar-default").removeClass('animated');
        }
    });

let hero = $('#hero-area');    
const img = [
    "../images/jps1.jpg",
    "../images/jps2.png",
    "../images/jps3.jpg",
    "../images/jps4.jpg",
    "https://i2.wp.com/www.jayapatakaswami.com/wp-content/uploads/2015/04/184090_243927095637121_1378031_n.jpg",
    "https://upload.wikimedia.org/wikipedia/commons/thumb/3/34/JPS35.JPEG/1200px-JPS35.JPEG"
];
let i = 0;


}
setInterval(function(){
    i++;
    if (i == img.length) {
          i = 0;
     }
   hero.get(0).style.setProperty('--img', "url(" + img[i] + ")");
  
}, 5000);


});
