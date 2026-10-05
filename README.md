# 🔧 Oficina-SAEP

Sistema web desenvolvido para gerenciamento de uma oficina mecânica, permitindo organizar clientes, veículos e agendamentos de serviços.

## 📋 Sobre o projeto

O **Oficina-SAEP** é um sistema desenvolvido como projeto acadêmico para facilitar o gerenciamento das informações de uma oficina.

O sistema permite cadastrar, consultar, editar e excluir:

- 👤 Clientes
- 🚗 Veículos
- 📅 Agendamentos

Além disso, os veículos são vinculados aos seus respectivos clientes e os agendamentos são relacionados aos clientes e veículos.

## 🎯 Objetivo

O objetivo do projeto é desenvolver uma aplicação web simples e funcional para auxiliar no controle das atividades de uma oficina, centralizando as informações e facilitando o gerenciamento dos serviços.

## ⚙️ Funcionalidades

### 🔐 Login

- Tela de login.
- Autenticação de usuários.
- Controle de acesso às páginas protegidas.
- Logout.

### 👤 Clientes

- Listagem de clientes.
- Pesquisa de clientes.
- Cadastro de novos clientes.
- Edição de clientes.
- Exclusão de clientes.

### 🚗 Veículos

- Listagem de veículos.
- Pesquisa de veículos.
- Cadastro de veículos.
- Edição de veículos.
- Exclusão de veículos.
- Associação do veículo a um cliente.

### 📅 Agendamentos

- Listagem de agendamentos.
- Pesquisa de agendamentos.
- Cadastro de agendamentos.
- Edição de agendamentos.
- Exclusão de agendamentos.
- Associação do agendamento a um cliente.
- Associação do agendamento a um veículo.

## 🛠️ Tecnologias utilizadas

- PHP
- CodeIgniter 4
- MySQL
- HTML5
- CSS3
- Git
- GitHub

## 🗄️ Banco de dados

O sistema utiliza um banco de dados MySQL para armazenar as informações.
<img src="https://github.com/BragaMaria08/Oficina-saep/blob/main/oficina-saep/BD_SAEP_OFICINA_MECANICA/DER_OFICINA_MECANICA.png" width="700">

### Principais tabelas

```text
USUARIOS
    ↓
CLIENTES
    ↓
VEICULOS
    ↓
AGENDAMENTOS
