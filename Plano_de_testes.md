# 📋 Plano de Testes - Cadastro e Listagem de Clientes (Techpines QA Test)

## 🎯 Objetivo

Garantir que a funcionalidade de cadastro e listagem de clientes no ERP fictício atenda aos requisitos de negócio, incluindo validação, segurança e usabilidade.

---

## 🧩 Escopo

- Cadastro de clientes com campos obrigatórios: **nome**, **CNPJ**, **e-mail**, **telefone**  
- Validação de **CNPJ** (formato e unicidade)  
- **Autenticação** obrigatória para cadastro  
- Aprovação e rejeição de cadastros por **administrador**  
- Listagem de clientes com **paginação** e **filtros** (nome, CNPJ, status)

---

## 🧪 Estratégia de Testes

### ✅ Testes Manuais

- Cobertura de **fluxos positivos** (ex: cadastro correto, listagem filtrada)
- Validações de erro (ex: campos obrigatórios ausentes, CNPJ inválido ou duplicado)
- Testes de fluxo administrativo (aprovação e rejeição)
- Testes de borda: paginação, ordenação, mensagens de erro e segurança HTTP

### 🤖 Testes Automatizados

- Suíte automatizada em Laravel usando `php artisan test`
- Testes separados por função/cenário
- Cobertura dos principais requisitos do sistema
- Uso de mocks/fakes para simular chamadas HTTP

---

## Roteiro de Casos de Teste Manuais

---

## 1. Casos de Teste Principais

| ID   | Descrição                                          | Prioridade | Status     |
|-------|---------------------------------------------------|------------|------------|
| CT01  | Cadastro com todos os campos obrigatórios preenchidos corretamente | Alta       | Concluído  |
| CT02  | Cadastro com CNPJ inválido                       | Alta        | Concluído  |
| CT03  | Cadastro com CNPJ já existente                   | Alta        | Concluído  |
| CT04  | Cadastro sem autenticação                         | Alta       | Concluído  |
| CT05  | Aprovação de cadastro pelo administrador         | Média       | Concluído  |
| CT06  | Cadastro rejeitado pelo administrador             | Média      | Concluído  |

### Exemplos detalhados

**CT01 – Cadastro com todos os campos obrigatórios preenchidos corretamente**  

- Objetivo: Garantir que o sistema permita cadastrar clientes quando todos os campos obrigatórios estão corretos.  
- Pré-requisito: Usuário autenticado com permissão para cadastrar clientes.  
- Passos:  
  1. Acessar a tela de cadastro.  
  2. Preencher nome, CNPJ válido, e-mail válido, telefone válido.  
  3. Enviar formulário.  
- Resultado esperado: Cliente cadastrado com status “pendente” e mensagem de sucesso.

---

## 2. Casos de Teste de Validação de Campos

| ID   | Descrição                                         | Prioridade | Status     |
|-------|--------------------------------------------------|------------|------------|
| CT07  | Cadastro sem campo “nome”                        | Alta       | Concluído  |
| CT08  | Cadastro sem campo “e‑mail”                      | Alta       | Concluído  |
| CT09  | Cadastro sem campo “telefone”                    | Alta       | Concluído  |
| CT10  | Cadastro sem campo “CNPJ”                        | Alta       | Concluído  |
| CT11  | Cadastro com campos nulos ou vazios              | Alta       | Concluído  |
| CT12  | Cadastro com e-mail inválido                     | Alta       | Concluído  |
| CT13  | Cadastro com e-mail contendo caracteres extras ou espaços | Alta | Concluído |
| CT14  | Cadastro com e-mail de domínio diferente do esperado | Média  | Concluído  |
| CT15  | Cadastro com e-mail já existente                 | Média      | Concluído  |
| CT16  | Cadastro com nome apenas primeiro nome           | Média      | Concluído  |
| CT17  | Cadastro com telefone sem DDD                    | Alta       | Concluído  |
| CT18  | Cadastro com celular sem dígito 9 obrigatório    | Alta       | Concluído  |
| CT19  | Cadastro com telefone internacional com código correto | Média | Concluído  |
| CT20  | Cadastro com telefone contendo caracteres inválidos ou letras | Alta | Concluído |
| CT21  | Cadastro com telefone já existente               | Alta       | Concluído  |
| CT22  | Cadastro usando celular no campo telefone (se permitido)| Média | Concluído |
| CT23  | Cadastro com CNPJ com mais dígitos que o esperado | Alta      | Concluído  |
| CT24  | Cadastro com CNPJ com menos dígitos que o esperado | Alta     | Concluído  |
| CT25  | Cadastro com CNPJ contendo caracteres especiais ou letras inválidas | Alta | Concluído |
| CT26  | Cadastro com CNPJ terminando com "0001"            | Média    | Concluído  |
| CT27  | Cadastro com CPF no campo CNPJ (inválido)          | Alta     | Concluído  |

---

## 3. Casos de Teste de Paginação e Filtros

| ID   | Descrição                                         | Prioridade | Status     |
|-------|------------------------------------------------- |------------|------------|
| CT28  | Validar a paginação da listagem                  | Média      | Concluído  |
| CT29  | Filtro por nome na listagem                      | Média      | Concluído  |
| CT30  | Filtro por CNPJ na listagem                      | Média      | Concluído  |
| CT31  | Filtro por status na listagem                    | Média      | Concluído  |
| CT32  | Paginação página zero ou negativa                | Média      | Concluído  |
| CT33  | Paginação além do fim                            | Média      | Concluído  |
| CT34  | Filtro combinado por nome + status               | Média      | Concluído  |
| CT35  | Filtro combinado por CNPJ + página               | Média      | Concluído  |
| CT36  | Ordenação de listagem (extra)                    | Baixa      | Concluído  |

---

## 4. Casos de Teste Extras e de Erro

| ID   | Descrição                                         | Prioridade | Status    |
|-------|--------------------------------------------------|------------|-----------|
| CT37  | Tratamento de erro 500 genérico                  | Média      | Concluído |
| CT38  | Rate limiting (429) (extra)                      | Baixa      | Concluído |
| CT39  | Buscar cliente inexistente                       | Baixa      | Concluído |
| CT40  | Tentar acessar área de admin sem permissão       | Baixa      | Concluído |

---

## 5. Casos Avançados da Lista de Cadastros

| ID   | Descrição                                        | Prioridade | Status     |
|-------|-------------------------------------------------|------------|------------|
| CT41  | Acesso à lista de cadastros pendentes sem obrigatoriedade de ação | Média | Concluído  |
| CT42  | Confirmação via pop-up para aprovar cadastro    | Média      | Concluído  |
| CT43  | Confirmação via pop-up para rejeitar cadastro   | Média      | Concluído  |

---

## 6. Casos de Teste Avançados para Filtros

| ID   | Descrição                                        | Prioridade | Status     |
|-------|-------------------------------------------------|------------|------------|
| CT44  | Filtro de CNPJ com ordenação por data (recente/mais antigo) | Média | Concluído  |

---

## 📊 Relatório dos Testes

Este roteiro contempla um total de **47 casos de teste manuais**, distribuídos conforme abaixo:

| Categoria                      | Nº de Casos | % do Total  |
|--------------------------------|-------------|-------------|
| 1. Casos de Teste Principais   | 6           | 12.77%      |
| 2. Casos de Teste de Validação | 28          | 59.57%      |
| 3. Casos de Teste de Paginação e Filtros | 9 | 19.15%      |
| 4. Casos de Teste Extras e de Erro | 4       | 8.51%       |
| **Total Geral**                | **47**      | **100%**    |

![Gráfico contendo a porcentagem e prioridade dos casos de testes](https://drive.google.com/file/d/1t84LkJlFflN8a67VyLsPuRjlSKoNYAvL/view?usp=drive_link)

---

Esta distribuição amplia a cobertura dos testes para abranger detalhadamente as validações de entrada (campos), os fluxos principais, a usabilidade dos filtros e paginação, além de tratamento de erros, garantindo a robustez da funcionalidade.

---

## 📁 Estrutura Recomendada

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
