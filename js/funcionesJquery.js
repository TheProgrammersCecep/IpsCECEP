function Inicio(){

	$(".collapse-item").click(function(e){
        e.preventDefault();
        $pagina = this.getAttribute('href')
        $(".pagina-inicio").load($pagina);
     });



}

$(document).ready(() => {
    $(".pagina-inicio").load("./php/Modulos/inicio.php");
});
