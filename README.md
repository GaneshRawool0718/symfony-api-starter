# symfony-api-starter


## 1. Project Overview
This project is a **Symfony 4.4 REST API starter** that includes:

- User module with full CRUD functionality  
- Service and repository layers  
- Annotation-based routing with a global `/api` prefix  
- Docker setup for PHP, Nginx, and PostgreSQL  
- Symfony Kernel configuration for bootstrapping  

The goal is to provide a **clean, extensible, and maintainable backend starter** for new Symfony applications.

---

## 2. Features
- User Entity, Repository, Service, and Controller  
- REST endpoints for user creation, retrieval, update, and deletion  
- Doctrine ORM integration  
- Clean architecture with layered design  
- Fully Dockerized environment  
- Annotation-driven routing  
- Ready-to-use API base structure  

---

## 3. Technologies Used
- Symfony 4.4  
- PHP 7.4  
- Doctrine ORM  
- PostgreSQL  
- Docker & Docker Compose  
- Nginx  
- Composer  

---

## 4. Project Structure


```
symfony-api-starter
├─ .env
├─ bin
│  └─ console
├─ compose.override.yaml
├─ composer.json
├─ composer.lock
├─ config
│  ├─ bootstrap.php
│  ├─ bundles.php
│  ├─ packages
│  │  ├─ cache.yaml
│  │  ├─ doctrine.yaml
│  │  ├─ doctrine_migrations.yaml
│  │  ├─ framework.yaml
│  │  ├─ prod
│  │  │  ├─ doctrine.yaml
│  │  │  └─ routing.yaml
│  │  ├─ routing.yaml
│  │  ├─ sensio_framework_extra.yaml
│  │  └─ test
│  │     └─ framework.yaml
│  ├─ routes
│  │  ├─ annotations.yaml
│  │  └─ dev
│  │     └─ framework.yaml
│  ├─ routes.yaml
│  └─ services.yaml
├─ docker
│  ├─ nginx
│  │  └─ default.conf
│  └─ php
│     └─ Dockerfile
├─ docker-compose.yml
├─ migrations
│  ├─ Version20251121044258.php
│  └─ Version20251121044641.php
├─ public
│  └─ index.php
├─ README.md
├─ src
│  ├─ Controller
│  │  ├─ HealthCheckController.php
│  │  └─ UserController.php
│  ├─ Entity
│  │  └─ User.php
│  ├─ Kernel.php
│  ├─ Repository
│  │  └─ UserRepository.php
│  └─ Service
│     └─ UserService.php
└─ symfony.lock

```
## 5. Installation
Clone the repository:
```
git clone <your-repository-url>
cd symfony-api-starter
```
## 6. Install dependencies:
```
composer install

```
## 7. Running the Application
Start Docker containers:
```
docker-compose up -d
```
## Getting Started
```bash
# Install dependencies
composer install

# Start the development server
symfony serve
``` 
Run database migrations:
```
php bin/console doctrine:migrations:migrate
```
## 8. API Documentation

## API Endpoints Summary

| Method | Endpoint | Description |
|--------|----------|-------------|
| POST | /api/users | Create user |
| GET | /api/users | Get all users |
| GET | /api/users/{id} | Get single user |
| PUT | /api/users/{id} | Update user |
| DELETE | /api/users/{id} | Delete user |

## API Demo

### Create User — POST /api/users

**Request Body**
```json
{
  "name": "Ganesh Rawool"
}
```

**cURL**
```bash
curl -X POST http://localhost:8000/api/users \
  -H "Content-Type: application/json" \
  -d '{"name":"Ganesh Rawool"}'
```

**Response**
```json
{
  "message": "User created",
  "id": 6
}
```

### Get All Users — GET /api/users

**cURL**
```bash
curl http://localhost:8000/api/users
```

**Response**
```json
[
  {
    "id": 1,
    "name": "Ganesh Rawool"
  },
  {
    "id": 2,
    "name": "Virat Kohli"
  },
  {
    "id": 3,
    "name": "Bipin Rawool"
  },
  {
    "id": 6,
    "name": "Ganesh Rawool"
  }
]
```

### Get Single User — GET /api/users/{id}

**cURL**
```bash
curl http://localhost:8000/api/users/5
```

**Response**
```json
{
  "id": 5,
  "name": "John Doe"
}
```

### Update User — PUT /api/users/{id}

**Request Body**
```json
{
  "name": "John look"
}
```

**cURL**
```bash
curl -X PUT http://localhost:8000/api/users/5 \
  -H "Content-Type: application/json" \
  -d '{"name":"John look"}'
```

**Response**
```json
{
  "message": "User updated",
  "id": 5
}
```

### Delete User — DELETE /api/users/{id}

**cURL**
```bash
curl -X DELETE http://localhost:8000/api/users/5
```

**Response**
```json
{
  "message": "User deleted"
}
```