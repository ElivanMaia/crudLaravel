<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Serviço</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEJfJ6lqz5HTqFw5g77RE9aH8F4OglsSoSxsRtFf0a95e1GjfpZ2tPEHcmob7" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .logo-img {
            width: 65px;
            height: auto;
        }

        .form-container {
            background-color: var(--blue);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            color: white;
            max-width: 500px;
            width: 100%;
        }

        .form-container h1 {
            margin-bottom: 30px;
        }

        .form-container .form-label {
            font-weight: bold;
            font-size: 1.2rem;
        }

        .form-container .form-control {
            border-radius: 5px;
            padding: 0.75rem;
            font-size: 1rem;
            margin-top: 0;
            width: 100%;
        }

        .form-container .mb-3 {
            margin-bottom: 20px;
        }

        .form-container .btn-warning {
            background-color: white;
            color: var(--blue);
            border: none;
            font-size: 1rem;
            padding: 0.75rem;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
            margin-top: 20px;
        }

        .form-container .btn-warning:hover {
            background-color: #0062cc;
            color: white;
        }

        @media (max-width: 768px) {
            .form-container {
                margin: 15px;
                padding: 15px;
            }

            .form-container .form-label {
                font-size: 1rem;
            }

            .form-container .form-control {
                font-size: 0.9rem;
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
                                    <img src="{{ asset('assets/imgs/logoReal.png') }}" alt="Logo" class="img-fluid logo-img">
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

            <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh; margin-left: 300px; margin-right: auto; margin-top: 30px; margin-bottom: 50px;">
                <div class="form-container">
                    <h1 class="text-center">Editar Serviço</h1>

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('servicos.update', $servico->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nome_servico" class="form-label">Nome do Serviço</label>
                            <input type="text" name="nome_servico" id="nome_servico" value="{{ $servico->nome_servico }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="preco" class="form-label">Preço</label>
                            <input type="number" name="preco" id="preco" value="{{ $servico->preco }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição</label>
                            <textarea name="descricao" id="descricao" rows="4" class="form-control" required>{{ $servico->descricao }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="imagem" class="form-label">Imagem</label>
                            <input type="file" name="imagem" id="imagem" class="form-control" accept="image/*">

                            @if($servico->imagem)
                            <div class="mt-3">
                                <img src="{{ Storage::url($servico->imagem) }}" alt="Imagem do Serviço" class="img-fluid rounded-lg" style="max-width: 150px; max-height: 150px; object-fit: cover;">
                            </div>
                            @endif
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-warning w-100">Atualizar Serviço</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pzjw8f+ua7Kw1TIq0Hi60EuAT5viDO+Kd8zFDE6kWiwKrAtmO5NSKzqUjcJXsR27w" crossorigin="anonymous"></script>
        <script>
            function confirmUpdate() {
                return confirm("Você tem certeza que deseja atualizar este serviço?");
            }
        </script>
        <script>
        Inputmask({
            alias: 'numeric',
            groupSeparator: '.',
            radixPoint: ',',
            digits: 2,
            autoGroup: true,
            allowMinus: false,
            placeholder: '00,00',
        }).mask('#preco');
    </script>
</body>

</html>
