<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Produto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-200 py-10">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-8">
        <h1 class="text-3xl font-light mb-6">Editar Produto</h1>

        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block font-medium mb-2">Nome do produto:</label>
                <input type="text" name="name" id="name" value="{{ $product->name }}"
                    placeholder="Ex: Cadeira"
                    class="w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm px-4 py-2">
            </div>

            <div class="mb-4">
                <label for="price" class="block font-medium mb-2">Preço:</label>
                <input type="text" name="price" id="price" value="{{ $product->price }}" value="{{ number_format($product->price, 2, '.', '') }}" placeholder="R$****"
                    class="w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm px-4 py-2">
            </div>

            <div class="mb-6">
                <label for="quantity" class="block font-medium mb-2">Quantidade:</label>
                <input type="text" name="quantity" id="quantity" value="{{ $product->quantity }}" placeholder="****"
                    class="w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm px-4 py-2">
            </div>
            <div class="flex justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md shadow-md">
                    Salvar
                </button>
                
                    <a class="bg-cyan-700 py-2 px-5 rounded-lg text-white" href="{{ route('products.create') }}">Voltar ao
                        cadastro</a>
                
            </div>
        </form>
    </div>
</body>

</html>
