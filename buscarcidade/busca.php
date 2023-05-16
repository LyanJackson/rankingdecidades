<?php 
include '../../../web/seguranca.php';


$notas = ($_POST['notas']);
$notasex = ($_POST['notasex']);
$_POST['buscaNome_escola'] = htmlentities($_POST['buscaNome_escola']);
$_POST['buscaNome_escolas'] = htmlentities($_POST['buscaNome_escolas']);

$query = "SELECT * FROM cidades WHERE nome_cidade LIKE '%". $_POST['buscaNome_escola']."%' AND nome_escolas LIKE '%". $_POST['buscaNome_escolas']."%'";


//////////////////////////////////////NOTAS INTERNAS//////////////////////////////

if(isset($_POST['notas'])){
    if(($_POST['notas']) == 'maior'){
        $query .= " ORDER BY nota_pfc DESC";
    } elseif(($_POST['notas']) == 'menor'){
        $query .= " ORDER BY nota_pfc ASC";
    } else {
    }
}


if(isset($_POST['ano'])){
    if(($_POST['ano']) == 2022){
        $query .= " AND escola_medias.ano LIKE '%". $_POST['ano'] . "%' ";
    } elseif(($_POST['ano']) == 2023){
        $query .= " AND escola_medias.ano LIKE '%". $_POST['ano'] . "%' ";
    } 
}


//////////////////////////////////////NOTAS EXTERNAS//////////////////////////////

if(isset($_POST['notasex'])){
    if(($_POST['notasex']) == 'maiorex'){
        $query .= " ORDER BY notas_externas DESC";
    } elseif(($_POST['notasex']) == 'menorex'){
        $query .= " ORDER BY notas_externas ASC";
    
    } else {

    }
}

// echo '<script>alert("'.$query.'")</script>';


$cidades = mysqli_query($_SG['link'], $query);

echo '<br><p class="text-left"><b>'.mysqli_num_rows($cidades).'</b> resultados encontrados</p><hr>';

if (mysqli_num_rows($cidades) != 0){
    while ($cidade = mysqli_fetch_assoc($cidades)) {




            
        echo '<div class="buscaContainer equipeContainer">

        <div align="left" class="equipeSobre col-md-8"><br>
            <h4><b>'.$cidade['nome_cidade'].'</b></h4>
         <p><b>Estado:</b> '.$cidade['estado'].'</p>
        <p><span><b>ESCOLAS ATIVAS: </b>'.$cidade['num_escolas'].'</span>
     <p><span><b>ESCOLAS: </b>'.$cidade['nome_escolas'].'</span>
     <p><b>Supervisores:</b> '.$cidade['supervisor'].'</p>
        <p><span style="color: green;"><b>MÉDIA DAS ESCOLAS DO PFC: </b>'.$cidade['nota_pfc'].'</span>
        </div>

        <div class="equipeMenu col-md-2 pull-right" style=" margin-right: 30px;">
            <a href="?p=ver&r='.$cidade['id_cidade'].'" class="btn btn-success btn-block"><span class="pull-left glyphicon glyphicon-eye-open"></span> Ver
            </a> ';
            if($_SESSION['h'] != 7):
            echo '<a href="?p=editar&r='.$cidade['id_cidade'].'" class="btn btn-warning btn-block"><span class="pull-left glyphicon glyphicon-pencil"></span> Editar
            </a> 
          
            </form>
            '; endif; echo '
        </div>


     </div>';


        }
} else {
        echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign"></span> Nenhum resultado encontrado</div>';
}
 ?>

 <script>
            $('.desativar').click(function () {
                var $id = $(this).attr('id');
                var $ativo = $('#input'+$id).val();

                var data = $('.formsHidden'+ $id).serialize();

                $.ajax({
                    url: '<?php echo $root_html?>sistema/nucleos/buscar/desativar.php',
                    type: 'POST',
                    data: data,
                    beforeSend: function (e) {
                        if($ativo == 1)
                            $("#"+$id).html("Desativando...");
                        else
                            $("#"+$id).html("Ativando...");                        
                    },
                    success: function (data) {
                    setTimeout(function() {$('#'+$id).html(data);}, 1000);
                    },
                    complete: function (e) {
                        if($ativo == 1)
                            $("#input"+$id).val(0);
                        else
                            $("#input"+$id).val(1);         
                    },
                    error: function (e) {
                        $('#resultado1').html("<option>Nenhum resultado encontrado.</option>");
                    },
                });

            });

</script>