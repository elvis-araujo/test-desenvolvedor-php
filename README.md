
# 🧪 :Upd8 - Teste Desenvolvedor PHP

Projeto CRUD utilizando Laravel 10 com modelagem relacional entre **Estados**, **Cidades**, **Clientes** e **Representantes**. O projeto inclui migrations, seeders e factories completas para geração automatizada de dados.

---

## 📁 Entidades e Relacionamentos

### Entidades

- `State` → Estados (ex: SP, RJ)
- `City` → pertence a um Estado
- `Customer` → pertence a uma Cidade
- `Representative` → pertence a uma Cidade

### Relacionamentos

```
State 1 --- * City
City  1 --- * Customer
City  1 --- * Representative
```

---
## 🌐 Estrutura da Aplicação

Este projeto utiliza **duas instâncias do Laravel** rodando de forma independente:

| Aplicação         | Porta sugerida | Descrição                         |
|-------------------|----------------|-----------------------------------|
| API               | `8001`         | Responsável pelas rotas RESTful   |
| Interface Web     | `8000`         | Responsável pela UI em Blade      |

> ✅ **Importante:** Certifique-se de iniciar **dois servidores `artisan serve` em portas diferentes**:
>
> - API: `php artisan serve --port=8001`
> - Web: `php artisan serve --port=8000`

> A interface Web se comunica com a API via chamadas HTTP. O endpoint da API deve estar corretamente configurado no `.env` do frontend:
>
> ```env
> API_URL=http://localhost:8001/api
> ```

---

## 📘 API – Customers

API RESTful para gerenciamento de clientes. Permite listar, criar, visualizar, atualizar e excluir clientes, com seus relacionamentos com cidade e estado.

---

## 🔐 Autenticação

> 🔓 A API está pública (sem autenticação).  
> Em ambientes de produção, recomenda-se implementar **Laravel Sanctum** ou **Passport**.

---

## 📦 Endpoints Disponíveis

| Método | Rota                 | Descrição                         |
|--------|----------------------|-----------------------------------|
| GET    | /api/customers       | Listar todos os clientes          |
| POST   | /api/customers       | Criar um novo cliente             |
| GET    | /api/customers/{id}  | Obter os dados de um cliente      |
| PUT    | /api/customers/{id}  | Atualizar um cliente existente    |
| DELETE | /api/customers/{id}  | Excluir um cliente|
| GET | /api/states  | Listar todos os estados
| GET | /api/cities | 	Listar todas as cidades 
| GET | /api/cities?state_id=1  |	Listar cidades filtrando por estado
  

---

## 📄 Modelo de Dados – Customer

| Campo       | Tipo     | Obrigatório | Descrição                        |
|-------------|----------|-------------|----------------------------------|
| name        | string   | ✅           | Nome do cliente                  |
| document    | string   | ✅           | CPF ou identificador único       |
| birth_date  | date     | ❌           | Data de nascimento (YYYY-MM-DD)  |
| sex         | string   | ❌           | "M" ou "F"                        |
| city_id     | integer  | ✅           | ID da cidade relacionada         |

---

## 🔍 Exemplo de Resposta – GET /api/customers

```json
{
  "data": [
    {
      "id": 1,
      "name": "João da Silva",
      "document": "12345678900",
      "birth_date": "1990-01-01",
      "sex": "M",
      "city": {
        "id": 1,
        "name": "São Paulo",
        "state": {
          "id": 1,
          "name": "São Paulo",
          "abbreviation": "SP"
        }
      }
    }
  ],
  "links": {},
  "meta": {}
}
```

---

## 🚀 Instalação e Execução

### ✅ Requisitos

- PHP 8.1+
- Composer
- MySQL 5.7+ ou MariaDB
- Laravel 10

### 1. Clonar o repositório

```bash
git clone https://github.com/seuusuario/seurepositorio.git
cd seurepositorio
```

### 2. Instalar dependências

```bash
composer install
```

### 3. Configurar ambiente

```bash
cp .env.example .env
php artisan key:generate
```

Edite o arquivo `.env` e configure os dados do seu banco de dados MySQL.

### 4. Rodar as migrations e seeds

```bash
php artisan migrate:fresh --seed
```

> Isso criará as tabelas e populá o banco com **estados, cidades, clientes e representantes** usando seeders e factories.

### 5. Servir o projeto

```bash
php artisan serve
```

A aplicação estará disponível em: [http://localhost:8000](http://localhost:8000)

---

## 🧪 Testes (opcional)

Caso tenha criado testes, execute:

```bash
php artisan test
```

---

## 🚀 Agradecimento

Obrigado por avaliar este teste!  
Estou à disposição para qualquer dúvida ou esclarecimento adicional.

---
