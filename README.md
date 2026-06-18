# Sistema de Controle de Chamados para Suporte de TI

Projeto acadêmico desenvolvido para auxiliar no registro, acompanhamento e gerenciamento de chamados técnicos relacionados a equipamentos de informática.

---

## Autores

* Julio Aparecido
* Julio Cesar
* Matheus Bassi Tomé

**Curso:** Técnico em Informática
**Disciplina:** Desenvolvimento de Sistemas

---

## Sobre o Projeto

O **Sistema de Controle de Chamados** foi desenvolvido com o objetivo de facilitar o registro e o gerenciamento de ocorrências relacionadas a equipamentos de informática.

Através do sistema, os usuários podem cadastrar chamados contendo informações sobre o equipamento, departamento, contato e descrição do problema encontrado. Além disso, é possível consultar os chamados registrados, visualizar detalhes e acompanhar o andamento de cada solicitação.

Este projeto foi desenvolvido como atividade acadêmica utilizando tecnologias web e banco de dados.

---

## Funcionalidades

* Login de usuário
* Cadastro de chamados
* Consulta de chamados
* Visualização detalhada dos chamados
* Alteração de status
* Dashboard com estatísticas
* Controle de sessões

---

## Tecnologias Utilizadas

### Front-End

* HTML5
* CSS3
* Bootstrap 5
* JavaScript

### Back-End

* PHP 8

### Banco de Dados

* MySQL

### Ambiente de Desenvolvimento

* XAMPP

---

## Estrutura do Projeto

```text
controle-chamados/
│
├── config/
│   └── conexao.php
│
├── database/
│   └── chamados.sql
│
├── pages/
│   ├── dashboard.php
│   ├── cadastrar.php
│   ├── listar.php
│   ├── visualizar.php
│   └── atualizar_status.php
│
├── index.php
├── logout.php
├── README.md
└── INSTRUCOES_BANCO_DE_DADOS.txt
```

---

## Configuração

Para configurar o banco de dados e executar o sistema, consulte o arquivo:

```text
INSTRUCOES_BANCO_DE_DADOS.txt
```

---

## Login Padrão

| Campo  | Valor                                         |
| ------ | --------------------------------------------- |
| E-mail | [admin@empresa.com](mailto:admin@empresa.com) |
| Senha  | 123456                                        |

---

## Divisão das Atividades

| Integrante             | Responsabilidades                                                                             |
| ---------------------- | --------------------------------------------------------------------------------------------- |
| **Julio Aparecido**    | Desenvolvimento do Front-End, estrutura das páginas, interface do usuário e integração visual |
| **Julio Cesar**        | Desenvolvimento do Back-End, integração com banco de dados e processamento das informações    |
| **Matheus Bassi Tomé** | Documentação do projeto, organização dos relatórios e descrição técnica do sistema            |

---

## Objetivos de Aprendizagem

Durante o desenvolvimento deste projeto foram aplicados conhecimentos relacionados a:

* Desenvolvimento Web
* Programação em PHP
* Integração com Banco de Dados
* Estruturação de Sistemas
* Trabalho em Equipe
* Resolução de Problemas
* Controle de Sessões e Autenticação

---

## Considerações Finais

Este projeto proporcionou uma experiência prática no desenvolvimento de sistemas web, permitindo aplicar conceitos estudados em sala de aula e compreender melhor a integração entre interface, lógica de negócio e banco de dados.

O sistema atende aos requisitos propostos para o gerenciamento básico de chamados de suporte técnico, oferecendo uma solução simples, funcional e organizada.
