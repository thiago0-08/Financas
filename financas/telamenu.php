<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="graficos.css">
  <link rel="stylesheet" href="barralateral.css">
  <link rel="stylesheet" href="stylemenu.css">
  <link rel="stylesheet" href="formulario.css">
  <link rel="stylesheet" href="dashboard.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">NOME USUARIO </a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="login.php">Sair</a>
      </div>
    </div>
  </header>

  <div class="container-fluid" style="font-family: 'Montserrat', sans-serif">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3 text-center">
          <img src="https://cdn-icons-png.flaticon.com/512/3106/3106921.png" class="img-fluid rounded-circle" alt="">
          <ul class="nav flex-column mt-4">
            <li class="nav-item">
              <a class="nav-link" href="cartao2.html">
                <i class="bi bi-credit-card"></i>
                Cartão de Crédito
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="extrato.php">
                <i class="bi bi-file-earmark-text"></i>
                Extrato
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="bi bi-gear"></i>
                Opções
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="perfil.php">
                <i class="bi bi-person"></i>
                Perfil
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">
                <i class="bi bi-box-arrow-right"></i>
                Sair
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <!-- Cartão Cadastrado -->
        <div class="row mb-4">
          <div class="col">
            <div class="card mb-4 rounded-4 shadow-lg border-light">
              <div class="card-header bg-primary text-white py-3">
                <h4 class="my-0 fw-semibold">Cartão Cadastrado</h4>
              </div>
              <div class="card-body">
                <h5 style="color: #333">Número do Cartão: <h3><span id="exibNumeroCartao"></span></h3>
                </h5>

                <h5 style="color: #333">Nome do Titular: <span id="exibNomeTitular"></span></h5>
                <h5 style="color: #333">Data de Validade: <span id="exibDataValidade"></span></h5>
              </div>
            </div>
          </div>
        </div>

     <!-- Formulários -->
<div class="row row-cols-1 row-cols-md-2 mb-4">
    <div class="col">
        <div class="card mb-4 rounded-4 shadow-lg border-light">
            <div class="card-header bg-info text-white py-3">
                <h4 class="my-0 fw-semibold">Incluir Gasto</h4>
            </div>
            <div class="card-body">
                <form id="formulario" class="row g-3">
                    <div class="col-md-12">
                        <label for="alimentacao">Alimentação:</label>
                        <input type="number" class="form-control form-control-sm" id="alimentacao" name="alimentacao" min="0">
                    </div>
                    <div class="col-md-12">
                        <label for="transporte">Transporte:</label>
                        <input type="number" class="form-control form-control-sm" id="transporte" name="transporte" min="0">
                    </div>
                    <div class="col-md-12">
                        <label for="lazer">Lazer:</label>
                        <input type="number" class="form-control form-control-sm" id="lazer" name="lazer" min="0">
                    </div>
                    <div class="col-md-12">
                        <label for="outros">Outros:</label>
                        <input type="number" class="form-control form-control-sm" id="outros" name="outros" min="0">
                    </div>
                    <div class="col-md-12 d-flex justify-content-between mt-3">
                        <button type="button" onclick="atualizarGrafico1()" class="btn btn-primary">Atualizar Gráfico</button>
                        <button type="button" onclick="zerarGrafico()" class="btn btn-danger">Zerar Gráfico</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card mb-4 rounded-4 shadow-lg border-light">
            <div class="card-header bg-info text-white py-3">
                <h4 class="my-0 fw-semibold">Gasto no Mês</h4>
            </div>
            <div class="card-body">
                <form id="expenseForm" class="row g-3">
                    <div class="col-md-12">
                        <label for="salary">Salário:</label>
                        <input type="number" class="form-control form-control-sm" id="salary" name="salary" required>
                    </div>
                    <div class="col-md-12">
                        <label for="expenses">Despesas:</label>
                        <input type="number" class="form-control form-control-sm" id="expenses" name="expenses" required>
                    </div>
                    <div class="col-md-12 d-flex justify-content-between mt-3">
                        <button type="submit" class="btn btn-primary">Atualizar Gráfico</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


        <!-- Gráficos  -->
        <div class="row row-cols-1 row-cols-md-2 mb-4">
          <div class="col">
            <div class="card mb-4 rounded-4 shadow-lg border-light">
              <div class="card-header bg-success text-white py-3">
                <h4 class="my-0 fw-semibold">Total Gasto</h4>
              </div>
              <div class="card-body">
                <canvas id="grafico" width="400" height="350"></canvas>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card mb-4 rounded-4 shadow-lg border-light">
              <div class="card-header bg-success text-white py-3">
                <h4 class="my-0 fw-semibold">Gasto/Mês</h4>
              </div>
              <div class="card-body">
              <canvas id="expenseChart" width="400" height="200"></canvas>
              <div id="saldoMensagem" class="mt-3"></div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="assets_js/controle.js"></script>
<script src="graficodespesas.js"></script>



  <script>
    
    var dadosCartao = JSON.parse(sessionStorage.getItem('dadosCartao'));

  
    if (dadosCartao) {
      document.getElementById('exibNumeroCartao').innerText = dadosCartao.numeroCartao;
      document.getElementById('exibNomeTitular').innerText = dadosCartao.nome;
      document.getElementById('exibDataValidade').innerText = dadosCartao.dataValidade;
    } else {
      console.error('Dados do cartão não encontrados no sessionStorage');
    }
  </script>
</body>

</html>