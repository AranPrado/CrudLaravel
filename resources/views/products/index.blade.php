<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Cadastro</title>




</head>

<body class="bg-gray-100 p-8">
    <div class="flex justify-between my-2">
        <h1 class="text-3xl font-light ">Lista de compras</h1>
        <div>
            <a href="{{ route('products.showAll') }}" class="px-5 py-2 bg-cyan-700 text-white rounded-lg">Meus produtos</a>
        </div>
    </div>
    <hr>
    <div class="mt-8">
        <form method="POST" action="{{ route('products.store') }}">

            @csrf
            <div class="mb-4">
                <label for="name" class="block font-bold">Nome do produto:</label>
                <input type="text" name="name" id="name" placeholder="Ex: Mesa"
                    class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="price" class="block font-bold">Preço:</label>
                <input type="text" name="price"  id="price" placeholder="R$..."
                    class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="quantity" class="block font-bold">Quantidade:</label>
                <input type="text" name="quantity" id="quantity" placeholder="QTD..."
                    class="w-full p-2 border rounded">
            </div>
            <button type="submit"
                class="flex px-5 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Salvar</button>
        </form>
        @if (session('success'))
            <div class="mt-4 bg-green-200 p-4 rounded flex items-center">
                <span class="text-green-700 text-lg mr-2">&#x2714;</span>
                <span class="text-green-700">{{ session('success') }}</span>
            </div>
        @elseif (session('error'))
            <div class="mt-4 bg-red-200 p-4 rounded">
                <span class="text-red-700">{{ session('error') }}</span>
            </div>
        @endif
    </div>

</body>


</html>
