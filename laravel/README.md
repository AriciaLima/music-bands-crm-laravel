# 🎵 BandVault CRM

Uma aplicação Laravel 12 para gerenciar bandas de música, álbuns e informações relacionadas. Sistema completo com autenticação, dashboard administrativo e interface responsiva com Bootstrap 5.3.

## ✨ Features

- 🎸 **Gerenciamento de Bandas** - Criar, editar, visualizar e deletar bandas
- 💿 **Gerenciamento de Álbuns** - Associar álbuns às bandas com informações detalhadas
- 👤 **Autenticação & Autorização** - Sistema de login com roles (admin/user)
- 📊 **Dashboard Administrativo** - Estatísticas em tempo real e atalhos rápidos
- 📱 **Interface Responsiva** - Funciona perfeitamente em desktop, tablet e mobile
- 🔐 **Dois Fatores de Autenticação** - Suporte a 2FA com Laravel Fortify
- 🎨 **Design Moderno** - Bootstrap 5.3 com tema personalizado
- 💾 **Banco de Dados** - Sistema com relacionamentos e migrations

## 🚀 Requisitos

- **PHP 8.2+**
- **Composer**
- **Node.js 18+** (com npm)
- **SQLite** ou **MySQL/MariaDB**
- **Git**

## 📦 Instalação

### 1. Clone o repositório

```bash
git clone https://github.com/seu-usuario/music-bands-crm-laravel.git
cd music-bands-crm-laravel/laravel
```

### 2. Instale dependências PHP

```bash
composer install
```

### 3. Configure o ambiente

```bash
cp .env.example .env
php artisan key:generate
```

**Edite o `.env` com suas configurações de banco de dados:**

```env
DB_CONNECTION=sqlite
# ou para MySQL:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=bandvault
# DB_USERNAME=root
# DB_PASSWORD=
```

### 4. Instale dependências NPM

```bash
npm install
```

### 5. Compile os assets

```bash
npm run build
# ou para desenvolvimento com auto-reload:
npm run dev
```

### 6. Execute as migrations

```bash
php artisan migrate
```

### 7. (Opcional) Popule dados de exemplo

```bash
php artisan db:seed
```

### 8. Inicie o servidor

```bash
php artisan serve
```

Acesse em: **http://localhost:8000**

## 📝 Uso

### Registro & Login

1. Acesse a página inicial
2. Clique em **"Login"** ou **"Register"**
3. Preencha os dados
4. Faça login

### Admin Features

Apenas administradores têm acesso a:
- Criar novas bandas
- Criar álbuns
- Editar informações
- Dashboard com estatísticas

### Gerenciar Bandas

**Criar Banda:**
1. Go to **Bandas** → **Criar Banda**
2. Preencha: Nome, Gênero, Ano de Fundação
3. (Opcional) Upload de imagem
4. Salve

**Ver Banda:**
- Clique em qualquer banda na página inicial
- Veja todos os álbuns associados

**Editar Banda:**
- Na página da banda, clique **"Editar"**
- Modifique os dados
- Salve

### Gerenciar Álbuns

**Criar Álbum:**
1. Go to **Álbuns** → **Criar Álbum**
2. Selecione a banda
3. Preencha: Título, Data, Total de Faixas
4. Salve

**Editar Álbum:**
- Acesse o álbum
- Clique **"Editar"**
- Modifique
- Salve

## 🗂️ Estrutura do Projeto

```
laravel/
├── app/
│   ├── Models/
│   │   ├── User.php
│   │   ├── Band.php
│   │   └── Album.php
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── BandController.php
│   │   │   ├── AlbumController.php
│   │   │   └── DashboardController.php
│   │   └── Middleware/
│   │       └── IsAdmin.php
│   └── Providers/
├── database/
│   ├── migrations/
│   ├── factories/
│   └── seeders/
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   ├── bands/
│   │   ├── albums/
│   │   ├── auth/
│   │   ├── dashboard.blade.php
│   │   └── home.blade.php
│   ├── css/
│   └── js/
├── routes/
│   └── web.php
├── public/
│   ├── build/
│   └── storage/
└── config/
```

## 🗄️ Banco de Dados

### Tabelas

**Users**
```sql
- id
- name
- email
- password
- user_type (admin/user)
- email_verified_at
- timestamps
```

**Bands**
```sql
- id
- name
- genre
- founded_year
- description
- image
- timestamps
```

**Albums**
```sql
- id
- band_id (FK)
- title
- release_date
- total_tracks
- image
- timestamps
```

## 🎨 Tecnologias

- **Backend:** Laravel 12
- **Frontend:** Bootstrap 5.3, Blade Templates
- **Build Tool:** Vite
- **Database:** SQLite / MySQL
- **Authentication:** Laravel Fortify
- **Icons:** Bootstrap Icons
- **Package Manager:** Composer, npm

## 📋 Comandos Úteis

```bash
# Artisan Commands
php artisan tinker                    # Interagir com app via REPL
php artisan migrate                   # Executar migrations
php artisan migrate:rollback          # Desfazer última migration
php artisan db:seed                   # Popular banco com dados
php artisan cache:clear               # Limpar cache
php artisan config:cache              # Cachear configuração

# NPM Commands
npm run dev                            # Modo desenvolvimento
npm run build                          # Build produção
npm run watch                          # Watch files
```

## 🔐 Segurança

- Autenticação segura com Laravel Fortify
- Middleware de autorização para rotas admin
- CSRF protection em todos os formulários
- Password hashing com bcrypt
- Rate limiting em rotas sensíveis

## 📧 Contato & Suporte

Para reportar bugs ou sugerir features, abra uma issue no repositório.

## 📄 Licença

Este projeto está licenciado sob a licença MIT - veja o arquivo `LICENSE` para detalhes.

## 👨‍💻 Autor

BandVault CRM - Desenvolvido com ❤️

---

**Versão:** 1.0.0  
**Laravel:** 12.47.0  
**PHP:** 8.2+  
**Bootstrap:** 5.3  
**Data:** Janeiro 2026
