<?php
// Incluindo a conexão
include('../config/conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $nome_completo = $_POST['nome_completo'];
    $nome_social = $_POST['nome_social'];
    $sexo = $_POST['sexo'];
    $telefone1 = $_POST['telefone1'];
    $telefone2 = $_POST['telefone2'];
    $data_nascimento = $_POST['data_nascimento'];
    $cpf = $_POST['cpf'];
    $rg_orgao_emissor = $_POST['rg_orgao_emissor'];
    $rg_numero = $_POST['rg_numero'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Endereço
    $uf = $_POST['uf'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $estado = $_POST['estado'];
    $complemento = $_POST['complemento'];

    // Escolaridade
    $grau_instrucao = $_POST['grau_instrucao'];
    $matricula = $_POST['matricula'];
    $horario_disponivel = $_POST['horario_disponivel'];
    $horario_estudo = $_POST['horario_estudo'];

    // Cursos
    $curso_nome = $_POST['curso_nome'];

    // Idiomas
    $idioma = $_POST['idioma'];
    $nivel_idioma = $_POST['nivel_idioma'];

    // Conhecimentos em Informática
    $conhecimento_informatica = $_POST['conhecimento_informatica'];

    // Experiência Profissional
    $empresa = $_POST['empresa'];
    $atribuicoes = $_POST['atribuicoes'];
    $entrada = $_POST['entrada'];
    $saida = $_POST['saida'];

    // Inserção de dados na tabela dados_pessoais
    $sql = "INSERT INTO dados_pessoais (nome_completo, nome_social, sexo, telefone1, telefone2, data_nascimento, cpf, rg_orgao_emissor, rg_numero, email, senha)
            VALUES ('$nome_completo', '$nome_social', '$sexo', '$telefone1', '$telefone2', '$data_nascimento', '$cpf', '$rg_orgao_emissor', '$rg_numero', '$email', '$senha')";

    if ($conn->query($sql) === TRUE) {
        $user_id = $conn->insert_id; // Obtém o ID do usuário inserido
        
        // Inserção de dados na tabela endereco
        $sql_endereco = "INSERT INTO endereco (id_usuario, uf, cidade, bairro, estado, complemento) 
                         VALUES ('$user_id', '$uf', '$cidade', '$bairro', '$estado', '$complemento')";
        $conn->query($sql_endereco);

        // Inserção de dados na tabela escolaridade
        $sql_escolaridade = "INSERT INTO escolaridade (id_usuario, grau_instrucao, matricula, horario_disponivel, horario_estudo) 
                             VALUES ('$user_id', '$grau_instrucao', '$matricula', '$horario_disponivel', '$horario_estudo')";
        $conn->query($sql_escolaridade);

        // Inserção de dados na tabela cursos
        $sql_cursos = "INSERT INTO cursos (id_usuario, curso_nome) VALUES ('$user_id', '$curso_nome')";
        $conn->query($sql_cursos);

        // Inserção de dados na tabela idiomas
        $sql_idiomas = "INSERT INTO idiomas (id_usuario, idioma, nivel) VALUES ('$user_id', '$idioma', '$nivel_idioma')";
        $conn->query($sql_idiomas);

        // Inserção de dados na tabela conhecimentos_informatica
        $sql_informatica = "INSERT INTO conhecimentos_informatica (id_usuario, conhecimento) 
                            VALUES ('$user_id', '$conhecimento_informatica')";
        $conn->query($sql_informatica);

        // Inserção de dados na tabela experiencia_profissional
        $sql_experiencia = "INSERT INTO experiencia_profissional (id_usuario, empresa_nome, atribuicoes, entrada, saida) 
                            VALUES ('$user_id', '$empresa', '$atribuicoes', '$entrada', '$saida')";
        $conn->query($sql_experiencia);

        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
