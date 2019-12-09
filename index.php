<?php 
	include("cabecalho.php");
	include("logica-usuario.php");
?>


<?php if(isset($_SESSION['success'])){ ?>
	<p class="alert-success"><?= $_SESSION['success'] ?></p>
<?php } ?>
<?php 
	unset($_SESSION['success']);
?>
<?php if(isset($_SESSION['danger'])){ ?>
	<p class="alert-danger"><?= $_SESSION['danger'] ?></p>
<?php } ?>
<?php 
	unset($_SESSION['danger']);
?>

<h1>Bem vindo!</h1>

<?php if(usuarioEstaLogado()) { ?>
	<p class="text-success">Você está logado como <?= usuarioLogado() ?>. <a href="logout.php">Deslogar</a></p>
<?php } else { ?>
<h2>Login</h2>
<form method="post" action="login.php">
	<table class="table">
		<tr>
			<td>Email</td>
			<td><input type="email" name="email" class="form-control"></td>
		</tr>

		<tr>
			<td>Senha</td>
			<td><input type="password" name="senha" class="form-control"></td>
		</tr>

		<tr>
			<td><button class="btn btn-primary">Login</button></td>
		</tr>
	</table>
</form>
<?php } ?>

<?php include("rodape.php") ?>
			