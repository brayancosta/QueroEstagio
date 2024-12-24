<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário com Progress Bar</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .step {
            display: none;
        }
        .active {
            display: block;
        }
        .progress-bar {
            transition: width 0.5s;
        }
        .progress {
            height: 20px;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-control {
            border-radius: 10px;
            border: 2px solid #FF7F00;
        }
        .btn-warning, .btn-success {
            background-color: #FF7F00;
            border-radius: 10px;
        }
        .container {
            max-width: 800px;
        }
        h4 {
            color: #FF7F00;
            margin-bottom: 20px;
        }
        .navbar {
            background-color: #FF7F00;
        }
        .navbar-brand {
            color: white !important;
        }
        .progress-bar.bg-warning {
            background-color: #FF7F00;
        }
        .form-control:focus {
            border-color: #FF7F00;
            box-shadow: 0 0 10px rgba(255, 127, 0, 0.5);
        }
        .btn-warning:hover, .btn-success:hover {
            background-color: #FF7F00;
        }
        .btn-secondary {
            background-color: #f1f1f1;
            border: 2px solid #FF7F00;
            color: #FF7F00;
        }
        .btn-secondary:hover {
            background-color: #FF7F00;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">Quero Estágio</a>
        <a href="login.html"><button class="btn btn-light ml-auto">Login</button></a>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Formulário de Inscrição</h2>

        <!-- Progress Bar -->
        <div class="progress">
            <div id="progress-bar" class="progress-bar bg-warning" style="width: 0%;" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <!-- Formulário -->
        <form id="form" action="back/cad_aluno.php" method="POST">
            <!-- Etapa 1: Dados Pessoais -->
            <div id="step1" class="step active">
                <h4>Dados Pessoais</h4>
                <div class="form-group">
                    <label for="nome_completo">Nome Completo:</label>
                    <input type="text" class="form-control" id="nome_completo" name="nome_completo" required>
                </div>
                <div class="form-group">
                    <label for="nome_social">Nome Social:</label>
                    <input type="text" class="form-control" id="nome_social" name="nome_social">
                </div>
                <div class="form-group">
                    <label for="sexo">Sexo:</label>
                    <select class="form-control" id="sexo" name="sexo" required>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Outros">Outros</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="telefone1">Telefone 1:</label>
                    <input type="text" class="form-control" id="telefone1" name="telefone1" required>
                </div>
                <div class="form-group">
                    <label for="telefone2">Telefone 2:</label>
                    <input type="text" class="form-control" id="telefone2" name="telefone2">
                </div>
                <div class="form-group">
                    <label for="data_nascimento">Data de Nascimento:</label>
                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                </div>
                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" required>
                </div>
                <div class="form-group">
                    <label for="rg">RG:</label>
                    <input type="text" class="form-control" id="rg" name="rg">
                </div>
                <!-- Campos de Email e Senha -->
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>
                <button type="button" class="btn btn-warning" onclick="nextStep(2)">Próxima Etapa</button>
            </div>

            <!-- Etapa 2: Endereço -->
            <div id="step2" class="step">
                <h4>Endereço</h4>
                <div class="form-group">
                    <label for="cidade">Cidade:</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" required>
                </div>
                <div class="form-group">
                    <label for="uf">UF:</label>
                    <input type="text" class="form-control" id="uf" name="uf" required>
                </div>
                <div class="form-group">
                    <label for="bairro">Bairro:</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" required>
                </div>
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <input type="text" class="form-control" id="estado" name="estado" required>
                </div>
                <div class="form-group">
                    <label for="complemento">Complemento:</label>
                    <input type="text" class="form-control" id="complemento" name="complemento">
                </div>
                <button type="button" class="btn btn-secondary" onclick="nextStep(1)">Voltar</button>
                <button type="button" class="btn btn-warning" onclick="nextStep(3)">Próxima Etapa</button>
            </div>

            <!-- Etapa 3: Escolaridade -->
            <div id="step3" class="step">
                <h4>Escolaridade</h4>
                <div class="form-group">
                    <label for="grau_instrucao">Grau de Instrução:</label>
                    <input type="text" class="form-control" id="grau_instrucao" name="grau_instrucao" required>
                </div>
                <div class="form-group">
                    <label for="matricula">Matrícula:</label>
                    <input type="text" class="form-control" id="matricula" name="matricula" required>
                </div>
                <div class="form-group">
                    <label for="horario_disponivel">Horário Disponível:</label>
                    <select class="form-control" id="horario_disponivel" name="horario_disponivel" required>
                        <option value="Manhã">Manhã</option>
                        <option value="Tarde">Tarde</option>
                        <option value="Noite">Noite</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="horario_estudo">Horário de Estudo:</label>
                    <select class="form-control" id="horario_estudo" name="horario_estudo" required>
                        <option value="Manhã">Manhã</option>
                        <option value="Tarde">Tarde</option>
                        <option value="Noite">Noite</option>
                    </select>
                </div>
                <button type="button" class="btn btn-secondary" onclick="nextStep(2)">Voltar</button>
                <button type="button" class="btn btn-warning" onclick="nextStep(4)">Próxima Etapa</button>
            </div>

            <!-- Etapa 4: Idiomas -->
            <div id="step4" class="step">
                <h4>Idiomas</h4>
                <div class="form-group">
                    <label for="idiomas">Idiomas:</label>
                    <textarea class="form-control" id="idiomas" name="idiomas" rows="4"></textarea>
                </div>
                <button type="button" class="btn btn-secondary" onclick="nextStep(3)">Voltar</button>
                <button type="button" class="btn btn-warning" onclick="nextStep(5)">Próxima Etapa</button>
            </div>

            <!-- Etapa 5: Experiência -->
            <div id="step5" class="step">
                <h4>Experiência</h4>
                <div class="form-group">
                    <label for="experiencia">Experiência Profissional:</label>
                    <textarea class="form-control" id="experiencia" name="experiencia" rows="4" required></textarea>
                </div>
                <button type="button" class="btn btn-secondary" onclick="nextStep(4)">Voltar</button>
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            // Máscaras de Formato
            $('#telefone1').mask('(00) 00000-0000');
            $('#telefone2').mask('(00) 00000-0000');
            $('#cpf').mask('000.000.000-00');
            $('#rg').mask('00.000.000-0');
        });

        let currentStep = 1;

        function nextStep(stepNumber) {
            // Ocultar todas as etapas
            $('.step').removeClass('active');

            // Mostrar a etapa atual
            $('#step' + stepNumber).addClass('active');

            // Atualizar a barra de progresso
            let progress = (stepNumber - 1) * 25;
            $('#progress-bar').css('width', progress + '%');
            $('#progress-bar').attr('aria-valuenow', progress);
            
            currentStep = stepNumber;
        }
    </script>
</body>
</html>
