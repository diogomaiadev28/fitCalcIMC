<?php
require_once 'vendor/autoload.php';

use Controller\UsersController;
$userController = new UsersController();
$loginMessage = '';

if ($_SERVER['REQUEST_METHOD']== 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($userController->login($email, $password)) {
        header('Location: View/home.php');
        exit();
      
    }else{
        $loginMessage = "Email ou senha incorretos";
    }

}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/assets/css/output.css">
    <title>FitCalc | Entrar na Conta</title>

</head>

<body class="bg-gradient-to-br from-[#667eea] to-[#764ba2] h-screen">

    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>

    <main class="flex justify-center items-center flex-col h-full">
        <form method="POST" class="bg-gray-100 rounded-2xl w-100 p-8 flex flex-col justify-center space-y-4">
            <div class="flex flex-col justify-center items-center space-y-3 mb-10">
                <figure class="bg-gradient-to-br from-[#667eea] to-[#764ba2] rounded-full flex justify-center items-center p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" class="bi bi-calculator"
                        viewBox="0 0 16 16">
                        <path
                            d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                        <path
                            d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                    </svg>
                </figure>

                <h2 class="text-2xl font-bold">Calculadora IMC</h2>

                <p class="text-sm">Entre com suas credenciais</p>

            </div>

            <div>
                <label for="userEmailAddress">Email</label>
                <div class="relative">
                    <span class="absolute top-1/2 left-[10px] -translate-y-1/2">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <input type="email" name="email" class="pl-8 py-2 w-full bg-white border border-gray-200 rounded-lg text-sm font-medium"
                        id="userEmailAddress" placeholder="seu@email.com" aria-describedby="emailAddress" required>
                </div>
            </div>

            <div>
                <label for="userPassword">Senha</label>
                <div class="relative">
                    <span class="absolute top-1/2 left-[10px] -translate-y-1/2">
                        <i class="bi bi-lock"></i>
                    </span>
                    <input type="password" name="password" class="pl-8 py-2 w-full bg-white border border-gray-200 rounded-lg text-sm font-medium"
                        id="userPassword" placeholder="Sua senha" required>
                </div>
            </div>

            <button type="submit" class="cursor-pointer hover:opacity-90 transition duration-200 bg-gradient-to-br from-[#667eea] to-[#764ba2] text-white font-semibold text-sm p-3 rounded-lg">Entrar</button>

            <p class="text-sm text-center">Não tem uma conta? <a class="text-blue-600 font-semibold hover:underline" href="View/register.php">Cadastre-se aqui</a></p>
            </div>
        </form>

        <p></p>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</body>

</html>