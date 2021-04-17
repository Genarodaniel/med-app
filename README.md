# Passos para executar aplicação

----------

## .ENV
Renomeie o .env.example para .env


## Caso seja a primeira vez que vai rodar a aplicação
Execute:
>  **composer update**

## Caso ja tenha rodado a aplicação e possua a pasta vendor
#### Execute

>  **alias sail='bash vendor/bin/sail'**</br>
>  **sail up -d**</br>
>  **sail artisan key:generate**</br>
>  **sail artisan migrate**</br>
>  **yarn install**</br>
>  **yarn run dev**


## Comandos sail
##### Documentação [Laravel sail](https://laravel.com/docs/8.x/sail "Heading link")

