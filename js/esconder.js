  $(document).ready(function() {
    $("#MostrarMensagem").click(MostrarMensagem);
    $("#EsconderMensagem").click(EsconderMensagem);
    $("#MostrarEsconderMensagem").click(MostrarEsconderMensagem);
    });
 
    function MostrarMensagem(){
        $("#Mensagem").show();
    }
    function EsconderMensagem(){
        $("#Mensagem").hide();
    }
    function MostrarEsconderMensagem(){
        $("#Mensagem").toggle();
    }