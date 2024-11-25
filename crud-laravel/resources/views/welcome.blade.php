<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-Vindo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    </style>
</head>

<body>

    @section('content')
    @include('layouts.navigation')

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



    <section id="agendamentos" class="vh-100 d-flex justify-content-center align-items-center bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h2 class="text-center text-white">Agendar Corte</h2>

                    @auth
                    <form action="{{ route('agendamentos.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="telefone_cliente" class="block text-lg text-white">Telefone</label>
                            <input type="text" name="telefone_cliente" value="{{ old('telefone_cliente') }}" class="w-full p-3 rounded bg-gray-800 border border-gray-700 text-white" required>
                        </div>

                        <div class="mb-4">
                            <label for="id_servico" class="block text-lg text-white">Serviço</label>
                            <select name="id_servico" class="w-full p-3 rounded bg-gray-800 border border-gray-700 text-white" required>
                                @foreach ($servicos as $servico)
                                <option value="{{ $servico->id }}" {{ old('id_servico') == $servico->id ? 'selected' : '' }}>
                                    {{ $servico->nome_servico }} - R$ {{ number_format($servico->preco, 2, ',', '.') }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="horario_agendamento" class="block text-lg text-white">Data e Hora</label>
                            <input type="datetime-local" name="horario_agendamento" value="{{ old('horario_agendamento') }}" class="w-full p-3 rounded bg-gray-800 border border-gray-700 text-white" required>
                        </div>

                        <div class="mb-4">
                            <label for="observacoes" class="block text-lg text-white">Observações</label>
                            <textarea name="observacoes" class="w-full p-3 rounded bg-gray-800 border border-gray-700 text-white" rows="4">{{ old('observacoes') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="referencias" class="block text-lg text-white">Referências</label>
                            <textarea name="referencias" class="w-full p-3 rounded bg-gray-800 border border-gray-700 text-white" rows="4">{{ old('referencias') }}</textarea>
                        </div>

                        <button type="submit" class="bg-blue-600 px-6 py-2 rounded text-white">Criar Agendamento</button>
                    </form>
                    @else
                    <p class="text-white">Você precisa estar logado para agendar um serviço. <a href="{{ route('login') }}" class="text-blue-500">Clique aqui para fazer login</a></p>
                    @endauth

                </div>
            </div>
        </div>
    </section>




    @include('layouts.footer')


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#telefone').mask('(00) 0000-0000');
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>