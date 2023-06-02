    <?php
    // Checa se existe um submit
    if (isset($_POST)) {
        // Checa se alguma das variaveis EMAIL, NOME, SENHA, CPF ficaram em branco
        if (is_null($_POST["email"]) == true || is_null($_POST["nome"]) == true || is_null($_POST["senha"]) == true || is_null($_POST["cpf"]) == true) {
            // header com variavel para notificar o erro
            header('Location: cadastrar.php?erro="erro"');
        } else {
            //Linka o BD
            $connect = mysqli_connect("localhost", "root", "", "Sistema_cartucho");
            //CONCTAR NO IF
            // $connect = mysqli_connect("localhost", "root", "mysqluser", "Sistema_cartucho");
            //Pega as variaveis do form
            $email = $_POST["email"];
            $nome = $_POST["nome"];
            $cpf = $_POST["cpf"];
            //Criptografa a senha
            $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            //String do contato com o BD
            $insert = "INSERT INTO login (nome,email,senha,cpf,tipo) VALUES ('" . $nome . "','" . $email . "','" . $senha . "','" . $cpf . "','usuario');";
            //echo "<p>informações catalogadas <a href='./ver_table.php'>Ir para tabela</a></p>";
            //Contato com o BD
            mysqli_query($connect, $insert);
            //Redireciona para Logar com informação de cadastro concluido
            header('Location: login.php?cadastro="sucesso"');
        };
    };
    ?>