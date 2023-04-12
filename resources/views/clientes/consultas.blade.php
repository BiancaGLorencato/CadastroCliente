<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <style>
        .row{
            padding: 10px;
        }
        .botoes{
            text-align: right;
        }

        a{
            text-decoration: none;
        }

        .title{
            margin-top: 20px;
        }
        .consulta{
            margin-top: 15px;
            padding: 15px;
            border-radius: 15px;
        }
    </style>



</head>
    <body class="container">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="/"> <img src="/imgs/logo.png" width="150px"></a>
                <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/cadastroCliente">Cadastro Cliente</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/consultaClientes">Consulta Cliente</a>
                        </li>
 
                    </ul>
                </div>
            </nav>
           
            <div class="title">
                <h3>Consulta Cliente</h3>
            </div>
        </header>
        <main>
            <div class="border border-primary consulta">
                <form id="consulta">
                    <div class="row">
                        <div class="col-md-4 col-lg-3 col-sm-12">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" class="form-control" id="cpf" placeholder="Digite o CPF"/>
                        </div>
                        <div class="col-md-4 col-lg-3 col-sm-12">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="name" placeholder="Digite o Nome"/>
                        </div>
                        <div class="col-md-4 col-lg-3 col-sm-12">
                            <label for="dataNascimento" class="form-label">Data de Nascimento</label>
                            <input type="date" class="form-control" id="dataNascimento"/>
                        </div>
                        <div class="col-md-4 col-lg-3 col-sm-12">
                            <label for="genero" class="form-label">Gênero</label>
                            <div id="genero">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input sexo" type="radio" name="sexo" id="sexo1" value="male">
                                    <label class="form-check-label" for="sexo1">Masculino</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input sexo" type="radio" name="sexo" id="sexo2" value="female">
                                    <label class="form-check-label" for="sexo2">Feminino</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-sm-12">
                            <label for="estado" class="form-label">Estado</label>
                            <select id="estado" class="form-control"></select>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-12">
                            <label for="cidade" class="form-label">Cidade</label>
                            <select id="cidade" class="form-control">
                                <option value="">Escolha um estado</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="botoes">
                            <button type="button" class="btn btn-light" id="limpar">Limpar</button>
                            <button type="button" class="btn btn-success" id="pesquisar">Pesquisar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="border border-primary consulta">
                <table class="table" id="clientesTable">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col">CPF</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Data Nasc.</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Cidade</th>                            
                            <th scope="col">Sexo</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyCliente"></tbody>
                </table>
                <nav class="paginacao">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#A" tabindex="-1">Anterior</a></li>
                        <li class="page-item active"><a class="page-link" href="#1">1</a></li>
                        <li class="page-item"><a class="page-link"  href="#2">2</a></li>
                        <li class="page-item"><a class="page-link"  href="#3">3</a></li>
                        <li class="page-item"><a class="page-link" href="#4">4</a></li>
                        <li class="page-item"><a class="page-link" href="#5">5</a></li>
                    </ul>
                </nav>
            </div>
        </main>
        <footer>

        </footer>
    </body>

    <script>
        var url = "{{ env('APP_URL_USE') }}";

    </script>
    <script src="/js/clientes/pesquisa/pesquisarAPI.min.js"></script>
    <script src="/js/clientes/ux/elementosPesquisar.min.js"></script>
</html>

