<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Criar Serviço</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white">
    <div class="container mx-auto p-6 max-w-2xl">
        <h1 class="text-center text-3xl font-bold mb-6">Criar Novo Serviço</h1>

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

        <form action="{{ route('servicos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="nome_servico" class="block text-sm font-medium text-gray-300">Nome do Serviço</label>
                <input type="text" name="nome_servico" id="nome_servico" value="{{ old('nome_servico') }}" class="w-full px-4 py-2 bg-gray-800 text-white rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
            </div>

            <div class="mb-4">
                <label for="preco" class="block text-sm font-medium text-gray-300">Preço</label>
                <input type="text" name="preco" id="preco" value="{{ old('preco') }}"
                    class="w-full px-4 py-2 bg-gray-800 text-white rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    required>
            </div>

            <div class="mb-4">
                <label for="descricao" class="block text-sm font-medium text-gray-300">Descrição</label>
                <textarea name="descricao" id="descricao" class="w-full px-4 py-2 bg-gray-800 text-white rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('descricao') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="imagem" class="block text-sm font-medium text-gray-300">Imagem</label>
                <input type="file" name="imagem" id="imagem" class="w-full px-4 py-2 bg-gray-800 text-white rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white font-semibold rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Adicionar Serviço</button>
        </form>

        <div class="text-center mt-6">
            <a href="{{ route('servicos.index') }}" class="text-blue-500 hover:text-blue-700">Voltar para a lista de serviços</a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.7/inputmask.min.js"></script>

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
