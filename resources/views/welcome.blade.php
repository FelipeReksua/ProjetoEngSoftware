<!DOCTYPE html>
<html>

<head>
<title>Projeto de Engenharia de Software - Exemplo</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
<!--<link rel="stylesheet" type="text/css" href="/stylesheets/main.css" />-->
<link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-co ntrols="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Inicio<span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://devcenter.heroku.com/articles/how-heroku-works">Heroku</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://devcenter.heroku.com/articles/getting-started-with-php">Tutorial Heroku PHP</a>
        
      </li>
      
    </ul>
  </div>
</nav>



  <div class="jumbotron text-center">
    <div class="container">
      <a href="/" class="lang-logo">
        <img src="{{ asset('images/lang-logo.png') }}">
      </a>
      <h1>Projeto de Engenharia de software</h1>
      <p>Este é um pequeno exemplo de um CRUD simples em node de uma lista de contatos</p>
      <a type="button" class="btn btn-lg btn-default" href="/contatos"><span class="glyphicon glyphicon-flash"></span>
        Contatos (exemplo)</a>
      <a type="button" class="btn btn-lg btn-primary"
        href="https://github.com/engenhariadesoftwareuepg/projetophp"><span
          class="glyphicon glyphicon-download"></span> Código fonte no GitHub</a>
    </div>
  </div>
  <div class="container">
    <div class="alert alert-info text-center" role="alert">
      Para utilizar este exemplo acesse o repositório do código <a
        href="https://github.com/engenhariadesoftwareuepg/projetophp" class="alert-link">Projeto com PHP</a>.
    </div>
    <hr>
    <div class="row">
      <div class="col-md-6">
        <h3><span class="glyphicon glyphicon-info-sign"></span> Como este exemplo foi construido</h3>
        <ul>
          <li>Para o guia completo deste projeto acesse o arquivo README.md do repositório do <a
              href="https://github.com/engenhariadesoftwareuepg/projetophp">Projeto</a>.</li>

          <li>Este projeto utiliza o framework web <a href="https://laravel.com/" target="_blank">Laravel</a></li>
          <li>Está configurado com o banco de dados relacional PostgresSQL, utilizado o  <a href="https://laravel.com/docs/5.8/eloquent"
              target="_blank">Eloquent ORM</a> incluído no Laravel para modelagem dos dados e mapeamento</li>
          <li>Para a definição das views e templates é utilizado a engine <a href="https://laravel.com/docs/5.8/blade"
              target="_blank">Blade</a></li>
          <li>Também está implmentado alguns testes de feature com o PHPUnit. <a href="https://laravel.com/docs/5.8/testing" target="_blank">Testando no laravel</a></li>

        </ul>
      </div>
      <div class="col-md-6">
        <h3><span class="glyphicon glyphicon-link"></span> Arquitetura da aplicação</h3>
        <ul>
          <li>Esta aplicação utiliza uma arquitetura MVC (Model, View e Control)</li>
          <ul>
            <li>
              O <b>Model</b> é responsável pela estrutura de dados da aplicação, e neste caso utiliza o Eloquent Model para modelagem dos dados.
              Os arquivos de Models fica no diretório <code>/app/</code></li>
            <li>O <b>Controller</b> é responsável pela regra de negócio, assim como instanciar os models e gerenciar os
              dados para renderizar as views.
              O controller fica no diretório <code>/app/Http/controllers/</code></li>
            <li>As <b>Views</b> tem a responsabilidade de renderizar e mostrar as informações oriundas do model e é
              controlada pelo controller.
              O diretório de localização das views é <code>/resources/views/</code>
            </li>
          </ul>
          <li>
            Todas as rotas, ou seja as urls que serão utilizadas para acessar cada função no sistema são definidas no
            arquivo <code>/routes/web.php</code>
          </li>
          <li>
            Os testes são executados todos arquivos que tem o sufixo Test.php que estão localizados nos diretórios  <code>/Feature/</code> e <code>/Unit/</code>
          </li>
        </ul>

      </div>
      <div class="col-md-6">
        <h3><span class="glyphicon glyphicon-link"></span> Dicas para deploy</h3>
        <ul>
          <li>Utilizar o GitHub para estudantes, no qual você pode obter diversos benefícios de softwares, ferramentas e
            plataformas com versões gratuitas, bonus, descontos, etc. Além de permitir utilizar repositórios privados
            gratuitos. Mais informações <a href="https://education.github.com/students" target="_blank">GitHub
              Education</a></li>
          <li>Para automatização dos testes e integração contínua utilizar a plataforma <a href="https://travis-ci.org/"
              target="_blank">Travis CI</a>. Para criar uma conta no serviço da plataforma deve ser utilizado a mesma
            conta do GitHub (o travis-ci e o github são integrados entre si)</li>
          <li>Para realizar o deploy da aplicação poderá utilizar a plataforma <a
              href="https://www.heroku.com/home">Heroku</a>. Possui um plano básico gratuito (observar as limitações do
            plano gratuito) que atende o desenvolvimento de projetos básicos (como é o caso da disciplina).
            Além de também possuir um plano de estudante <a href="https://www.heroku.com/github-students" target="_blank">Heroku for GitHub Students</a>, onde a sua conta de estudante é validade pela conta do github também de estudante. Documentação, tutoriais da plataforma Heroku:
          </li>
          <ul>
              <li><a href="https://devcenter.heroku.com/">Heroku Dev Center</a></li>
              <li><a href="https://devcenter.heroku.com/articles/getting-started-with-nodejs">Iniciando com Node no
                  Heroku</a></li>
              <li><a href="https://devcenter.heroku.com/articles/deploying-nodejs">Fazendo deploy de aplicações node no Heroku</a></li>
          </ul>
          <li>
            Para banco de dados, a mesma plataforma Heroku possui um SaaS do SGBD Postgres <a href="https://devcenter.heroku.com/articles/heroku-postgresql" target="_blank">Heroku Postgres
            </a>
          </li>
          <li>
            Para banco de dados NoSQL, um SaaS também com um plano básico gratuito (ver limitações do plano) é o <a href="https://mlab.com/" target="_blank">mLab</a> com banco de dados MongoDB
          </li>
          
        </ul>
      </div>
    </div> <!-- row -->
    <div class="alert alert-info text-center" role="alert">
      Este é apenas um exemplo simples de estrutura de um projeto para a disciplina de Engenharia de software. Contém os
      processos básicos para a criação de um CRUD (Create, Replace, Update and Delete) de registro de itens.
      Também possui passos básicos de banco de dados, validação de entrada de dados, e testes. Seu uso não é
      obrigatório, ficando os alunos livres para utilizarem as suas estruturas, bem como linguagem (claro atendendo as
      necessidades do projeto e disciplina)
    </div>
  </div>


</body>

</html>