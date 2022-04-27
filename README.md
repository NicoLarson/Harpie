# Harpie

## Description

- Symfony 5.4 (BackEnd)
- Twig/VueJs (FrontEnd)
- PostgresSQL 11 (Base de données)

## Download composer dependencies

```bash
composer install
```


## Create Postgresql database

```bash
# Make sure you have started postgresql
sudo service postgresql start
# Connection à postgresql
sudo -i -u postgres
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
```

## Running Symfony Applications

```bash
symfony server:start
```
## Running webpack

```bash
npm install
npm run dev
```
