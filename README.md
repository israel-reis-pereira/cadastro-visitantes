# Projeto Cadastro de Visitantes (PHP + MySQL)

## Sobre
Este projeto foi desenvolvido originalmente como parte das atividades do curso Técnico em Desenvolvimento de Sistemas da ETEC Barretos.

Atualmente ele é utilizado como projeto de estudo contínuo durante a graduação em Sistemas de Informação, servindo como laboratório para aprofundar conhecimentos em desenvolvimento web utilizando PHP, integração com banco de dados MySQL, manipulação de formulários, consultas SQL, organização do código e boas práticas de desenvolvimento.

O projeto passou por uma profunda refatoração estrutural voltada a alinhar o sistema aos padrões de segurança e usabilidade exigidos pelo mercado em julho de 2026, mantendo o histórico evolutivo documentado através dos commits no GitHub.

---

## Tecnologias
* Linguagem: PHP (Totalmente compatível com as versões 7.0 a 8.3+)
* Banco de Dados: MySQL / MariaDB
* Extensão de Conexão: MySQLi (Com instruções parametrizadas)
* Front-end: HTML5 + CSS3 (Design nativo fluido)
* Estilização: CSS customizado (Layout adaptável em preto e branco com efeitos táteis)

---

## Melhorias Realizadas

### Funcionalidades e Usabilidade
* **Navegação Consistente**: Menu principal estruturado para dar acesso apenas a interfaces legítimas de usuário, ocultando scripts de processamento de segundo plano.
* **Paginação de Resultados**: Implementada paginação em lote no arquivo de leitura, limitando a exibição a 20 mensagens por página com botões dinâmicos de avanço e retrocesso.
* **Persistência de Dados**: Preservação dos textos digitados pelo visitante nos campos de entrada caso o formulário recarregue por falhas de preenchimento.

### Banco de Dados e Conexão
* **Isolamento de Credenciais**: Separação completa da configuração de rede do banco de dados em arquivo `.ini` externo.
* **Fechamento de Conexões Global**: Ajustada a arquitetura de rodapé para garantir que os links com o MySQL sejam encerrados em 100% dos cenários, liberando memória RAM e prevenindo travamentos por estouro de limites simultâneos de conexões.
* **Consistência de Codificação**: Configuração explícita do charset `utf8mb4` eliminando problemas de corrupção ou perda de caracteres especiais e acentuações.

### Segurança Avançada
* **Prepared Statements com MySQLi**: Substituição de todas as consultas concatenadas antigas por declarações preparadas (`mysqli_prepare`), neutralizando de ponta a ponta qualquer risco de **SQL Injection**.
* **Defesa contra XSS (Cross-Site Scripting)**: Implementação global da função `htmlspecialchars(..., ENT_QUOTES, "UTF-8")` na renderização de dados textuais gravados, blindando o front-end contra injeções de códigos JavaScript maliciosos.
* **Proteção Direta de Pastas**: Adicionado arquivo de configuração `.htaccess` para bloquear qualquer leitura ou listagem não autorizada de diretórios de sistema via navegador.
* **Validação Rígida de Parâmetros**: Conversão estrita de chaves primárias e IDs de URL para o tipo inteiro `(int)`, anulando payloads inválidos de exclusão ou edição.

### Front-end Responsivo e Tátil
* **Layout Adaptável (Mobile)**: Desconstrução inteligente de tabelas de listagem que as transforma automaticamente em cartões verticais empilhados no celular, eliminando completamente a barra de rolagem lateral e deixando os dados 100% visíveis de cara.
* **Mapeamento de Legendas Inteligente**: Utilização de classes CSS específicas por coluna para carregar as legendas correspondentes de cada página, evitando falhas de alinhamento entre listagens de 5 e 7 colunas no mobile.
* **Animação Tátil Sem Cores**: Identidade em preto e branco minimalista contendo efeitos dinâmicos de elevação vertical (`translateY`) ao passar o mouse e encolhimento de escala de clique físico (`scale`) ao pressionar botões em computadores ou celulares.

---

## Roadmap de Desenvolvimento

### Fase 1 — Funcionalidades
- [x] Cadastro de visitantes (`assinar.php`).
- [x] Consulta de registros (`consultar.php`).
- [x] Pesquisa de visitantes com buscas aproximadas (`resultados.php`).
- [x] Seleção centralizada e alteração de registros (`procurar.php` / `exibe.php` / `alterar.php`).
- [x] Exclusão direta e segura de registros (`deletar.php`).

### Fase 2 — Banco de Dados
- [x] Integração com MySQLi.
- [x] Organização global da conexão e tratativas de erros.
- [x] Configuração nativa do charset `utf8mb4`.
- [ ] Adicionar chaves estrangeiras (`Foreign Keys`).
- [ ] Revisar normalização estrutural das tabelas.

### Fase 3 — Segurança
- [x] Separação das credenciais do banco em arquivo dedicado.
- [x] Arquivo de configuração externo restrito.
- [x] Bloqueio de acesso a pastas com Apache `.htaccess`.
- [x] Implementar Prepared Statements em todas as queries.
- [x] Proteção total contra SQL Injection.
- [x] Validação, limpeza de strings (`trim`) e coerção de tipos numéricos.
- [x] Escape completo de saídas HTML contra XSS.

### Fase 4 — Interface e Responsividade
- [x] Layout minimalista focado em alto contraste (Preto e Branco).
- [x] Componentes totalmente responsivos sem quebra de tela no mobile.
- [x] Inclusão de rótulos de dados flutuantes no celular.
- [x] Animações e feedback de clique tátil nos botões em todas as plataformas.

### Fase 5 — Arquitetura (Objetivo Futuro)
- [ ] Separar as regras de negócio do código de visualização.
- [ ] Migrar a extensão de acesso de MySQLi para o padrão PDO.
- [ ] Implementar o padrão estrutural DAO ou Repository para gerenciamento de dados.
- [ ] Aplicar encapsulamento avançado através de Programação Orientada a Objetos (POO).

### Fase 6 — Funcionalidades Avançadas
- [x] Paginação dinâmica de registros por página (`ler.php`).
- [ ] Sistema de filtros avançados combinando múltiplos inputs.
- [ ] Sistema de autenticação de usuários administradores (Login/Logout seguro).

---

## Lista de Controle (Issues Relacionadas)
* Issue #1: [x] Implementar cadastro de visitantes.
* Issue #2: [x] Implementar consulta dos registros.
* Issue #3: [x] Implementar pesquisa.
* Issue #4: [x] Implementar alteração de registros.
* Issue #5: [x] Implementar exclusão de registros.
* Issue #6: [x] Separar a conexão com o banco em arquivo isolado.
* Issue #7: [x] Isolar credenciais em arquivo de configuração externo.
* Issue #8: [x] Implementar Prepared Statements.
* Issue #9: [x] Proteger o banco contra SQL Injection.
* Issue #10: [x] Validar e higienizar dados de entrada dos formulários.
* Issue #11: [x] Implementar `htmlspecialchars()` nas saídas HTML.
* Issue #12: [x] Aplicar responsividade nativa sem barras de rolagem.
* Issue #13: [x] Adicionar efeitos táteis de clique nos botões.
* Issue #14: [x] Bloquear acesso público às pastas de sistema com `.htaccess`.
* Issue #15: [ ] Refatorar o projeto utilizando o padrão de arquitetura MVC.

---

## Configuração do Ambiente

O sistema utiliza arquivos locais isolados para gerenciar o acesso de dados com segurança.

### 1. Arquivo de Credenciais
Crie o arquivo de configurações exatamente no caminho interno abaixo:
```ini
atv060526/config/credenciais.ini
```

Configure as variáveis de acordo com as informações de rede do seu banco de dados:
```ini
DB_HOST=seu_servidor_banco_dados
DB_NAME=seu_nome_banco_dados
DB_USER=seu_usuario_banco_dados
DB_PASS=sua_senha_banco_dados
```

### 2. Arquivo de Proteção Apache
Para impedir que o arquivo `.ini` seja lido de forma direta pela internet, garanta a existência do arquivo de configuração do servidor na mesma pasta:
```apache
/config/.htaccess
```

Insira a seguinte regra de bloqueio total:
```apache
Deny from all
```

---

## Como Executar o Projeto

Como o GitHub armazena apenas o código-fonte estático, existem alternativas para executar o seu ecossistema web localmente ou em nuvem:

### 1. Ambiente Local (Desenvolvimento)
Utilize uma pilha de servidores local (como **XAMPP**, WAMP ou Laragon) rodando o servidor Apache (com suporte a PHP) e o MySQL ativos. Mantenha os seus arquivos de código dentro do diretório padrão `htdocs/`.

### 2. Ambiente de Produção (Hospedagem Web)
O sistema está totalmente publicado, configurado e operacional na nuvem através do serviço **InfinityFree** para fins de portfólio profissional e demonstrações técnicas.

Link oficial do projeto: [http://freehosting.dev
](https://cadastro-visitantes.freehosting.dev/)
