<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuários</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEJfJ6lqz5HTqFw5g77RE9aH8F4OglsSoSxsRtFf0a95e1GjfpZ2tPEHcmob7" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        .logo-img {
            width: 65px;
            height: auto;
        }
        :root {
            --blue: #2a2185;
        }

        .custom-table {
            margin-top: 30px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-left: auto;
            margin-right: auto;
            width: 90%;
        }

        .table {
            margin-bottom: 0;
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            text-align: center;
        }

        thead {
            background-color: var(--blue);
            color: white;
        }

        tbody tr:nth-child(odd) {
            background-color: #f0f0f0;
        }

        tbody tr:nth-child(even) {
            background-color: #e1e1e1;
        }

        tbody tr:hover {
            background-color: #dcdcdc;
        }

        .table th,
        .table td {
            padding: 12px;
            vertical-align: middle;
            border: none;
        }

        .table-hover tbody tr:hover {
            background-color: #dcdcdc;
        }
        .no-agendamentos-message {
            font-size: 20px;
            font-weight: 600;
            color: #d1d5db;
            text-align: center;
            margin-top: 40px;
            margin-bottom: 20px;
            padding: 12px;
            background-color: var(--blue);
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        @media (max-width: 768px) {
            .table-responsive {
                overflow-x: auto;
            }

            .custom-table {
                width: 100%;
            }

            .table th, .table td {
                padding: 8px;
            }
        }
    </style>
</head>

<body class="bg-gray-900 text-white">
    <div class="container-fluid">
        <div class="navigation">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <ul class="navbar-nav">
                        <li>
                            <a href="#">
                                <div class="h-5 w-5">
                                    <img src="assets/imgs/logoReal.png" alt="" class="img-fluid logo-img">
                                </div>
                                <span class="title">Barba & Navalha</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin') }}">
                                <span class="icon">
                                    <ion-icon name="home-outline"></ion-icon>
                                </span>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('usuarios.index') }}">
                                <span class="icon">
                                    <ion-icon name="person-outline"></ion-icon>
                                </span>
                                <span class="title">Clientes</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('agendamentos.index') }}">
                                <span class="icon">
                                    <ion-icon name="calendar-outline"></ion-icon>
                                </span>
                                <span class="title">Agendamentos</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('funcionarios.index') }}">
                                <span class="icon">
                                    <ion-icon name="people-circle-outline"></ion-icon>
                                </span>
                                <span class="title">Funcionários</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('servicos.index') }}">
                                <span class="icon">
                                    <ion-icon name="construct-outline"></ion-icon>
                                </span>
                                <span class="title">Serviços</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('feedbacks.index') }}">
                                <span class="icon">
                                    <ion-icon name="chatbubble-outline"></ion-icon>
                                </span>
                                <span class="title">Feedbacks</span>
                            </a>
                        </li>
                        <hr>
                        <li class="logout">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <span class="icon">
                                        <ion-icon name="log-out-outline"></ion-icon>
                                    </span>
                                    <span class="title">Sair</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="user">
                    <div class="user-info">
                        <span class="username">{{ Auth::user()->name }}</span>
                        <i class="fas fa-user-circle user-icon"></i>
                    </div>
                </div>
            </div>

            <div class="container mx-auto p-6">
            <h1 class="text-center text-3xl font-bold mb-6" style="text-align: center; margin-left: auto; 
    margin-right: auto; margin-top: 20px">Lista de Usuários</h1>

                @if(session('success'))
                <div id="success-alert" class="bg-success text-white p-4 rounded mb-4 d-flex justify-content-between align-items-center">
                    <span>{{ session('success') }}</span>
                    <button onclick="document.getElementById('success-alert').style.display='none'" class="btn-close"></button>
                </div>
                @endif

                @if($usuarios->isEmpty())
                    <div class="no-records-message">
                        Nenhum cliente cadastrado.
                    </div>
                @else
                    <div class="custom-table" style="margin-bottom: 50px;">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>Senha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario->name }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>{{ $usuario->password }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="assets/js/main.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pzjw8f+ua7Kw1TIq0Hi60EuAT5viDO+Kd8zFDE6kWiwKrAtmO5NSKzqUjcJXsR27w" crossorigin="anonymous"></script>
</body>

</html>
