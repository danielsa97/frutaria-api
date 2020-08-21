# Frutaria-API
Sistema de gerenciamento de venda de frutas(processo seletivo).
Este é back-end do sistema, desenvolvido com Laravel o mesmo funciona em 
conjunto com a interface "frutaria".\
[DEMO ONLINE](https://frutaria.danieldesa.com)\
Dados de acesso:\
E-mail: admin@admin.com\
Senha: password\

API de TESTE: [https://frutaria-api.danieldesa.com](https://danieldesa.com/project/frutaria/)
## Tecnologias do projeto
 - Laravel
## Requisitos do Sistema
- Sistema Operacional: Linux(preferencial Deepin OS), Windows 10 pro.
- Composer: Versão estável
- Git: Versão estável
- Docker ou pacote de desenvolvimento web(XAMPP, LAMPP, etc...)
- MySQL, MariaDB ou Postgres

## Instalação
- Fazer o clone do projeto.

```
git clone https://github.com/danielsa97/frutaria-api.git
```

- Abrir a pasta do projeto e instalar os módulos da aplicação.
```
composer install
```
- Acessar o SGBD(Preferencial MySQL) e criar o banco do sistema.

- Abra o arquivo `.ENV` na raiz do projeto, altere as variáveis de ambiente para 
se adequar ao cenário de sua infraestrutura.\

É de suma importancia configurar as variáveis de conexão com o banco de dados.
segue abaixo o exemplo de conexão.

 ```
DB_CONNECTION=mysql
DB_HOST=http://localhost
DB_PORT=3306
DB_DATABASE=frutaria
DB_USERNAME=root
DB_PASSWORD=root
 ```
- Pelo terminal execute o comando abaixo para gerar a chave da aplicação
````
php artisan key:generate
````

- Execute o comando abaixo para gerar a chave de segurança para autenticação JWT. 
````
php artisan jwt:secret
````

- Caso esteja em ambiente derivado do UNIX(Linux, MacOS), sera preciso dar 
permissões na pasta storage na raiz do projeto, para isso é necessario executar o camando abaixo com permissões de administrador.
```
$ chmod 777 -R storage
```

- Execute o comando abaixo para criar as tabelas do sistema e povoar o banco de dados
```
php artisan migrate --seed
```
