# Projeto Cadastro de Visitantes (PHP + MySQL)

## Sobre

Este projeto foi desenvolvido como parte das atividades do curso Técnico em Desenvolvimento de Sistemas da ETEC Barretos.

Atualmente ele é utilizado como projeto de estudo contínuo durante a graduação em Sistemas de Informação, servindo como laboratório para aprofundar conhecimentos em desenvolvimento web utilizando PHP, integração com banco de dados MySQL, manipulação de formulários, consultas SQL, organização do código e boas práticas de desenvolvimento.

Além da implementação das funcionalidades propostas originalmente, o projeto vem sendo refatorado gradualmente para melhorar sua estrutura, segurança e manutenibilidade, registrando toda a evolução através do histórico de commits no GitHub.

---

## Tecnologias

- Linguagem: PHP
- Banco de Dados: MySQL
- Front-end: HTML5 + CSS3
- Estilização: CSS
- Acesso ao banco: MySQLi

---

## Melhorias Realizadas

### Funcionalidades

- Cadastro de visitantes.
- Consulta de registros cadastrados.
- Pesquisa de visitantes.
- Alteração de registros.
- Exclusão de registros.
- Listagem dos visitantes cadastrados.

### Banco de Dados

- Integração com banco de dados MySQL.
- Organização da estrutura para armazenamento dos visitantes.
- Configuração de codificação UTF-8 (`utf8mb4`).

### Organização

- Separação da conexão com o banco de dados em arquivo dedicado.
- Organização dos arquivos por funcionalidade.
- Estrutura simples para facilitar estudos e manutenção.

### Segurança

Durante a refatoração do projeto foram implementadas melhorias voltadas para aumentar a segurança da aplicação sem alterar seu objetivo didático.

- Isolamento das credenciais do banco de dados em arquivo de configuração (`credenciais.ini`).
- Carregamento automático das credenciais utilizando arquivo externo.
- Definição de valores padrão para ambiente de desenvolvimento.
- Configuração da conexão utilizando codificação UTF-8 (`utf8mb4`).
- Estrutura preparada para futuras melhorias relacionadas à validação de entradas e utilização de Prepared Statements.

---

## Roadmap de Desenvolvimento

### Fase 1 — Funcionalidades

- [x] Cadastro de visitantes.
- [x] Consulta de registros.
- [x] Pesquisa de visitantes.
- [x] Alteração de registros.
- [x] Exclusão de registros.

### Fase 2 — Banco de Dados

- [x] Integração com MySQL.
- [x] Organização da conexão.
- [x] Configuração do charset UTF-8.
- [ ] Adicionar Foreign Keys.
- [ ] Revisar normalização do banco.

### Fase 3 — Segurança

- [x] Separação das credenciais do banco.
- [x] Arquivo de configuração externo.
- [ ] Implementar Prepared Statements.
- [ ] Proteção contra SQL Injection.
- [ ] Validação dos dados recebidos pelos formulários.
- [ ] Escape de saída utilizando `htmlspecialchars()`.

### Fase 4 — Interface

- [ ] Melhorar layout.
- [ ] Tornar totalmente responsivo.
- [ ] Melhorar experiência do usuário.
- [ ] Padronizar componentes visuais.

### Fase 5 — Arquitetura

- [ ] Separar regras de negócio.
- [ ] Criar camada DAO/Repository.
- [ ] Reutilizar conexão com banco.
- [ ] Aplicar princípios de Programação Orientada a Objetos.

### Fase 6 — Funcionalidades

- [ ] Paginação dos resultados.
- [ ] Ordenação das consultas.
- [ ] Pesquisa avançada.
- [ ] Exportação dos dados.
- [ ] Sistema de autenticação.

---

## Objetivo Final

Transformar um projeto acadêmico desenvolvido durante o curso Técnico em Desenvolvimento de Sistemas da ETEC Barretos em uma aplicação cada vez mais próxima de sistemas utilizados profissionalmente, utilizando-o como laboratório para estudar desenvolvimento web com PHP, integração com bancos de dados relacionais, refatoração, segurança em aplicações web e boas práticas de programação.

Toda a evolução do projeto é documentada através do histórico de commits e versões do GitHub.

---

## Lista de Controle (Issues Relacionadas)

- Issue #1: [x] Implementar cadastro de visitantes.
- Issue #2: [x] Implementar consulta dos registros.
- Issue #3: [x] Implementar pesquisa.
- Issue #4: [x] Implementar alteração de registros.
- Issue #5: [x] Implementar exclusão de registros.
- Issue #6: [x] Separar a conexão com o banco.
- Issue #7: [x] Isolar credenciais em arquivo de configuração.
- Issue #8: [ ] Implementar Prepared Statements.
- Issue #9: [ ] Proteger contra SQL Injection.
- Issue #10: [ ] Validar entradas dos formulários.
- Issue #11: [ ] Implementar `htmlspecialchars()` nas saídas HTML.
- Issue #12: [ ] Melhorar responsividade.
- Issue #13: [ ] Refatorar utilizando Programação Orientada a Objetos.
- Issue #14: [ ] Criar camada Repository/DAO.
- Issue #15: [ ] Implementar sistema de autenticação.

---

## Configuração do Ambiente

O sistema utiliza um arquivo de configuração para armazenar as credenciais do banco de dados.

Crie o arquivo:

```ini
config/credenciais.ini
```

Utilizando a seguinte estrutura:

```ini
DB_HOST=seu_servidor_banco_dados
DB_NAME=seu_nome_banco_dados
DB_USER=seu_usuario_banco_dados
DB_PASS=sua_senha_banco_dados
```

---

## Como Executar o Projeto

Como o GitHub armazena apenas o código-fonte (não executando código PHP), existem algumas alternativas para executar o projeto.

### 1. Ambiente Local (Recomendado)

Utilize uma pilha de desenvolvimento como:

- XAMPP
- WAMP
- Laragon

Executando Apache + PHP + MySQL.

### 2. Docker (Objetivo Futuro)

No futuro o projeto poderá contar com um ambiente totalmente conteinerizado.

```bash
docker compose up
```

### 3. Ambiente de Produção (Hospedagem Web)

O sistema está publicado e operacional através do serviço **InfinityFree** para fins de demonstração, construção de portfólio e estudos.

Link do projeto:
https://cadastro-visitantes.freehosting.dev/
