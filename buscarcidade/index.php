<?php include '../../../web/seguranca.php'; 

$title = "AdminPFC - Cidades";

// protegePaginaUnica(901, 3);
protectPage("3;901;902;7;8");

if (isset($_GET['p']) && isset($_GET['r'])){
    $p = $_GET['p'];
    $r = $_GET['r'];
}
include '../../head.php';
?>
<body class="hold-transition skin-black sidebar-mini fixed">

    <div class="wrapper">

    <?php include '../../menu.php'; ?>

        <div class="content-wrapper">
            <?php if($_SESSION['h'] == 8): 
?>
<!----------------------------------- DIRETOR/ESCOLA PAGINA DIFERENTE------------------------------------------------->
            <section class="content-header">
                <?php if(!isset($p)): ?>
                    <a href="<?php echo $root_html ?>sistema/" class="btn btn-default"><i class="fa fa-arrow-left"></i>&ensp;Voltar</a>                
                <?php elseif(isset($p)): ?>
                    <a href="<?php echo $root_html ?>sistema/" class="btn btn-default"><i class="fa fa-arrow-left"></i>&ensp;Voltar</a>                
                <?php endif; ?>

                <ol class="breadcrumb">
                <li><a href="<?php echo $root_html ?>sistema/"><i class="fa fa-dashboard"></i> Home</a></li>
                <li>Núcleos</li>
                <?php if(!isset($p)): ?>
                <li class="active">Buscar</li>
                <?php elseif(isset($p) && $p == 'ver'): ?>
                <li class="active">Ver</li>     
                <?php endif; ?>           
              </ol>               
              </section>
<!-------------------------------------------------------------------------------------------------------------------->
<?php else: ?> 
            <section class="content-header">
                <?php if(!isset($p)): ?>
                    <a href="<?php echo $root_html ?>sistema/" class="btn btn-default"><i class="fa fa-arrow-left"></i>&ensp;Voltar</a>                
                <?php elseif(isset($p)): ?>
                    <a href="<?php echo $root_html ?>sistema/cidades/buscar/" class="btn btn-default"><i class="fa fa-arrow-left"></i>&ensp;Voltar</a>                

                <?php endif; ?>
              <ol class="breadcrumb">
                <li><a href="<?php echo $root_html ?>sistema/"><i class="fa fa-dashboard"></i> Home</a></li>
                <li>Núcleos</li>
                <?php if(!isset($p)): ?>
                <li class="active">Buscar</li>
                <?php elseif(isset($p) && $p == 'editar'): ?>
                <li><a href="<?php echo $root_html ?>sistema/cidades/buscar/">Buscar</a></li>
                <li class="active">Editar</li>
                <?php elseif(isset($p) && $p == 'ver'): ?>
                <li><a href="<?php echo $root_html ?>sistema/cidades/buscar/">Buscar</a></li>
                <li class="active">Ver</li>     
                <?php endif; ?>           
              </ol> 
            </section>
        <?php endif;?>
<br><br>
            <div class="container-fluid">

                <?php if (!isset($_GET['p']) && !isset($_GET['r'])):
                ?>
                
                <form method="POST" action="busca.php" class="alunoCadastro forms-buscar">
 
                    <h2>
                        <i class="fa fa-search"></i> Busca
                    </h2>
                    <hr>

                    <div class="row">
                        <div class="form-group col-md-6">
                    <label style="text-align:center" for="cidade">Nome da Cidade</label>
                            <input type="text" id="buscaNome_escola" name="buscaNome_escola" class="form-control input-lg" placeholder="Procure pelo nome da cidade...">
                        </div>

                        <div class="form-group col-md-6">
                    <label style="text-align:center" for="cidade">Nome de Escola</label>
                            <input type="text" id="buscaNome_escolas" name="buscaNome_escolas" class="form-control input-lg" placeholder="Procure pelo nome da escola que desejar...">
                        </div>
                       
                        <!---------------------------------------- NOTAS INTERNAS ---------------------------------------------------->   
                        <div class="col-md-6">
                        <div class="form-group">
                    <label style="text-align:center" for="notas">Notas no PFC</label>
                    <select name="notas" id="notas" class="form-control input-lg">
                            <option value="" hidden>Selecione uma opção</option>
                            <option id="semmm" value="semmm">Sem Filtro</option>
                            <option id="maior" value="maior">Melhores notas do programa</option>
                            <option id="menor" value="menor">Menores notas do programa</option>
                            </select>
                    </div>
                    </div>


                          <!---------------------------------------- NOTAS EXTERNAS ---------------------------------------------------->   
                          <div class="col-md-6">
                        <div class="form-group">
                    <label style="text-align:center" for="notasex">Notas Externas</label>
                    <select name="notasex" id="notasex" class="form-control input-lg">
                            <option value="" hidden>Selecione uma opção</option>
                            <option id="semmmmm" value="semmmmm">Sem Filtro Externo</option>
                            <option id="maiorex" value="maiorex">Escola com as maiores notas</option>
                            <option id="menorex" value="menorex">Escola com as menores notas</option>
                            </select>
                    </div>
                    </div>

                        <!-------------------------------------------------------------------------------------------->

                               <!---------------------------------------- ANO ---------------------------------------------------->   
                               <div class="col-md-6">
                        <div class="form-group">
                    <label style="text-align:center" for="busca_notas">Ano do PFC</label>
                    <select name="ano" id="ano" class="form-control input-lg">
                            <option value="" hidden>Selecione um ano do PFC</option>
                            <option id="sem" value="sem">Sem filtro anual</option>
                            <option id="2022" value="2022">2022</option>
                            <option id="2023" value="2023">2022</option>
                            </select>
                    </div>
                    </div>

                      <!---------------------------------------- ANO ---------------------------------------------------->   
                      <div class="col-md-6">
                        <div class="form-group">
                    <label style="text-align:center" for="busca_notas">Semestre</label>
                    <select name="anoE" id="anoE" class="form-control input-lg">
                            <option value="" hidden>Selecione um semestre acadêmico</option>
                            <option id="seeem" value="semm">Sem filtro semestral</option>
                            <option id="2022E" value="2022">2023/1</option>
                            </select>
                    </div>
                    </div>
                        <!-------------------------------------------------------------------------------------------->

                        <div class="col-md-12 text-center">
                            <div class="radio">
                              <label>
                                <input type="radio" name="ativo" id="ativo" value="ativo" checked>
                                Ativos
                              </label>&ensp;
                                <label>
                                <input type="radio" name="ativo" id="invativo" value="inativo">
                               Inativos
                              </label>

                            </div>

                        </div>
                    </div>

                </form> 
                <?php 
                if($_SESSION['h'] != 3 AND $_SESSION['h'] != 7 AND $_SESSION['h'] != 8)
                    $query = "SELECT * FROM cidades ORDER BY nome_cidade";
                else{
                    $cidade = $_SESSION['supervisorCidade'];
                    $query = "SELECT * FROM escola WHERE cidade LIKE '".$_SESSION['supervisorCidade']."' ORDER BY nome_escola";
                }

                    // echo '<script>alert("'.$cidade.'")</script>';
 
                    $cidades = mysqli_query($_SG['link'],$query);
                 ?>
    <div align="center" class="row" style="margin: 0 auto; width: 100%;">
                    <div  id="resultado" class="container">
                    <?php 
                    echo '<br><p class="text-left"><b>'.mysqli_num_rows($cidades).'</b> resultados encontrados</p><hr>';

                        if (mysqli_num_rows($cidades) != 0){
                        while ($cidade = mysqli_fetch_assoc($cidades)) {



                            
                                 echo '<div class="buscaContainer equipeContainer">

                                    <div align="left" class="equipeSobre col-md-8"><br>
                                        <h4><b>'.$cidade['nome_cidade'].'</b></h4>
                                     <p><b>Estado:</b> '.$cidade['estado'].'</p>
                                    <p><span><b>ESCOLAS ATIVAS: </b>'.$cidade['num_escolas'].'</span>
                                    <p><span><b>ESCOLAS: </b>'.$cidade['nome_escolas'].'</span>
                                    <p><b>Supervisores:</b> '.$cidade['supervisores'].'</p>
                                    <p><span style="color: green;"><b>MÉDIA DAS ESCOLAS DO PFC: </b>'.$cidade['nota_pfc'].'</span>
                                    </div>

                                    <div class="equipeMenu col-md-2 pull-right" style=" margin-right: 30px;">
                                        <a href="?p=ver&r='.$cidade['id_cidade'].'" class="btn btn-success btn-block"><span class="pull-left glyphicon glyphicon-eye-open"></span> Ver
                                        </a> ';

                                        echo  '<a href="?p=lista&r='.$cidade['id_cidade'].'" class="btn btn-success btn-block"><span class="pull-left glyphicon glyphicon-eye-open"></span> Lista de Escolas
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
                </div>                
            </div>                

                <?php elseif($p == 'editar'):
                    protectPage("3;901;902");
 
                    $query = "SELECT * FROM cidades WHERE id_cidade = '$r' LIMIT 1";

                    $result = mysqli_query($_SG['link'], $query);
                    $ciade = mysqli_fetch_assoc($result);
                ?>

                 
                <div class="container-fluid" style="width: 80%;">
                <form id="forms-cadastro" enctype="multipart/form-data" method="POST" class="vestibularEditar formsEquipe forms-cadastrar">


                    <input type="hidden" name="id_cidade" value="<?php echo $cidade['id_cidade']?>">     

                    <h1 class="text-center">Editar dados da Cidade: <br> <small><?php echo $cidade['nome_cidade'] ?></small><br>
                    <hr></h1>

                    <p class="help-block"><span style="color: red;">ATENÇÃO:</span> Campo marcado com "<span style="color: red;">*</span>"<u> NÃO</u> deixe de preencher.</p>
                    
                    <hr>              
                    <h1 class="text-center"><small>Cidade</small></h1>
                    <hr>   

                    <div class="row">
                        
                        <div class="col-md-12 form-group">
                            <label for="nome_cidade">Nome da Cidade <span style="color: red;">*</span></label>
                            <input id="nome_cidade" type="text" name="nome_cidade" class="form-control" placeholder="Digite o nome da cidade" value="<?php echo $cidade['nome_cidade'] ?>">
                        </div>
             

                        
                    </div>
      
                    <div class="form-group">
                        <label for="cidade">Supervisores <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="supervisor" id="supervisor" value="<?php echo $cidade['supervisor'] ?>" required>              
                        </select>
                    </div>


                    <div class="text-center">
                        <button id="enviarForm" type="button" class="btn btn-primary btn-lg">Salvar</button>   

                    </div>
                </form>
</div>

<?php elseif($p == 'lista'): 
                    $sql = "SELECT id_cidade, estado FROM cidades WHERE id_cidade = '$r' ";

                    $results = mysqli_query($_SG['link'], $sql);
                    $cidadeee = mysqli_fetch_assoc($results);

                    $sqll = "SELECT *
                    FROM alunos 
                    JOIN usuario ON alunos.id_usuario = usuario.id_usuario 
                    WHERE alunos.id_escola = (SELECT id_escola FROM escola WHERE id_escola = '$r')";
                    $resultt = mysqli_query($_SG['link'], $sqll);
        
                    $sqlll = "SELECT id_cidade, estado FROM cidades WHERE id_cidade = '$r' ";

        
                    $resulttt = mysqli_query($_SG['link'], $sqlll);
                    $cidadee = mysqli_fetch_assoc($resulttt);
                ?>

             

	<div class="col-md-12">

	<table class="table table-hover table-bordered">

		<thead>
			<th class="">Nome das Escolas</th>
			<th class="">Status</th>
			<th class="">Alunos Totais</th>
			<th class="">Alunos Ativos</th>
			<th class="">Nota PFC</th>
			<th class="">Supervisor</th>		
		</thead>

		<tbody>
            <?php


            $sqll = "SELECT *
            FROM cidades 
            JOIN escola ON escola.id_cidade = cidades.id_cidade
            JOIN escola_medias ON escola_medias.id_escola = escola.id_escola
            WHERE cidades.id_cidade = (SELECT id_cidade FROM cidades WHERE id_cidade = '$r')";
            $resultt = mysqli_query($_SG['link'], $sqll);

            $queryyy = "SELECT id_cidade, estado, supervisores FROM cidades WHERE id_cidade = '$r' ";

            $resulttt = mysqli_query($_SG['link'], $queryyy);
            $escolaa = mysqli_fetch_assoc($resulttt);



   while($row = mysqli_fetch_assoc($resultt)):

    $partes_nome = explode(" ", $row['nome']);

    $nome_email = $partes_nome[0] . "." . $partes_nome[count($partes_nome)-1];

    switch ($row['ativo']) {
        case 1:
            $estado = "ativa";
            break;
        case 0:
            $estado = "inativa";
            break;
        default:
            $estado = "";
    }

echo '<tr>';
echo '<td class="text-uppercase">
    '.$row['nome_escola'].'
</td>';


echo '<td class="text-uppercase">
    '.$estado.'
</td>';

echo '<td>
    '.$row['num_alunos'].'
</td>';

echo '<td>
    '.$row['alunos_ativos'].'
</td>';


echo '<td>
    '.$row['soma_pfc'].'
</td>';


echo '<td>
    '.$row['supervisores'].'
</td>';

echo '</tr>';
endwhile;
    echo '</tbody>

</table>';

echo '<div class="row"><div class="col-md-12" align="center"><br><br><button id="btn-print" onclick="imprimir()" class="btn btn-default"><i class="fa fa-print"></i> IMPRIMIR</button></div></div>';
?>

</div>

<?php ?>
                <?php elseif($p == 'ver'): 
                    $query = "SELECT nome_cidade, estado, supervisores FROM cidades WHERE id_cidade = '$r' ";

                    $result = mysqli_query($_SG['link'], $query);
                    $cidade = mysqli_fetch_assoc($result);

                ?>

                <div class="container-fluid">
                    
                    <h2 class="text-center"><?php echo $cidade['nome_cidade'] ?></h2>
<br>

                

                    <div class="equipeTexto">
                        <h3 class="text-left">Dados da Cidade</h3>
                        <hr>
                        <p><strong>Estado: </strong><?php echo $cidade['estado']?></p>
                        <p><strong>Supervisor: </strong><?php echo $cidade['supervisor']?></p>
                        <p><strong>Escolas: </strong><?php echo $cidade['supervisor']?></p>
                    

                    </div>

                </div>



                <?php endif; ?>

            </div>
        </div>

    </div>

    <?php include '../../footer.php'; ?>
<script type="text/javascript">
            
            $('#buscaNome_escola, #buscaNome_escolas').keyup(function() {
                
                var data = $(".alunoCadastro").serialize();
                $.ajax({
                    url: '<?php echo $root_html ?>sistema/cidades/buscar/busca.php',
                    type: 'POST',
                    data: data,
                    success: function (data) {
                        $('#resultado').html(data);
                    },
                    error: function (e) {
                        $('#resultado').html("<option>Nenhum resultado encontrado.</option>");

                    }
                });

            });

            $('#notas, #notasex').change(function () {
                
                var data = $(".alunoCadastro").serialize();
                $.ajax({
                    url: '<?php echo $root_html ?>sistema/cidades/buscar/busca.php',
                    type: 'POST',
                    data: data,
                    success: function (data) {
                        $('#resultado').html(data);
                    },
                    error: function (e) {
                        $('#resultado').html("<option>Nenhum resultado encontrado.</option>");

                    }
                });

            });

            $('#enviarForm').click(function () {

                tinyMCE.triggerSave();

                var data = $(".vestibularEditar").serialize();

                $.ajax({
                    url: '<?php echo $root_html?>sistema/cidades/buscar/editar.php',
                    type: 'POST',
                    data: data,
                    complete: function() {
                        setTimeout(function(){ location.href = '../';}, 500);
                    },
                    success: function (data) {
                        $('.alerta').hide().show();
                        $('#alerta_conteudo').html(data);

                        setTimeout(function(){ $('.alerta').fadeOut(500).removeClass('alert-success', 500);}, 4000);
                    },
                    error: function (e) {
                        $('.alerta').hide().show().addClass('alert-danger');
                        $('#alerta_conteudo').html("<span class='glyphicon glyphicon-remove'></span>&ensp;Nenhum resultado encontrado");

                        setTimeout(function(){ $('.alerta').fadeOut(500).removeClass('alert-danger', 500);}, 4000);
                    }
                });

            });

            $('.desativar').click(function () {
                var $id = $(this).attr('id');
                var $ativo = $('#input'+$id).val();

                var data = $('.formsHidden'+ $id).serialize();

                $.ajax({
                    url: '<?php echo $root_html?>sistema/cidades/buscar/desativar.php',
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


            tinymce.init({
              selector: 'textarea',
              height: 100,
              menubar: false,
              placeholder: true,
              plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code'
              ],
              toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
              content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css']
            });

            
           /* $('#telefone').mask('(00) 0000-0000');
            $('#celular').mask('(00) 00000-0000');*/
            $('#data-inscricao-inicio').mask('00/00/0000');
            $('#data-inscricao-final').mask('00/00/0000');
            /*$('#tel_fixo').mask('(00) 0000-0000');*/
            $('#cep').mask('00000-000');

            $('#tel_fixo_esc').mask('(00) 0000-0000');
            $('#tel_fixo_dir').mask('(00) 0000-0000');
            $('#tel_fixo_vdir').mask('(00) 0000-0000');
            $('#tel_fixo_cp').mask('(00) 0000-0000');
            $('#tel_fixo_cl').mask('(00) 0000-0000');
            $('#tel_fixo_ej').mask('(00) 0000-0000');

            $('#cel_esc').mask('(00) 00000-0000');
            $('#cel_dir').mask('(00) 00000-0000');
            $('#cel_vdir').mask('(00) 00000-0000');
            $('#cel_cp').mask('(00) 00000-0000');
            $('#cel_cl').mask('(00) 00000-0000');
            $('#cel_ej').mask('(00) 00000-0000');





</script>

</body>
</html>