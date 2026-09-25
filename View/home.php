<?php

if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once('../vendor/autoload.php');
use Controller\ImcController;

$imcController = new ImcController();
$imcResult = null;

if(empty($_SESSION['id'])) {
    header('Location: /index.php');
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['weight'], $_POST['height'])){
        $weight = $_POST['weight'];
        $height = $_POST['height'];
        $user_id = $_SESSION['id'];
        $imcResult = $imcController->calculateImc($weight,$height);
        if($imcResult['BMIrange'] != 'O peso e a altura devem conter valores positivos.') {
            $imcController->saveIMC($weight, $height, $imcResult['imc'], $user_id);
        }
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
    <title>FitCalc | Calculadora de IMC</title>
</head>

<body class="bg-gray-100">

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


    <header class="bg-gradient-to-br from-[#667eea] to-[#764ba2] mb-8">
        <nav class="flex justify-between items-center flex-row space-x-2 px-4 py-3">
            <div class="flex justify-center items-center space-x-3">
                <figure class="rounded-full flex justify-center items-center bg-white/20 w-10 h-10">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white" class="bi bi-person"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                    </svg>
                </figure>
                <!-- INFORMAÇÃO DO USUÁRIO -->
            </div>

            <div class="d-flex gap-4">
                <button class="bg-white/20 rounded-lg border-0 flex flex-row justify-center items-center p-3 space-x-2 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-calculator"
                        viewBox="0 0 16 16">
                        <path
                            d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                        <path
                            d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                    </svg>
                    <a href="home.php">Calculadora</a>
                </button>
            </div>
            <a href="/index.php">
                <button class="rounded-lg border-0 flex flex-row justify-center items-center bg-white/20 p-2 space-x-2 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white"
                        class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                        <path fill-rule="evenodd"
                            d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                    </svg>
                    <p>Sair</p>
                </button>
            </a>
        </nav>
    </header>

    <main class="flex flex-col items-center space-y-6 mb-6">
        <div class="space-y-3 flex flex-col items-center">
            <h1 class="font-semibold text-3xl">Calculadora de IMC</h1>

            <p>Calcule seu Índice de Massa Corporal e monitore a sua saúde</p>
        </div>

        <div class="flex space-x-4 justify-center w-full px-6">
            <div class="rounded-lg w-1/2 bg-white shadow-lg px-6 py-8 flex flex-col space-y-3">
                <div class="flex space-x-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="blue" class="bi bi-calculator"
                        viewBox="0 0 16 16" data-component-line="76">
                        <path
                            d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                        <path
                            d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                    </svg>
                    <h2 class="text-xl font-semibold">Dados para Cálculo</h2>
                </div>
                <!-- Parei aqui -->
                <form class="flex flex-col space-y-3" method="POST" action="home.php">
                    <label class="text-xs font-semibold" for="userWeight">Peso (kg)</label>
                    <div class="flex">
                        <i class="p-2 bg-gray-100 rounded-l-lg border border-gray-200 bi bi-duffle" id="weightIcon"></i>
                        <input type="number" name="weight" class="w-full px-4 py-2 text-sm font-semibold rounded-r-lg border-r border-t border-b border-gray-200" placeholder="Ex: 70.5" id="userWeight"
                            aria-label="userWeight" aria-describedby="weightIcon" step="0.01" required>
                    </div>
                    <label class="text-xs font-semibold" for="userHeight">Altura (m)</label>
                    <div class="flex">
                        <i class="p-2 bg-gray-100 rounded-l-lg border border-gray-200 bi bi-rulers" id="heightIcon"></i>
                        <input type="number" name="height" class="w-full px-4 py-2 text-sm font-semibold rounded-r-lg border-r border-t border-b border-gray-200" placeholder="Ex: 1.75" id="userHeight"
                            aria-label="userHeight" aria-describedby="heightIcon" step="0.01" required>
                    </div>

                    <button type="submit" class="bg-gradient-to-br from-[#667eea] to-[#764ba2] cursor-pointer w-full border-0 text-white text-sm rounded-lg py-3 my-6">Calcular
                        IMC</button>
                </form>
            </div>

            <div class="rounded-lg w-1/2 bg-white shadow-lg p-6 flex-1">
                <h2 class="text-xl font-semibold">Resultado</h2>

                <div class="flex flex-col h-full items-center justify-center pb-6">
                    <div class="flex flex-col items-center space-y-2">
                        <!-- RESULTADO DO IMC -->
                        <?php if ($imcResult):?>
                            <p>Seu IMC é: <?php echo $imcResult['imc'] ?? '';?></p>
                            <p>Categoria: <?php echo $imcResult['BMIrange'];?></p>
                        <?php else:?>
                            <i class="text-4xl text-gray-500 bi bi-calculator"></i>
                            <p>Preencha os dados ao lado para ver o resultado</p>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <section class="px-6">
        <div class="mt-6 w-full rounded-2xl bg-white p-6 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Histórico de Verificações
                </h2>
                <span class="text-sm text-gray-500">Últimos registros</span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-gray-100 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                        <th class="py-3 px-4">Data</th>
                        <th class="py-3 px-4">Peso</th>
                        <th class="py-3 px-4">Altura</th>
                        <th class="py-3 px-4">IMC</th>
                        <th class="py-3 px-4">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 text-sm font-medium text-gray-700">
                        <!-- Linha 1: Peso Normal -->
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-3 px-4 text-gray-500">24/09/2026</td>
                            <td class="py-3 px-4">70.5 kg</td>
                            <td class="py-3 px-4">1.75 m</td>
                            <td class="py-3 px-4 font-bold text-gray-900">23.02</td>
                            <td class="py-3 px-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                Peso normal
                                </span>
                            </td>
                        </tr>

                        <!-- Linha 2: Baixo Peso -->
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-3 px-4 text-gray-500">10/09/2026</td>
                            <td class="py-3 px-4">52.0 kg</td>
                            <td class="py-3 px-4">1.75 m</td>
                            <td class="py-3 px-4 font-bold text-gray-900">16.98</td>
                            <td class="py-3 px-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">
                                Baixo peso
                                </span>
                            </td>
                        </tr>

                        <!-- Linha 3: Obesidade grau I -->
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-3 px-4 text-gray-500">15/08/2026</td>
                            <td class="py-3 px-4">92.0 kg</td>
                            <td class="py-3 px-4">1.75 m</td>
                            <td class="py-3 px-4 font-bold text-gray-900">30.04</td>
                            <td class="py-3 px-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-orange-100 text-orange-800">
                                Obesidade grau I
                                </span>
                            </td>
                        </tr>

                        <!-- Linha 4: Obesidade grau II -->
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-3 px-4 text-gray-500">01/07/2026</td>
                            <td class="py-3 px-4">110.0 kg</td>
                            <td class="py-3 px-4">1.75 m</td>
                            <td class="py-3 px-4 font-bold text-gray-900">35.92</td>
                            <td class="py-3 px-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-red-100 text-red-800">
                                Obesidade grau II
                                </span>
                            </td>
                        </tr>

                        <!-- Linha 5: Obesidade grau III -->
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-3 px-4 text-gray-500">12/05/2026</td>
                            <td class="py-3 px-4">130.0 kg</td>
                            <td class="py-3 px-4">1.75 m</td>
                            <td class="py-3 px-4 font-bold text-gray-900">42.45</td>
                            <td class="py-3 px-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-purple-100 text-purple-800">
                                Obesidade grau III
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>

</html>