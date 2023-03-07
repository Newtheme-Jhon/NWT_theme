$ = jQuery.noConflict();

$(document).ready(function(){

    //Ajuste menu
    $('.navbar-nav li').addClass('nav-item');
    $('.navbar-nav li a').addClass('nav-link');

    //Ajuste redes sociales
    let item = $('.menu-sociales li a');
    itemMenu(item);

    //Aquí nuestro código

    
})

function itemMenu(item){
    //testing
    //console.log(item);

    for( let i = 0; i < item.length; i++ ){

        let icon = item[i].innerHTML.toLowerCase();

        if(icon == 'facebook'){
            icon = item[i].innerHTML = '<i class="fa-brands fa-facebook"></i>';
        }else if(icon == 'instagram'){
            icon = item[i].innerHTML = '<i class="fa-brands fa-instagram"></i>';
        }else if(icon == 'youtube'){
            icon = item[i].innerHTML = '<i class="fa-brands fa-youtube"></i>';
        }else if(icon == 'linkedin'){
            icon = item[i].innerHTML = '<i class="fa-brands fa-linkedin"></i>';
        }else{
            return icon;
        }

    }
}