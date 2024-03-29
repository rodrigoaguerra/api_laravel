# Projeto Busca CEP
O projeto consiste em um sistema para buscar informações de CEPs em um banco de dados local ou em uma API externa (como a ViaCEP), permitindo a consulta de endereços por CEPs específicos e implementando uma funcionalidade de busca difusa (fuzzy search) para encontrar CEPs com base em termos parciais do endereço.

### Passo a passo
Clone Repositório
```sh
git clone https://github.com/rodrigoaguerra/api_laravel.git
```

Navegue para pasta do projeto

```sh
cd api_laravel/
```

Crie o Arquivo .env
```sh
cp .env.example .env
```

Atualize as variáveis de ambiente do arquivo .env
```dosini

DB_CONNECTION=mysql
DB_HOST=SEU_HOST
DB_PORT=SUA_PORTA
DB_DATABASE=SUA_BASE_DE_DADOS
DB_USERNAME=SEU_USERNAME
DB_PASSWORD=SEU_PASSWORD

```

Instalar as dependências do projeto
```sh
composer install
```

Migrar o bando de dados do laravel
```sh
php artisan migrate
```

Popular o bando de dados
```sh
php artisan db:seed --class=CepSeeder
```

Gerar a key do projeto Laravel
```sh
php artisan key:generate
```

Rodar o servidor na porta 8000
```sh
php artisan serve
```

Importar o arquivo "Laravel.postman_collection.json" para o software "POSTMAN"
nele contém as rotas para o teste do projeto;
