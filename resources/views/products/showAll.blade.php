<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Meus produtos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="flex justify-between my-2 px-4 py-2">
        <h1 class="text-3xl font-light">Meus produtos</h1>
        <div>
            <a class="bg-cyan-700 py-2 px-5 rounded-lg text-white" href="{{ route('products.create') }}">Voltar ao
                cadastro</a>
        </div>
    </div>
    <hr>

    <div class="my-4 mx-2">
        @php
            $total = 0;
        @endphp

        @foreach ($products as $product)
            <div class="flex items-center justify-between bg-white rounded-lg shadow-md p-4 my-2">
                <div>
                    <div class="flex">
                        <h2 class="text-lg font-semibold ">{{ $product->name }}</h2>

                        
                    </div>
                    <p class="text-gray-600">Quantidade: {{ $product->quantity }}</p>
                    <p class="text-gray-600">Preço: R$ {{ number_format($product->price, 2, '.', '') }}</p>
                    <p class="text-gray-600">Criado em: {{ date('d/m/Y - H:i', strtotime($product->created_at)) }}</p>
                    <p class="text-gray-600">Criado por: {{ $product->user }}</p>
                </div>
                <div>
                    <button class="text-red-600 hover:text-red-700" onclick="deleteProduct({{ $product->id }})"
                        id="deleteProduct-{{ $product->id }}">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                    <a class="text-blue-600 hover:text-blue-700 ml-2" href="{{ route('products.edit', $product->id) }}">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM20 4v2a1 1 0 01-1 1H5a1 1 0 01-1-1V4a1 1 0 011-1h1M8 12h.01M12 12h.01M16 12h.01">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
            @php
                $total += $product->price;
            @endphp
        @endforeach

        <div class="mt-4 bg-white rounded-lg shadow-md p-4">
            <p class="text-lg font-semibold">Valor total: R$ {{ number_format($total, 2, '.', '') }}</p>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function deleteProduct(productId) {
            Swal.fire({
                title: 'Tem certeza?',
                text: 'Tem certeza de que deseja excluir este produto?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sim',
                cancelButtonText: 'Não'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('/products/' + productId, {
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    'content')
                            }
                        })
                        .then(response => {
                            if (response.status === 200) {
                                return response.data;
                            } else {
                                throw new Error('Erro ao excluir o produto.');
                            }
                        })
                        .then(data => {
                            Swal.fire({
                                title: 'Sucesso!',
                                text: data.message,
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                location.reload();
                            });
                        })
                        .catch(error => {
                            console.error(error);
                            Swal.fire({
                                title: 'Erro!',
                                text: 'Ocorreu um erro ao excluir o produto.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        });
                }
            });
        }
    </script>
</body>

</html>
