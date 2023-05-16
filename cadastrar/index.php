<?php include '../../../web/seguranca.php';

$title = "AdminPFC - Cidades";
protegePaginaUnica(901, 3);

$escola1 = mysqli_query($_SG['link'], "SELECT DISTINCT cidade FROM escola");


include '../../head.php';
?>
<body class="hold-transition skin-black sidebar-mini fixed">

	<div class="wrapper">

	<?php include '../../menu.php'; ?>
		<div class="content-wrapper">
            <section class="content-header">
                <a href="<?php echo $root_html ?>sistema/" class="btn btn-default"><i class="fa fa-arrow-left"></i>&ensp;Voltar</a>                
              <ol class="breadcrumb">
                <li><a href="<?php echo $root_html ?>sistema/"><i class="fa fa-dashboard"></i> Home</a></li>
                <li>Núcleos</li>
                <li class="active">Cadastrar</li>
              </ol> 
            </section>
<br><br>

        	<div class="container-fluid" style="width: 80%;">
				
				<form id="forms-cadastro" enctype="multipart/form-data" method="POST" action="cadastrar.php" class="alunoCadastro forms-cadastrar">

					<h1 class="text-center">Ficha de Cadastro <br><small>Cidade</small></h1>
					<hr>

					<p class="help-block"><span style="color: red;">ATENÇÃO:</span> Campo marcado com "<span style="color: red;">*</span>" é <u>OBRIGATÓRIO</u> preencher.</p>
					
					<hr><br>

					<div class="row">
						
						<div class="col-md-12 form-group">
							<label for="nomecidade">Nome da Cidade <span style="color: red;">*</span></label>
							<input id="nomecidade" type="text" name="nomecidade" class="form-control" placeholder="Digite o nome da cidade" required>
						</div>
			

					<div class="col-md-12 form-group">
						<label for="estado">Estado <span style="color: red;">*</span></label>
						<input type="text" name="estado" id="estado" class="form-control" placeholder="Digite as siglas do estado. Exemplo: SP, RJ..." required>
					</div>
						
					</div>
				
			

									
<!--
					<div class="form-group">
						<label for="nome_diretor">Nome do Diretor</label>
						<input type="text" name="nome_diretor" id="nome_diretor" class="form-control" placeholder="Nome completo do diretor ou diretora">
					</div>-->


				
					<br>
					<div class="text-center">
						<button id="salvarCadastro" type="submit" value="Cadastrar" class="btn btn-primary btn-lg">
							Cadastrar
						</button>	
						<input type="reset" class="btn btn-default pull-right">		
					</div>
				</form>
        	</div>
        </div>

	</div>

	<?php include '../../footer.php'; ?>

<script type="text/javascript">

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

	$('#cep').mask('00000-000');

	$('#forms-cadastro').submit(function(event){
		
		event.preventDefault();

		tinyMCE.triggerSave();

		data = $('#forms-cadastro').serialize();

        $.ajax({
            url: '<?php echo $root_html?>sistema/cidades/cadastrar/cadastrar.php',
            type: 'POST',
            data: data,
            complete: function() {
                setTimeout(function(){ location.reload();}, 500);
            },
            success: function (data) {
                $('.alerta').show().addClass('alert-success');
                $('#alerta_conteudo').html(data);

                setTimeout(function(){ $('.alerta').fadeOut(500).removeClass('alert-success', 500);}, 4000);
            },
            error: function (e) {
                $('.alerta').show().addClass('alert-danger');
                $('#alerta_conteudo').html("<span class='glyphicon glyphicon-remove'></span>&ensp;Nenhum resultado encontrado");

                setTimeout(function(){ $('.alerta').fadeOut(500).removeClass('alert-danger', 500);}, 4000);
            }
        });
	});

</script>

</body>
</html>