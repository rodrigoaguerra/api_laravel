# Projeto Busca CEP
O projeto consiste em um sistema para buscar informações de CEPs em um banco de dados local ou em uma API externa (como a ViaCEP), permitindo a consulta de endereços por CEPs específicos e implementando uma funcionalidade de busca difusa (fuzzy search) para encontrar CEPs com base em termos parciais do endereço.

### Requerimentos 
- PHP ^8.2
- MYSQL ^5
- Composer ^2

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

Importar o arquivo "Laravel.postman_collection.json", presente na pasta 'api_laravel', para o software "POSTMAN",
nele contém as rotas para o teste do projeto;

### Rotas para endpoints

- [GET] /api/cep/{seu-cep} = busca na base local ou em uma api externa
- [POST] /api/cep = cria um novo cep na base de dados local
- [PATCH] /api/cep = atualiza dados do cep na base local
- [DELETE] /api/cep/{seu-cep} = remove um cep da base local
- [GET] /api/busca/{searchTerm} = faz a busca difusa no banco de dados  
