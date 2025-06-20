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

## 🧾 Resumo dos Casos de Teste

| ID    | Descrição                                      | Tipo   | Prioridade | Status   |
|-------|------------------------------------------------|--------|------------|----------|
| CT01  | Cadastro com todos os campos obrigatórios válidos | Manual | Alta       | Pendente |
| CT02  | Cadastro com CNPJ inválido                      | Manual | Alta       | Pendente |
| CT03  | Cadastro com CNPJ duplicado                     | Manual | Alta       | Pendente |
| CT04  | Cadastro sem autenticação                       | Manual | Alta       | Pendente |
| CT05  | Aprovação do cadastro pelo administrador        | Manual | Média      | Pendente |
| CT06  | Rejeição do cadastro pelo administrador         | Manual | Média      | Pendente |
| CT07  | Listagem com paginação                          | Manual | Média      | Pendente |
| CT08  | Filtro por nome                                 | Manual | Média      | Pendente |
| CT09  | Filtro por CNPJ                                 | Manual | Média      | Pendente |
| CT10  | Filtro por status                               | Manual | Média      | Pendente |
| CT36  | Cadastro sem campo “nome”                       | Manual | Alta       | Pendente |
| CT37  | Cadastro sem campo “e-mail”                     | Manual | Alta       | Pendente |
| CT38  | Cadastro sem campo “telefone”                   | Manual | Alta       | Pendente |
| CT39  | Cadastro sem campo “CNPJ”                       | Manual | Alta       | Pendente |
| CT40  | Cadastro com campos nulos ou vazios             | Manual | Alta       | Pendente |
| CT41  | Paginação com número de página inválido         | Manual | Média      | Pendente |
| CT42  | Paginação além do fim da lista                  | Manual | Média      | Pendente |
| CT43  | Filtro combinado por nome + status              | Manual | Média      | Pendente |
| CT44  | Filtro por CNPJ com paginação                   | Manual | Média      | Pendente |
| CT45  | Ordenação de listagem                           | Manual | Baixa      | Pendente |
| CT46  | Tratamento de erro 500                          | Manual | Média      | Pendente |
| CT47  | Simulação de muitas requisições (429)           | Manual | Baixa      | Pendente |
| CT48  | Buscar cliente inexistente (404)                | Manual | Baixa      | Pendente |
| CT49  | Acesso sem permissão (403)                      | Manual | Baixa      | Pendente |

---

## 📊 Cobertura por Prioridade

| Prioridade | Quantidade de Casos | % Estimado |
|------------|---------------------|------------|
| Crítico    | 6                   | 25%        |
| Alta       | 6                   | 25%        |
| Média      | 8                   | 33%        |
| Baixa      | 4                   | 17%        |

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
