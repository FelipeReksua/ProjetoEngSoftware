# Projeto Engenharia de Software PHP

Exemplo de projeto utilizando PHP.

Este exemplo é um aplicativo web que pode ser executado localmente assim como realizar o deploy em hosts de homologação/produção.
*   Para o guia completo deste projeto acesse o arquivo README.md do repositório do [Projeto](https://github.com/engenhariadesoftwareuepg/projetophp).
*   Este projeto utiliza o framework web [Laravel](https://laravel.com/)
*   Está configurado com o banco de dados relacional PostgresSQL, utilizado o [Eloquent ORM](https://laravel.com/docs/5.8/eloquent) incluído no Laravel para modelagem dos dados e mapeamento
*   Para a definição das views e templates é utilizado a engine [Blade](https://laravel.com/docs/5.8/blade)
*   Também está implmentado alguns testes de feature com o PHPUnit. [Testando no laravel](https://laravel.com/docs/5.8/testing)
  

  

## Arquitetura da aplicação

  

*   Esta aplicação utiliza uma arquitetura MVC (Model, View e Control)

*   O **Model** é responsável pela estrutura de dados da aplicação, e neste caso utiliza o Eloquent Model para modelagem dos dados. Os arquivos de Models fica no diretório `/app/`
*   O **Controller** é responsável pela regra de negócio, assim como instanciar os models e gerenciar os dados para renderizar as views. O controller fica no diretório `/app/Http/controllers/`
*   As **Views** tem a responsabilidade de renderizar e mostrar as informações oriundas do model e é controlada pelo controller. O diretório de localização das views é `/resources/views/`

*   Todas as rotas, ou seja as urls que serão utilizadas para acessar cada função no sistema são definidas no arquivo `/routes/web.php`
*   Os testes são executados todos arquivos que tem o sufixo Test.php que estão localizados nos diretórios `/Feature/` e `/Unit/`
  

## Banco de dados

  

É utilizado um banco de dados PostgreSQL. Você poderá utilizar para rodar localmente, uma instância do banco de dados também local Postgres ou qualquer outro banco relacional que o laravel tenha um driver compatível (configurar o driver no arquivo de configurações .env).

  

Para uma instância em rede, tem um Database as a Service (DBaaS) PostgreSQL gratuito no Heroku.

[Heroku postgres](https://devcenter.heroku.com/articles/heroku-postgresql)

  

As configurações do banco de dados devem ser criadas em um arquivo chamado `.env`. O projeto tem um exemplo das requeridas configurações

```sh

$ cp .env.example .env

```

Editar o arquivo `.env` com as suas configurações

  

## Executando Localmente

  

  

Deve ter instalado o [Composer](https://getcomposer.org/) e o [PHP >= 7.1.3](https://www.php.net/manual/en/install.php)

```sh
$ git clone https://github.com/engenhariadesoftwareuepg/projetophp.git
$ cd projetophp
$ composer install
$ cp .env.example .env
$ nano .env # ou outro editor para configurar as variáveis ambiente
$ php artisan serve
```
A aplicação deverá estar executando no endereço [localhost:8000](http://localhost:5000/).

## Deploying no Heroku (método 1)

Deve ter instalado o [Heroku CLI](https://cli.heroku.com/)

```
$ heroku create
$ git push heroku master
$ heroku open
```

### Documentação do Heroku

Para maiores informações segue os artigos da documentação sobre PHP no Heroku:

-  [Iniciando com PHP no Heroku](https://devcenter.heroku.com/articles/getting-started-with-php)

-  [Suporte Heroku PHP ](https://devcenter.heroku.com/articles/php-support)


-  [Deploy PHP](https://devcenter.heroku.com/articles/deploying-php)

 
  

  

## Realizando o deploy através do Travis-CI (método 2 - recomendado)

  

  

Este processo é configurado pelo arquivo chamado `.travis.yml`

  

- Fazer um fork deste repositório

  

- Utilizar a sua conta no Heroku

  

- Fazer o login [https://id.heroku.com/login](https://id.heroku.com/login)

  

- Criar um novo APP com o nome que desejar (o nome deve ser único no Heroku).

  

- Editar o arquivo `.travis.yml` e adicionar o nome que você escolheu para a sua app:

  

`app: \<nome da sua app\>`

  

- Acessar o seu App no heroku, e na aba "Settings" e em "Config vars" configurar todas as variáveis ambientes disponíveis no .env.example para o seu ambiente de produção (com exceção da PORT, pois o heroku já possui uma variável ambiente da porta onde o servidor será instanciado)

  

- Acessar o seu perfil e verificar a sua API KEY (ela será utilizada posteriormente no Travis-CI)
- Criar uma conta no [Travis-CI](https://travis-ci.org/). Utilizar a mesma conta do github "Sign in with GitHub"

- Buscar o repositório do seu projeto e habilitar a integração

- Clicar em "settings" do projeto e em "Environment Variables"
- Adicionar uma variável ambiente com o name: "HEROKU_API_KEY" (sem aspas)
- O value copiar do seu perfil no heroku.
- Editar o arquivo .env.travis com as configurações par ao Travis-CI executar os testes

Neste momento o Travis-CI já deverá estar monitorando a sua branch master.

Cada vez que um push é realizado será iniciado um processo no travis, onde instanciará um ambiente transitório (temporário) para instalar a aplicação, realizar os testes automatizados e se tudo estiver corretor, automaticamente realiza o deploy na plataforma do Heroku.