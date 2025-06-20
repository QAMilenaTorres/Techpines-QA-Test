# 🧪 Projeto de Testes - Cadastro e Listagem de Clientes

## 📖 Visão Geral

Este projeto contém os casos de teste manuais e automatizados para o sistema fictício de cadastro e listagem de clientes em cooperativas.  
O foco está na validação dos campos, regras de autenticação, fluxos administrativos e listagem com filtros e paginação.

---

## 🎯 Objetivo do Projeto

Automatizar e validar os fluxos críticos do sistema, simulando a API por meio de testes com Laravel, para garantir a confiabilidade da aplicação.

---

## 🚦 Priorização dos Casos de Teste

| Prioridade | Descrição                                       | Exemplos de Casos                                                                      |
|------------|------------------------------------------------|----------------------------------------------------------------------------------------|
| **Crítico** | Funcionalidades essenciais do sistema          | Cadastro válido, CNPJ duplicado, Autenticação, Aprovação de cadastro, Campos obrigatórios |
| **Alto**    | Validações importantes                         | E-mail e telefone inválidos, Rejeição de cadastro, Filtros básicos                     |
| **Médio**   | Casos de borda e testes complementares         | Filtros combinados, Paginação inválida, Ordenação, Erros HTTP                          |
| **Baixo**   | Casos de segurança e limites                   | Rate limiting (429), Erro 403/404, Mensagens de erro padronizadas                      |

---

## 📋 Lista Resumida dos Casos de Teste Selecionados

📋 Lista Resumida dos Casos de Teste Selecionados

- Cadastro com todos os campos obrigatórios preenchidos corretamente (Crítico)
- Cadastro com CNPJ inválido (Crítico)
- Cadastro com CNPJ já existente (Crítico)
- Cadastro sem autenticação (Crítico)
- Aprovação de cadastro pelo administrador (Crítico)
- Rejeição de cadastro pelo administrador (Alto)
- Filtros básicos e paginação na listagem (Alto/Médio)
- Filtros combinados e ordenação (Médio)
- Tratamento de erro genérico (500) (Médio)
- Rate limiting e restrições de requisição (429) (Baixo)
- Acesso indevido (403) e recurso inexistente (404) (Baixo)
- Validação de nome com espaços em branco (Crítico)
- Validação de e-mail com espaços e formato errado (Crítico)
- Validação de e-mail duplicado (Crítico)
- Validação de telefone com letras (Crítico)
- Validação de telefone duplicado (Crítico)
- Validação de CNPJ com letras (Crítico)
- Validação de CNPJ com números a mais ou a menos (Crítico)
- Inserção de CPF no campo CNPJ (Crítico)
- Usuário autenticado pode cadastrar (Crítico)
- Usuário não autenticado não pode cadastrar (Crítico)
- Requisição com método incorreto (405) (Médio)
- Requisição com cabeçalho incorreto (400) (Médio)
- Requisição com query string incorreta (400) (Médio)
- Requisição com corpo incorreto (422) (Médio)
- Requisição com tempo limite excedido (504) (Baixo)

---

## 📊 Cobertura por Prioridade

| Prioridade | Quantidade (%) |
|------------|----------------|
| Crítico    | 40%            |
| Alto       | 30%            |
| Médio      | 20%            |
| Baixo      | 10%            |

---

## 🛠️ Como Rodar os Testes Automatizados

Este projeto utiliza o framework Laravel e os testes foram desenvolvidos usando o comando `php artisan test`.

### Pré-requisitos

- Ter o PHP instalado (recomendado: PHP 8.0 ou superior)
- Ter o Composer instalado (gerenciador de dependências do PHP)
- Ter um terminal (como PowerShell ou Git Bash) e acesso à internet
- Ter o Laravel instalado ou o projeto clonado

---

### Passos para executar os testes

1. Clone o repositório no seu computador:  
   Acesse o GitHub e copie a URL do projeto. No terminal, digite:  
   git clone [Github link do repositório](https://github.com/QAMilenaTorres/Techpines-QA-Test.git)
   Depois entre na pasta do projeto com o comando:  
   cd Techpines-QA-Test

2. Instale as dependências do projeto:  
   Digite no terminal:  
   composer install

3. Copie o arquivo `.env.example` e renomeie como `.env`:  
   No terminal, digite:  
   cp .env.example .env  
   (ou copie manualmente dentro do explorador de arquivos)

4. Gere a chave do Laravel:  
   Digite:  
   php artisan key:generate

5. Execute todos os testes:  
   Digite:  
   php artisan test
   *O código com toda a automação está em Tests>Feature>ClienteApiTeste.php
   Você verá os testes sendo executados e os resultados aparecendo na tela.

7. (Opcional) Para rodar apenas uma classe de teste específica:  
   Digite:  
   php artisan test --filter=ClienteApiTest

8. (Opcional) Para rodar apenas um método de teste dentro de uma classe:  
   Digite:  
   php artisan test --filter=nome_do_metodo

---

### Dicas importantes

- Se aparecer erro sobre "openssl", ative essa extensão no seu `php.ini`.
- Os testes são simulados com fakes, então **não precisa rodar um backend de verdade**.
- Você pode rodar apenas os testes de funcionalidade com o comando:  
  php artisan test --testsuite=Feature

---

## 🗂️ Estrutura do Projeto

Techpines-QA-Test/
├── README.md
├── tests/
│ └── Feature/
│ └── ClienteApiTest.php
├── docs/
│ └── Plano_de_Testes.md
├── .env.example
├── composer.json
└── ...

---

## ⚠️ Observação

- A solução não utiliza Docker ou Laravel Sail, pois o foco foi direcionado para garantir a clareza, funcionalidade e fácil execução dos testes em qualquer ambiente PHP configurado. A escolha visa facilitar a avaliação direta dos testes e priorizar a compatibilidade com setups locais sem dependências adicionais.

---

## Boa sorte pra nós :) 🖤
