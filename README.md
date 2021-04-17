# Passos para executar aplicação

----------

## .ENV
Renomeie o .env.example para .env


## Caso seja a primeira vez que vai rodar a aplicação
Execute:
>  **composer update**

## Caso ja tenha rodado a aplicação e possua a pasta vendor
#### Execute

>  **alias sail='bash vendor/bin/sail'**
>  **sail up -d'**
>  **sail artisan key:generate**
>  **sail artisan migrate**
>  **yarn install**
>  **yarn run dev**


## Comandos sail
##### Documentação [Laravel sail](https://laravel.com/docs/8.x/sail "Heading link")

