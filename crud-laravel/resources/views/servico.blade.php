<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Serviços</title>
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
            --red: #e53e3e;
            --green: #48bb78;
            --yellow: #f1f32d;
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

        td a,
        td form button {
            display: inline-block;
            margin: 0;
            vertical-align: middle;
        }

        .btn-add,
        .btn-edit,
        .btn-delete {
            padding: 8px 16px;
            border-radius: 5px;
            border: none;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            text-decoration: none;
            display: inline-block;
            color: white;
        }

        .btn-add {
            background-color: var(--green);
            padding: 8px 16px;
            margin-left: 53px;
        }

        .btn-edit {
            background-color: var(--yellow);
            padding: 8px 16px;
        }

        .btn-delete {
            background-color: var(--red);
            padding: 9px 16px;

        }

        .btn-add:hover,
        .btn-edit:hover,
        .btn-delete:hover {
            transform: scale(1.05);
        }

        .btn-add:hover {
            background-color: var(--green);
        }

        .btn-edit:hover {
            background-color: var(--yellow);
        }

        .btn-delete:hover {
            background-color: var(--red);
        }

        .btn-add:active {
            background-color: #389860;
        }

        .btn-edit:active {
            background-color: #c6c80b;
        }

        .btn-delete:active {
            background-color: #9c2e1e;
        }


        .success-alert {
            background-color: #48bb78;
            color: white;
            padding: 16px;
            border-radius: 8px;
            margin-top: 10px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 16px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: opacity 0.3s ease-in-out;
            max-width: 900px;
            width: 100%;
            margin-left: auto;
            margin-right: auto;
        }

        .success-alert span {
            flex-grow: 1;
        }

        .close-btn {
            background: none;
            border: none;
            color: white;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
            padding: 0;
            margin-left: 10px;
            transition: color 0.3s ease;
        }

        .close-btn:hover {
            color: #f0f0f0;
        }

        .success-alert.hidden {
            opacity: 0;
            pointer-events: none;
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

            .table th,
            .table td {
                padding: 8px;
            }

            .no-agendamentos-message {
                font-size: 16px;
                max-width: 380px;
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
    margin-right: auto; margin-top: 20px">Lista de Serviços</h1>

                @if(session('success'))
                <div id="success-alert" class="success-alert">
                    <span>{{ session('success') }}</span>
                    <button onclick="document.getElementById('success-alert').style.display='none'" class="close-btn">&times;</button>
                </div>
                @endif

                <a href="{{ route('servicos.create') }}" class="btn-add mb-4 inline-block">
                    Adicionar Serviço
                </a>

                @if($servicos->isNotEmpty())
                <div class="custom-table" style="margin-bottom: 50px;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Imagem</th>
                                <th>Nome do Serviço</th>
                                <th>Preço</th>
                                <th>Descrição</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($servicos as $servico)
                            <tr>
                                <td>
                                    @if($servico->imagem)
                                    <img src="{{ Storage::url($servico->imagem) }}" alt="Imagem do serviço" class="img-fluid rounded" style="object-fit: cover; width: 64px; height: 64px;">
                                    @else
                                    <span class="text-gray-500">Sem imagem</span>
                                    @endif
                                </td>
                                <td>{{ $servico->nome_servico }}</td>
                                <td>R$ {{ number_format($servico->preco, 2, ',', '.') }}</td>
                                <td>{{ $servico->descricao }}</td>
                                <td>
                                    <a href="{{ route('servicos.edit', $servico->id) }}" class="btn-edit">Editar</a> |
                                    <form action="{{ route('servicos.destroy', $servico->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="no-agendamentos-message">Nenhum serviço cadastrado.</p>
                @endif
            </div>
        </div>
    </div>


    <script src="assets/js/main.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pzjw8f+ua7Kw1TIq0Hi60EuAT5viDO+Kd8zFDE6kWiwKrAtmO5NSKzqUjcJXsR27w" crossorigin="anonymous"></script>

    <script>
        function confirmDelete() {
            var result = confirm("Você tem certeza que deseja excluir este serviço?");
            if (result) {
                event.target.submit();
            }
            return false;
        }
    </script>

</body>

</html>