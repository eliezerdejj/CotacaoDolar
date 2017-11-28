<?php
    header("Content-Type: text/html; charset=ISO-8859-1",true);
    if(!$fp=fopen("https://www.infomoney.com.br/mercados/cambio" , "r" )) 
    {
        echo "Erro ao buscar dados" ;
        exit;
    }
    $conteudo = '';
    while(!feof($fp)) 
    { 
        $conteudo .= fgets($fp,1024);
    }
    fclose($fp);
    $valorCompraHTML = explode('class="numbers">', $conteudo); 
    $valorCompra = trim(strip_tags($valorCompraHTML[5]));
    $valorVendaHTML = explode('+', strip_tags($valorCompraHTML[6]));
    //Valores HTML para exibir no site.	
    $valorVendaHTML = explode('-', $valorVendaHTML[0]);
    $valorVenda  = trim($valorVendaHTML[0]) ;
    //Valores numéricos para cálculos.	  
    $valorCompraCalculavel = str_replace(',','.', $valorCompra);
    $valorVendaCalculavel  = str_replace(',','.', $valorVenda);
?> 

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Cotação Dólar</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!--
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="./css/signin.css" rel="stylesheet">
    -->

</head>

  <body>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    

      <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
      <a class="navbar-brand" href="#">Importações</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Dólar</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dados Estatísticos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Dólar</a>
            <a class="dropdown-item" href="#">Importações</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Estatísticas</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Informações</a>
        </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Pesquisa" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
        </form>
      </div>
      </nav>

      <br><br>

      <div class="jumbotron">
        <div class="container">
          <h1>Dados Sobre o Dolar</h1>
            <p>
                <strong>Compra:</strong>
                    R$ 
                    <?php echo $valorCompra ?> 
                    <br/>
                    <strong>Venda:</strong>
                    R$ 
                    <?php echo $valorVenda ?>  
                    </p>
                    
                    <button type="button" class="btn btn-primary">Compra: R$ <?php echo $valorCompra ?></button>
                    <button type="button" class="btn btn-dark">Venda: R$ <?php echo $valorVenda ?></button>

          <p>
          <a href="#" id="USD" title="CotaÃ§Ã£o do DÃ³lar Americano Hoje" name="mercado_cotacao">Dólar Hoje</a><script async src="https://mercadocotacao.com/money/mercadocotacao.js"></script>

          </p>
        </div>
      </div>

        <!--
          <div class="container">

              <form class="form-signin">
                <center><h2 class="form-signin-heading">Cadastrar</h2></center>
                <label for="inputEmail" class="sr-only">Digite seu E-mail</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="E-mail" required autofocus><br>
                <label for="inputPassword" class="sr-only">Sua Senha</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
                
                <button class="btn btn-lg btn-primary btn-block" type="submit">Cadastra-se</button>
              </form>
    </div>
    -->
    
</body>



</html>