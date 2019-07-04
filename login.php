<!doctype=html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.4.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <link href="css/login_estilo.css" rel="stylesheet">
	</head>
<body>
    <br><br><br><br><br><br>
    <div class="container">
        <form method="post" action="comprueba_login.php" autocomplete="off">
            <table>
            <tr><td colspan="2"><h2>Sistema de control</h2><br></td></tr>
            <tr><td class="izq">Usuario:</td><td class="der"><input type="text" id="user" name="user"></td></tr>
            <tr><td class="izq">Contraseña:</td><td class="der"><input type="password" id="pass" name="pass"></td></tr>
            <tr><td colspan="2"><br><button type="submit" class="btn btn-secondary">Entrar</button>
            </td></tr>
            </table>
        </form>
    </div>

</body>
</html>