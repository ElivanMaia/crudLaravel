<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Serviço</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-900 text-white">
    <div class="container mx-auto p-6 max-w-2xl">
        <h1 class="text-center text-3xl font-bold mb-6">Editar Serviço</h1>

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


        <form action="{{ route('servicos.update', $servico->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nome_servico" class="block text-sm font-semibold text-gray-300">Nome do Serviço</label>
                <input type="text" name="nome_servico" id="nome_servico"
                    class="w-full p-3 bg-gray-800 border border-gray-700 rounded text-white"
                    value="{{ old('nome_servico', $servico->nome_servico) }}" placeholder="Nome do serviço" required>
            </div>

            <div class="mb-4">
                <label for="preco" class="block text-sm font-semibold text-gray-300">Preço</label>
                <input type="number" step="0.01" name="preco" id="preco"
                    class="w-full p-3 bg-gray-800 border border-gray-700 rounded text-white"
                    value="{{ old('preco', $servico->preco) }}" placeholder="Preço do serviço" required>
            </div>

            <div class="mb-4">
                <label for="descricao" class="block text-sm font-semibold text-gray-300">Descrição</label>
                <textarea name="descricao" id="descricao"
                    class="w-full p-3 bg-gray-800 border border-gray-700 rounded text-white"
                    placeholder="Descrição do serviço">{{ old('descricao', $servico->descricao) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="imagem" class="block text-sm font-semibold text-gray-300">Imagem</label>
                <input type="file" name="imagem" id="imagem"
                    class="w-full p-3 bg-gray-800 border border-gray-700 rounded text-white">
                @if($servico->imagem)
                <div class="mt-4">
                    <img src="{{ Storage::url($servico->imagem) }}" alt="Imagem do Serviço" class="w-32 h-32 object-cover rounded-lg">
                </div>
                @endif
            </div>

            <div class="mb-4 text-center">
                <button type="submit" class="bg-yellow-600 text-white px-6 py-2 rounded hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500" onclick="return confirmUpdate()">Atualizar Serviço</button>
            </div>
        </form>

        <div class="text-center">
            <a href="{{ route('servicos.index') }}" class="text-blue-500 hover:text-blue-700">Voltar para a lista de serviços</a>
        </div>
    </div>

    <script>
        function confirmUpdate() {
            var result = confirm("Você tem certeza que deseja atualizar este serviço?");
            return result;
        }
    </script>
</body>

</html>