<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    <link rel="stylesheet" href="style.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = test_input($_POST["email"]); //variavel email recebe test input e ele recebe oq ta na tela 
        $senha = test_input($_POST["senha"]);
   



        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bancohotel";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM tb_usuario where email='" . $email . "' and senha='" . $senha . "'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) { //se o select for maior que zero,banco acha e chega no result que executa ,quantas linhas achou?e fez o login
            // output data of each row
            echo "fez login";
        } else { //nn fez , n precisa de outro if,pois ja esta no where onde é if na linguagem sql
            echo "O email foi cadastrado  ";
        }
        $conn->close();
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    ?>

    <main class="form-signin w-25 m-auto">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
           

            <div class="form-floating">
                <input required name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            

            <div class="form-floating">
                <input name="senha" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            
           
            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2024</p>
        </form>
    </main>

</body>

</html>