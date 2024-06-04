
# IntegraCEP SETUP

### Passo a passo
Clonar repositório
```sh
git clone https://github.com/JPedroCavalcante/integra-cep.git integra-cep
```

Acessar pasta do projeto
```sh
cd integra-cep
```

Suba os containers do projeto
```sh
docker-compose up -d
```

Crie o Arquivo .env
```sh
cp .env.example .env
```

Acesse o container app
```sh
docker-compose exec app bash
```

Instalar pacotes do projeto
```sh
composer install
```

Gere a key do projeto Laravel
```sh
php artisan key:generate
```

Rodar as migrations
```sh
php artisan migrate
```

Acesse o projeto
[http://localhost:8000](http://localhost:8000)
