-- Tabela de Dados Pessoais
CREATE TABLE dados_pessoais (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_completo VARCHAR(255) NOT NULL,
    nome_social VARCHAR(255),
    sexo ENUM('Masculino', 'Feminino', 'Outros') NOT NULL,
    telefone1 VARCHAR(15),
    telefone2 VARCHAR(15),
    data_nascimento DATE NOT NULL,
    cpf VARCHAR(11) UNIQUE NOT NULL,
    rg_orgao_emissor VARCHAR(50),
    rg_numero VARCHAR(20),
    email VARCHAR(255) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL
);

-- Tabela de Endereço
CREATE TABLE endereco (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    uf VARCHAR(2) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    bairro VARCHAR(100) NOT NULL,
    estado VARCHAR(100) NOT NULL,
    complemento VARCHAR(255),
    FOREIGN KEY (id_usuario) REFERENCES dados_pessoais(id)
);

-- Tabela de Escolaridade
CREATE TABLE escolaridade (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    grau_instrucao VARCHAR(100),
    matricula VARCHAR(50),
    horario_disponivel VARCHAR(100),
    horario_estudo VARCHAR(100),
    FOREIGN KEY (id_usuario) REFERENCES dados_pessoais(id)
);

-- Tabela de Cursos
CREATE TABLE cursos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    curso_nome VARCHAR(255),
    FOREIGN KEY (id_usuario) REFERENCES dados_pessoais(id)
);

-- Tabela de Idiomas
CREATE TABLE idiomas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    idioma VARCHAR(50),
    nivel ENUM('Básico', 'Intermediário', 'Avançado') NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES dados_pessoais(id)
);

-- Tabela de Conhecimentos em Informática
CREATE TABLE conhecimentos_informatica (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    conhecimento VARCHAR(255),
    FOREIGN KEY (id_usuario) REFERENCES dados_pessoais(id)
);

-- Tabela de Aperfeiçoamento e Experiência
CREATE TABLE experiencia_profissional (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    empresa_nome VARCHAR(255),
    atribuicoes TEXT,
    entrada DATE,
    saida DATE,
    FOREIGN KEY (id_usuario) REFERENCES dados_pessoais(id)
);
