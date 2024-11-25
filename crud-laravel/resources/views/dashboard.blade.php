<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-Vindo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #inicio {
            position: relative;
            min-height: 100vh;
            background-image: url("{{ asset('images/inicio.png') }}");
            background-size: cover;
            background-repeat: no-repeat;
            margin-top: 50px;
        }

        @media (max-width: 915px) {
            #inicio {
                background-image: url("{{ asset('images/bannerResp.png') }}");
                background-size: cover;
                background-repeat: no-repeat;
                margin-top: 50px;
                background-position: center;
            }
        }

        #servicos {
            min-height: 100vh;
            background-image: url("{{ asset('images/imagemInicial1.jpg') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        #horarios {
            min-height: 100vh;
            background-image: url("{{ asset('images/imagemInicial1.jpg') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.6) !important;
            border: none;
        }

        .card-body {
            min-height: 200px;
        }


        .fa-star {
            font-size: 1.5em;
            color: #d3d3d3;
            cursor: pointer;
        }

        .fa-star.checked {
            color: #ffbc00;
        }

        .bg-dark {
            background-color: #f8f9fa !important;
        }

        .section-title {
            font-size: 32px;
            color: #333;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .card {
            border: 1px solid #ddd;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 24px;
            font-weight: 600;
            color: #333;
        }

        .bi {
            color: #0069d9;
        }

        .list-unstyled li {
            font-size: 18px;
            color: #555;
            padding: 5px 0;
            transition: color 0.3s ease;
        }

        .list-unstyled li:hover {
            color: #0069d9;
            cursor: pointer;
        }

        .card-body {
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 300px;
        }
    </style>
</head>

<body>

    @section('content')
    @include('layouts.navigation')

    @if(session('success'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    @endif






    <section id="inicio"></section>


    <section id="equipe" class="pt-4 pb-5 bg-dark">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <h2 class="section-title text-white">Nossa Equipe de Funcionários</h2>
                    <p class="pb-4 text-white" style="font-size: 18px;">Conheça os nossos talentosos funcionários que fazem a diferença no nosso atendimento.</p>
                </div>
            </div>
            <div class="row">
                @foreach ($funcionarios as $funcionario)
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <div class="p-4 text-center">
                            @if($funcionario->foto)
                            <img src="{{ Storage::url($funcionario->foto) }}" alt="Foto do funcionário" class="card-img-top w-full h-48 object-cover rounded mb-3">
                            @else
                            <img src="https://via.placeholder.com/600x400?text=Foto+Indisponível" class="card-img-top w-full h-48 object-cover rounded mb-3" alt="Foto Indisponível">
                            @endif
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title" style="font-size: 20px;">{{ $funcionario->nome }}</h5>
                            <p class="card-text" style="font-size: 18px;">{{ $funcionario->frase_pessoal ?? 'Sem frase pessoal' }}</p>
                            <p class="text-muted" style="font-size: 16px;">{{ $funcionario->caminho_barbearia }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    <section id="servicos" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-white text-center mb-5">Nossos Serviços</h2>
            <div class="row">
                @foreach ($servicos as $servico)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-light rounded-lg">
                        <div class="p-4 text-center">
                            @if($servico->imagem)
                            <img src="{{ Storage::url($servico->imagem) }}" alt="Imagem do serviço" class="w-full h-48 object-cover rounded mb-3">
                            @else
                            <img src="https://via.placeholder.com/600x400?text=Imagem+Indisponível" class="w-full h-48 object-cover rounded mb-3" alt="Imagem Indisponível">
                            @endif
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title font-weight-bold">{{ $servico->nome_servico }}</h5>
                            <p class="card-text">{{ $servico->descricao }}</p>
                            <p class="price h4 text-primary">R$ {{ number_format($servico->preco, 2, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>




    <section id="horarios" class="py-5 bg-dark">
        <div class="container pt-5">
            <h2 class="section-title text-center mb-5 text-white" style="font-size: 32px; font-weight: bold;">Datas e Horários de Agendamento</h2>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card h-100 border-light rounded-lg">
                        <div class="card-body d-flex flex-column justify-content-center" style="height: 300px; text-align: center;">
                            <h4 class="card-title text-dark mb-4" style="font-size: 24px; font-weight: 600;">
                                <i class="bi bi-calendar-day" style="font-size: 28px; color: #0069d9;"></i> Dias de Agendamento
                            </h4>
                            <ul class="list-unstyled" style="font-size: 18px; color: #555;">
                                <li>Segunda-feira</li>
                                <li>Terça-feira</li>
                                <li>Quarta-feira</li>
                                <li>Quinta-feira</li>
                                <li>Sexta-feira</li>
                                <li>Sábado</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card h-100 border-light rounded-lg">
                        <div class="card-body d-flex flex-column justify-content-center" style="height: 300px; text-align: center;">
                            <h4 class="card-title text-dark mb-4" style="font-size: 24px; font-weight: 600;">
                                <i class="bi bi-clock" style="font-size: 28px; color: #0069d9;"></i> Horários de Agendamento
                            </h4>
                            <div class="row justify-content-center">
                                <div class="col-md-5">
                                    <ul class="list-unstyled" style="font-size: 18px; color: #555;">
                                        <li>08:00</li>
                                        <li>09:30</li>
                                        <li>11:00</li>
                                        <li>13:00</li>
                                    </ul>
                                </div>
                                <div class="col-md-5">
                                    <ul class="list-unstyled" style="font-size: 18px; color: #555;">
                                        <li>14:30</li>
                                        <li>16:00</li>
                                        <li>17:30</li>
                                        <li>19:00</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section id="agendamentos" class="d-flex justify-content-center align-items-center bg-dark" style="min-height: 100vh; position: relative;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h2 class="text-center text-white">Agendar Corte</h2>

                    @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('agendamentos.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="telefone_cliente" class="text-white">Telefone<span style="color: red">*</span></label>
                            <input type="tel" name="telefone_cliente" value="{{ old('telefone_cliente') }}"
                                class="form-control w-full p-2 rounded bg-white border border-gray-700 text-dark"
                                onkeypress="$(this).mask('(00) 0000-0000')" placeholder="(00) 0000-0000" required>
                        </div>

                        <div class="mb-6">
                            <label for="data_agendamento" class="text-white">Escolha a Data do Agendamento<span style="color: red">*</span></label>
                            <input type="text" id="data_agendamento" name="data_agendamento"
                                class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Selecione a data" required>
                        </div>

                        <div class="mb-6">
                            <label for="horario_agendamento" class="text-white">Escolha a Hora do Agendamento<span style="color: red">*</span></label>
                            <div id="horarios_disponiveis" class="grid grid-cols-4 gap-4">
                            </div>
                            <input type="hidden" id="horario_agendamento" name="horario_agendamento">
                        </div>

                        <div class="form-group mb-3">
                            <label for="id_servico" class="text-white">Serviço<span style="color: red">*</span></label>
                            <select name="id_servico" class="form-control w-full p-2 rounded bg-white border border-gray-700 text-dark" required>
                                <option value="" disabled selected hidden>Selecione o serviço desejado</option>
                                @foreach ($servicos as $servico)
                                <option value="{{ $servico->id }}" {{ old('id_servico')==$servico->id ? 'selected' : '' }}>
                                    {{ $servico->nome_servico }} - R$ {{ number_format($servico->preco, 2, ',', '.') }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="id_funcionario" class="text-white">Escolha o Funcionário<span style="color: red">*</span></label>
                            <select name="id_funcionario" class="form-control w-full p-2 rounded bg-white border border-gray-700 text-dark" required>
                                <option value="" disabled selected hidden>Selecione o Funcionário</option>
                                @foreach ($funcionarios as $funcionario)
                                <option value="{{ $funcionario->id }}" {{ old('id_funcionario')==$funcionario->id ? 'selected' : '' }}>
                                    {{ $funcionario->nome }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="observacoes" class="text-white">Especificações</label>
                            <textarea name="observacoes" class="form-control w-full p-2 rounded bg-white border border-gray-700 text-dark"
                                rows="3" placeholder="Digite suas observações aqui">{{ old('observacoes') }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="referencias" class="text-white">Como ficou sabendo da barbearia?</label>
                            <input type="text" name="referencias" value="{{ old('referencias') }}"
                                class="form-control w-full p-2 rounded bg-white border border-gray-700 text-dark"
                                placeholder="Digite sua resposta aqui">
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary w-48 p-2 rounded bg-blue-600 text-white">Agendar</button>
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#agendamentoModal">
                                Ver Agendamentos
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <div class="modal fade" id="agendamentoModal" tabindex="-1" aria-labelledby="agendamentoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agendamentoModalLabel">Meus Agendamentos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if($agendamentos->isNotEmpty())
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Hora</th>
                                <th>Serviço</th>
                                <th>Funcionário</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agendamentos as $agendamento)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($agendamento->data_agendamento)->format('d/m/Y') }}</td>
                                <td>{{ $agendamento->formatted_horario_agendamento }}</td>
                                <td>{{ $agendamento->servico->nome_servico ?? 'N/A' }}</td>
                                <td>{{ $agendamento->funcionario->nome ?? 'N/A' }}</td>
                                <td>
                                    <div class="d-flex justify-content-start">
                                        <a href="{{ route('agendamentos.edit', $agendamento->id) }}" class="btn btn-warning btn-sm me-2">
                                            Editar
                                        </a>

                                        <form action="{{ route('agendamentos.destroy', $agendamento->id) }}" method="POST" onsubmit="return confirm('Você tem certeza que deseja excluir este agendamento?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white p-1 rounded">
                                                Excluir
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p class="text-center">Você não tem agendamentos.</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>



    <section id="feedbacks" class="py-5 bg-dark">
        <div class="container">
            <h2 class="section-title text-center mb-5 text-white">Deixe seu Feedback</h2>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="{{ route('feedbacks.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="avaliacao" class="text-white">Avaliação <span class="text-red-500">*</span></label>
                            <div class="stars">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="fa fa-star" data-index="{{ $i }}"></span>
                                    @endfor
                            </div>
                            <input type="hidden" name="avaliacao" id="avaliacao" value="0" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="mensagem" class="text-white">Mensagem <span class="text-red-500">*</span></label>
                            <textarea name="mensagem" class="form-control w-full p-2 rounded bg-white border border-gray-700 text-dark" rows="5" placeholder="Deixe sua mensagem" required></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="sugestoes" class="text-white">Sugestões</label>
                            <textarea name="sugestoes" class="form-control w-full p-2 rounded bg-white border border-gray-700 text-dark" rows="3" placeholder="Deixe suas sugestões"></textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary w-48 p-2 rounded bg-blue-600 text-white">Enviar Feedback</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>





    @include('layouts.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/pt.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#telefone').mask('(00) 0000-0000');
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#data_agendamento", {
                minDate: "today",
                disable: [
                    function(date) {
                        return (date.getDay() === 0);
                    }
                ],
                locale: 'pt',
                dateFormat: "Y-m-d",
                altInput: true,
                altFormat: "d/m/Y",
                placeholder: "Selecione uma data",
                onChange: function(selectedDates, dateStr, instance) {
                    carregarHorarios();
                }
            });
        });

        const horariosFuncionamento = {
            "segunda": ["08:00", "09:30", "11:00", "13:00", "14:30", "16:00", "17:30", "19:00"],
            "terca": ["08:00", "09:30", "11:00", "13:00", "14:30", "16:00", "17:30", "19:00"],
            "quarta": ["08:00", "09:30", "11:00", "13:00", "14:30", "16:00", "17:30", "19:00"],
            "quinta": ["08:00", "09:30", "11:00", "13:00", "14:30", "16:00", "17:30", "19:00"],
            "sexta": ["08:00", "09:30", "11:00", "13:00", "14:30"],
            "sabado": [],
            "domingo": ["08:00", "09:30", "11:00", "13:00", "14:30", "16:00", "17:30", "19:00"],
        };

        function carregarHorarios() {
            const dataSelecionada = document.getElementById("data_agendamento").value;
            const horariosDiv = document.getElementById("horarios_disponiveis");
            const horarioSelecionadoInput = document.getElementById("horario_agendamento");

            horariosDiv.innerHTML = '';

            if (dataSelecionada) {
                console.log("Data selecionada: " + dataSelecionada);

                const diaSemana = new Date(dataSelecionada).getDay();
                console.log("Dia da semana (0=Domingo, 1=Segunda, ...): " + diaSemana);

                const diasDaSemana = ["domingo", "segunda", "terca", "quarta", "quinta", "sexta", "sabado"];
                const diaDaSemanaSelecionado = diasDaSemana[diaSemana];
                console.log("Dia da semana selecionado: " + diaDaSemanaSelecionado);

                const horarios = horariosFuncionamento[diaDaSemanaSelecionado];
                console.log("Horários disponíveis para o dia " + diaDaSemanaSelecionado + ": ", horarios);

                if (horarios && horarios.length > 0) {
                    horarios.forEach(hora => {
                        const button = document.createElement("button");
                        button.type = "button";
                        button.className = "hora-btn bg-gradient-to-r from-blue-500 to-blue-700 text-white py-3 px-6 rounded-full shadow-lg transform transition duration-300 ease-in-out hover:scale-105 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-blue-300";
                        button.innerText = hora;

                        horariosDiv.appendChild(button);

                        button.addEventListener("click", function() {
                            horarioSelecionadoInput.value = hora;
                            console.log('Horário selecionado:', hora);

                            document.querySelectorAll(".hora-btn").forEach(btn => {
                                btn.classList.remove("bg-blue-600", "border-4", "border-blue-800", "shadow-2xl");
                                btn.classList.add("bg-gradient-to-r", "from-blue-500", "to-blue-700");
                            });
                            button.classList.add("bg-blue-600", "border-4", "border-blue-800", "shadow-2xl");
                        });
                    });
                }
            } else {
                console.log("Nenhuma data foi selecionada.");
            }
        }

        document.getElementById("data_agendamento").addEventListener("change", carregarHorarios);
    </script>


    <script>
        const stars = document.querySelectorAll('.fa-star');
        const ratingInput = document.getElementById('avaliacao');

        stars.forEach(star => {
            star.addEventListener('mouseover', function() {
                const index = parseInt(star.getAttribute('data-index'));
                highlightStars(index);
            });

            star.addEventListener('mouseout', function() {
                const currentRating = parseInt(ratingInput.value);
                highlightStars(currentRating);
            });

            star.addEventListener('click', function() {
                const index = parseInt(star.getAttribute('data-index'));
                ratingInput.value = index;
                highlightStars(index);
            });
        });

        function highlightStars(rating) {
            stars.forEach((star, index) => {
                if (index < rating) {
                    star.classList.add('checked');
                } else {
                    star.classList.remove('checked');
                }
            });
        }
    </script>


</body>

</html>