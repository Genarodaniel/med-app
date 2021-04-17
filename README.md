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

## Rotas API
> **/api/getToken**</br>
> Tipo: **GET**</br>
> Parâmetros necessários:</br>
> **email,password**</br>
> Retorno:</br>
> **Token Bearer:** para requisições.</br>
> **Error:** parâmetro que define se houve algum erro na requisição</br>
> **Expire_at:** Tempo de validade do token gerado</br>

> **/api/getDoctor**</br>
> Tipo: **POST**</br>
> Parâmetros necessários:</br>
> Informar na Header o parâmetro **"Authorization"** contendo o token Bearer adquirido na rota **/api/getToken**</br>
> O retorno dos médicos é páginado a cada 30 resultados, para exibir as próximas páginas utilize o parâmetro: ?page=**n** onde **n** é o número da página. </br>
> Retorno: </br>
> **Objeto Doctor**</br>
> **doctor.id:** Id do médico</br>
> **doctor.name:** Nome do médico</br>
> **doctor.specialty:** Especialização</br>
> **doctor.crm:** CRM</br>
> **doctor.email:** E-mail</br>
> **doctor.phone_number:** Telefone</br>
> **doctor.gender:** Gênero (M = Masculino, F = Feminino) </br>
> **doctor.created_at:** Data de criação </br>
> **doctor.created_at:** Data de edição </br>

## Comandos sail
##### Documentação [Laravel sail](https://laravel.com/docs/8.x/sail "Heading link")

