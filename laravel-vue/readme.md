# Api de Contas a pagar

- Laravel 5.3 + Vue Js + SqlLite
 

**Instruções de instalação localmente:**


1. Fazer o clone do repositório

2. Acessar a pasta raiz no Terminal

3. Rodar `composer install`

4. Rodar `php -S localhost:8000 -t public/`


**Instruções de instalação servidor:**

1. Fazer o clone do repositório

2. Acessar a pasta raiz no Terminal

3. Rodar `composer install`

5. Criar arquivo `.htaccess` na raiz do servidor: 

    # Ativa PHP 5.6 para Laravel
    AddHandler application/x-httpd-php56 .php
    ## Redirect to public folder
    <IfModule mod_rewrite.c>
        RewriteEngine on
        RewriteRule ^$ ws/public/ [L]
        RewriteRule (.*) ws/public/$1 [L]
    </IfModule>
