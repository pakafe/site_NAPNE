$(document).ready(function(){
    
    /* ao clicar na div com id="box" executa a função */
    $("#box").click(function(){
        
        /* a função muda o background da div com id="box" */    
        $("body").css("background","yellow");
        
    });

    $("#box1").click(function(){
        
        /* a função muda o background da div com id="box" */    
        $("body").css("background","white");
        
    });
    
});