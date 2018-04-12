$(document).ready( 
    
    setTimeout(function(){
    
    $('.content-form').css("opacity", "1");
    }, 100)
)

//Usuario

$('#Usuario').on('focus', function(){
    
    $('.lbl-Usuario').css("margin-top", "-20px");
    $('.lbl-Usuario').css("font-size", "14px");
})

$('#Usuario').on('focusout', function(){
    
    if($('#Usuario').val().length < 1){
        
        $('.lbl-Usuario').css("margin-top", "10px");
        $('.lbl-Usuario').css("font-size", "20px");
    }else{
        $('.lbl-Usuario').css("margin-top", "-20px");
    $('.lbl-Usuario').css("font-size", "14px");
    }
})

//Contraseña

$('#clave').on('focus', function(){
    
    $('.lbl-Contraseña').css("margin-top", "20px");
    $('.lbl-Contraseña').css("font-size", "14px");
})

$('#Contraseña').on('focusout', function(){
    
    if($('#Contraseña').val().length < 1){
        
        $('.lbl-Contraseña').css("margin-top", "50px");
        $('.lbl-Contraseña').css("font-size", "20px");
    }else{
        $('.lbl-Contraseña').css("margin-top", "20px");
    $('.lbl-Contraseña').css("font-size", "14px");
    }
})





