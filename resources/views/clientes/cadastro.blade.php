<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
                <h3>Cadastro Cliente</h3>
            </div>
        </header>
        <main>
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="alert alert-success" role="alert" id="alerta_sucesso"></div>
                    <div class="alert alert-danger" role="alert" id="alerta_danger"></div>

                </div>
            </div>
            <form id="clientes">
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
                            <input class="form-check-input sexo" type="radio" name="sexo" id="inlineRadio1" value="male">
                            <label class="form-check-label" for="inlineRadio1">Masculino</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input sexo" type="radio" name="sexo" id="inlineRadio2" value="female">
                            <label class="form-check-label" for="inlineRadio2">Feminino</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="endereco"/>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-12">
                    <label for="estado" class="form-label">Estado</label>
                    <select id="estado" class="form-control">

                    </select>
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
                    <button type="button" class="btn btn-success" id="salvar">Salvar</button>
                </div>
            </div>
            </form>
        </main>
        <footer>

        </footer>
    </body>

    <script>
        var url = "{{ env('APP_URL_USE') }}";

    </script>
    <script src="/js/clientes/ux/elementos.min.js"></script>
    <script src="/js/clientes/cadastro/cadastroAPi.min.js"></script>
</html>

