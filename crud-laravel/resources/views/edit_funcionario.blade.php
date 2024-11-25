<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-900 text-white">
    <div class="container mx-auto p-6 max-w-2xl">
        <h1 class="text-center text-3xl font-bold mb-6">Editar Funcionário</h1>

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


        <form action="{{ route('funcionarios.update', $funcionario->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="nome" class="block text-sm font-semibold text-gray-200">Nome</label>
                <input type="text" name="nome" id="nome" value="{{ $funcionario->nome }}" required class="w-full bg-gray-800 text-white border border-gray-700 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="caminho_barbearia" class="block text-sm font-semibold text-gray-200">Como começou na profissão?</label>
                <textarea name="caminho_barbearia" id="caminho_barbearia" required class="w-full bg-gray-800 text-white border border-gray-700 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $funcionario->caminho_barbearia }}</textarea>
            </div>

            <div>
                <label for="foto" class="block text-sm font-semibold text-gray-200">Foto</label>
                <input type="file" name="foto" id="foto" class="w-full bg-gray-800 text-white border border-gray-700 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="frase_pessoal" class="block text-sm font-semibold text-gray-200">Frase Pessoal</label>
                <textarea name="frase_pessoal" id="frase_pessoal" class="w-full bg-gray-800 text-white border border-gray-700 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $funcionario->frase_pessoal }}</textarea>
            </div>

            <div class="mb-4 text-center">
                <button type="submit" class="bg-yellow-600 text-white px-6 py-2 rounded hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500" onclick="return confirmUpdate()">Atualizar Funcionário</button>
            </div>
        </form>

        <div class="text-center mt-6">
            <a href="{{ route('funcionarios.index') }}" class="text-blue-500 hover:text-blue-700">Voltar para a lista de funcionários</a>
        </div>
    </div>

    <script>
        function confirmUpdate() {
            var result = confirm("Você tem certeza que deseja atualizar os dados deste funcionário?");
            return result;
        }
    </script>
</body>

</html>