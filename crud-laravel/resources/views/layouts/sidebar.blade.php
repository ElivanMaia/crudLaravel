<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJfJ6lqz5HTqFw5g77RE9aH8F4OglsSoSxsRtFf0a95e1GjfpZ2tPEHcmob7" crossorigin="anonymous">

    <style>
        .logo-img {
            width: 65px;
            height: auto;
        }
    </style>
</head>
<body>

        <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <div class="h-5 w-5">
                            <img src="assets/imgs/logoReal.png" alt="" class="img-fluid logo-img">
                        </div>
                        <span class="title">Barba & Navalha</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon> <!-- Ícone de Dashboard -->
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('usuarios.index') }}">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon> <!-- Ícone de Usuários -->
                        </span>
                        <span class="title">Clientes</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('agendamentos.index') }}">
                        <span class="icon">
                            <ion-icon name="calendar-outline"></ion-icon> <!-- Ícone de Agendamentos -->
                        </span>
                        <span class="title">Agendamentos</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('funcionarios.index') }}">
                        <span class="icon">
                            <ion-icon name="people-circle-outline"></ion-icon> <!-- Ícone de Funcionários -->
                        </span>
                        <span class="title">Funcionários</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('servicos.index') }}">
                        <span class="icon">
                            <ion-icon name="construct-outline"></ion-icon> <!-- Ícone de Serviços -->
                        </span>
                        <span class="title">Serviços</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('feedbacks.index') }}">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon> <!-- Ícone de Feedback -->
                        </span>
                        <span class="title">Feedbacks</span>
                    </a>
                </li>


            </ul>
        </div>
    
        <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0Hi60EuAT5viDO+Kd8zFDE6kWiwKrAtmO5NSKzqUjcJXsR27w" crossorigin="anonymous"></script>
</body>
</html>