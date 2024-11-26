<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Agendamento</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.7/dist/inputmask.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
</head>

<body class="bg-gray-900 text-white">
@section('content')
@include('layouts.navigation')

    <div class="container mx-auto p-6 max-w-2xl">
        <h1 class="text-center text-3xl font-bold mb-6">Editar Agendamento</h1>

        @if($errors->any())
        <div id="error-alert" class="bg-red-500 text-white p-4 rounded mb-4 flex justify-between items-start">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button onclick="document.getElementById('error-alert').style.display='none'" class="text-white text-2xl font-bold ml-4 px-2 py-1 rounded">
                &times;
            </button>
        </div>
        @endif

        <form action="{{ route('agendamentos.update', $agendamento->id) }}" method="POST" id="edit-form" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="data_agendamento" class="text-sm font-semibold text-gray-200">Escolha a Data do Agendamento<span style="color: red">*</span></label>
                <input type="text" id="data_agendamento" name="data_agendamento"
                    class="w-full bg-gray-800 text-white border border-gray-700 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Selecione a data"
                    value="{{ old('data_agendamento', \Carbon\Carbon::parse($agendamento->data_agendamento)->format('d/m/Y')) }}" required>
            </div>

            <div class="mb-6">
                <label for="horario_agendamento" class="text-sm font-semibold text-gray-200">Escolha a Hora do Agendamento<span style="color: red">*</span></label>
                <div id="horarios_disponiveis" class="grid grid-cols-4 gap-4"></div>
                <input type="hidden" id="horario_agendamento" name="horario_agendamento" value="{{ old('horario_agendamento', $agendamento->horario_agendamento) }}">
            </div>

            <div class="mb-6">
                <label for="id_servico" class="text-sm font-semibold text-gray-200">Serviço</label>
                <select id="id_servico" name="id_servico" class="w-full bg-gray-800 text-white border border-gray-700 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    @foreach($servicos as $servico)
                    <option value="{{ $servico->id }}" {{ old('id_servico', $agendamento->id_servico) == $servico->id ? 'selected' : '' }}>
                        {{ $servico->nome_servico }} - R$ {{ number_format($servico->preco, 2, ',', '.') }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label for="id_funcionario" class="text-sm font-semibold text-gray-200">Funcionário</label>
                <select id="id_funcionario" name="id_funcionario" class="w-full bg-gray-800 text-white border border-gray-700 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    @foreach($funcionarios as $funcionario)
                    <option value="{{ $funcionario->id }}" {{ old('id_funcionario', $agendamento->id_funcionario) == $funcionario->id ? 'selected' : '' }}>
                        {{ $funcionario->nome }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4 text-center">
                <button type="submit" class="bg-yellow-600 text-white px-6 py-2 rounded hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500" onclick="return confirmUpdate()">Atualizar</button>
            </div>
        </form>

        <div class="text-center mt-6">
            <a href="{{ route('dashboard') }}" class="text-blue-500 hover:text-blue-700">Voltar para a tela inicial</a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/pt.js"></script>

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

            const horarioPredefinido = "{{ old('horario_agendamento', $agendamento->horario_agendamento) }}";
            if (horarioPredefinido) {
                document.getElementById("horario_agendamento").value = horarioPredefinido;
                selecionarHora(horarioPredefinido);
            }

            carregarHorarios(); 
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
                const diaSemana = new Date(dataSelecionada).getDay();
                const diasDaSemana = ["domingo", "segunda", "terca", "quarta", "quinta", "sexta", "sabado"];
                const diaDaSemanaSelecionado = diasDaSemana[diaSemana];
                const horarios = horariosFuncionamento[diaDaSemanaSelecionado];

                if (horarios && horarios.length > 0) {
                    horarios.forEach(hora => {
                        const button = document.createElement("button");
                        button.type = "button";
                        button.className = "hora-btn bg-gradient-to-r from-blue-500 to-blue-700 text-white py-3 px-6 rounded-full shadow-lg transform transition duration-300 ease-in-out hover:scale-105 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-blue-300";
                        button.innerText = hora;

                        horariosDiv.appendChild(button);

                        button.addEventListener("click", function() {
                            horarioSelecionadoInput.value = hora;
                            selecionarHora(hora);
                        });
                    });
                }
            }
        }

        function selecionarHora(hora) {
            const buttons = document.querySelectorAll(".hora-btn");
            buttons.forEach(btn => {
                btn.classList.remove("bg-blue-600", "border-4", "border-blue-800", "shadow-2xl");
                btn.classList.add("bg-gradient-to-r", "from-blue-500", "to-blue-700");
            });

            const btnSelecionado = Array.from(buttons).find(btn => btn.innerText === hora);
            if (btnSelecionado) {
                btnSelecionado.classList.add("bg-blue-600", "border-4", "border-blue-800", "shadow-2xl");
            }
        }

        function confirmUpdate() {
            var result = confirm("Você tem certeza que deseja atualizar este agendamento?");
            return result;
        }
    </script>
</body>

</html>
