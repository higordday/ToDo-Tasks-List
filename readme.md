
# ✅ ToDo Tasks List

Aplicação de lista de tarefas (ToDo) com **CRUD completo** de tarefas, desenvolvida em **PHP** com persistência em **MySQL**.

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Composer](https://img.shields.io/badge/Composer-885630?style=for-the-badge&logo=composer&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)

---

## ✨ Funcionalidades

- **Criar** novas tarefas
- **Listar** as tarefas cadastradas
- **Atualizar** tarefas existentes
- **Excluir** tarefas
- Persistência dos dados em **MySQL**
- Configuração por variáveis de ambiente (`.env`)

## 🛠️ Tecnologias

| Tecnologia | Uso |
| --- | --- |
| [PHP](https://www.php.net/) | Linguagem do back-end |
| [MySQL](https://www.mysql.com/) | Banco de dados |
| [Composer](https://getcomposer.org/) | Gerenciador de dependências |
| [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv) | Leitura das variáveis de ambiente |
| HTML5 / CSS3 | Interface da aplicação |

## 📁 Estrutura do projeto

```
ToDo-Tasks-List/
├── assets/
│   └── css/          # Estilos da interface
├── php/              # Lógica do back-end
├── views/            # Páginas da aplicação
├── index.php         # Ponto de entrada
├── composer.json     # Dependências do projeto
├── .env.example      # Exemplo de variáveis de ambiente
└── .gitignore
```

## 🚀 Como executar

### Pré-requisitos

- [PHP](https://www.php.net/downloads) instalado
- [Composer](https://getcomposer.org/download/) instalado
- Servidor [MySQL](https://www.mysql.com/) em execução

### Instalação

```bash
# 1. Clone o repositório
git clone https://github.com/higordday/ToDo-Tasks-List.git

# 2. Acesse a pasta do projeto
cd ToDo-Tasks-List

# 3. Instale as dependências
composer install
```

### Configuração

Crie um arquivo `.env` na raiz do projeto com base no `.env.example`:

```env
DATABASE_SERVER_HOST=localhost
DATABASE_SERVER_PORT=3306
DATABASE_AUTHENTICATION_CREDENTIAL_USERNAME=seu_usuario
DATABASE_AUTHENTICATION_CREDENTIAL_PASSWORD=sua_senha
DATABASE_NAME=nome_do_banco
```

| Variável | Descrição |
| --- | --- |
| `DATABASE_SERVER_HOST` | Endereço do servidor MySQL |
| `DATABASE_SERVER_PORT` | Porta do servidor MySQL (padrão: `3306`) |
| `DATABASE_AUTHENTICATION_CREDENTIAL_USERNAME` | Usuário do MySQL |
| `DATABASE_AUTHENTICATION_CREDENTIAL_PASSWORD` | Senha do MySQL |
| `DATABASE_NAME` | Nome do banco de dados (database) MySQL |

### Execução

Utilize o servidor embutido do PHP:

```bash
php -S localhost:8000
```

Depois, acesse `http://localhost:8000` no navegador.