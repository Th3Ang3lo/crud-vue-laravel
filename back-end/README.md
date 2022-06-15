## Crud Laravel
Um simples projeto de Crud feito em Laravel para gerenciamento de usuários e tarefas.

#### OBS: É importante seguir todos os passos, na mesma ordem, estou supondo que você esteja utilizando sistema operacional Linux.

## Requisitos: PHP 8.0+, MySQL, Composer.

### Instruções para rodar o projeto:

1 - Clonando o repositório:
```zsh
git clone https://github.com/Th3Ang3lo/crud-vue-laravel.git
```

2 - Mude para o diretório do back-end
```zsh
cd crud-vue-laravel/back-end
```

3 - Instalando dependências do composer
```zsh
composer install
```

4 - Criando arquivo .env
```zsh
cp .env.example .env
```

5 - Modifique as variáveis do MySQL do .env para as configs de sua máquina
```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your-database
DB_USERNAME=root
DB_PASSWORD=
```

6 -Rodando as migrations:
```zsh
php artisan migrate
```

7 - Gerando encription key do laravel:
```zsh
php artisan key:generate
```

8 - Rodando o servidor web:
```zsh
php artisan serve
```

9 - Acessando o projeto: abra o navegador na URL: http://localhost:8000

## Comandos:
O projeto possui suporte a cadastro de administrador através de CLI.
```zsh
php artisan create:admin
```
