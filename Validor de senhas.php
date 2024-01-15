<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VALIDOR DE SENHAS</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <?php 
    $nous = $_POST['nomeUsuario']??"username";
    $sen = $_POST['senha']??"aBcD";
    $bib = ["ABCDEFGHIJKLMNOPQRSTUVWXYZ", "abcdefghijklmnopqrstuvwxyz", "0123456789", "?!@#$%£¢&"];
    $sim = ["❌","❌","❌","❌", "❌"];
    $i = 0;
    $c = -1;
    do {
        $c = $c+1;
        $sub = substr($bib[$i], $c, 1);
        if(is_int(strrpos($sen, $sub)) && strlen($sen) > strrpos($sen, $sub)) $sim[$i] = "☑";
        if ($c == strlen($bib[$i]) || $sim[$i] == "☑") {
        $c = -1;
        $i = $i+1;
       }
       if($i == 4) break;
    } while(($c < strlen($bib[$i])) && ($i < 4));
    if(strlen($sen) >= 8) $sim[4] = "☑";
    ?>
    <main>
        <h1>Testador de senhas fortes</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <label for="v1">Digite seu nome de usuário</label>
            <input type="text" name="nomeUsuario" value="<?=$nous?>">
            <label for="v1">Digite sua senha</label>
            <input type="password" name="senha" id="ms" value="<?=$sen?>">
            <ul>
                <li><?="$sim[0] Letras maiúscula"?></li>
                <li><?="$sim[1] Letras minúscula"?></li>
                <li><?="$sim[2] Letras números"?></li>
                <li><?="$sim[3] Letras simbolos"?></li>
                <li><?="$sim[4] Tem 8 letras"?></li>
            </ul>
            <input type="button" value="Mostrar Senha" onclick="mostrarSenha()">
            <ul></ul>
            <input type="submit" value="VER RESULTADO">
        </form>
        <script lang="javascript">
            var mostrar = document.getElementById('ms');
            function mostrarSenha(){
                if(mostrar.type === 'password') mostrar.setAttribute('type', 'text');
                else mostrar.setAttribute('type', 'password');
            }
        </script>
    </main>
</body>
</html>