# Projeto de Cadastro de Produtos

Este é um projeto de cadastro de produtos desenvolvido em Laravel. O sistema permite adicionar, editar e excluir produtos, bem como exibir uma lista de produtos cadastrados.

## Tecnologias Utilizadas

- Laravel: Framework PHP utilizado para o desenvolvimento do backend da aplicação.
- Tailwind CSS: Framework CSS utilizado para agilizar o desenvolvimento do frontend, com estilos pré-definidos e utilitários de classe.
- Axios: Biblioteca JavaScript utilizada para fazer requisições HTTP.
- SweetAlert2: Biblioteca JavaScript utilizada para exibir alertas e modais elegantes.
- MySQL: Sistema de gerenciamento de banco de dados utilizado para armazenar os dados dos produtos.

## Estrutura do Projeto

- `index.blade.php`: Página de cadastro de produtos. Nessa página, é possível adicionar um novo produto fornecendo o nome, preço e quantidade.

[![](https://github.com/AranPrado/CrudLaravel/blob/main/resources/views/assests/index2.png)](http://github.com/AranPrado/CrudLaravel/blob/main/resources/views/assests/index2.png)

- `showAll.blade.php`: Página de exibição dos produtos cadastrados. Nessa página, é exibida uma lista de produtos com seus detalhes, incluindo nome, quantidade, preço e data de criação. Também é possível editar ou excluir um produto.

[![](https://github.com/AranPrado/CrudLaravel/blob/main/resources/views/assests/mostra2.png)](https://github.com/AranPrado/CrudLaravel/blob/main/resources/views/assests/mostra2.png)

- `edit.blade.php`: Página de edição de produto. Nessa página, é possível editar as informações de um produto existente, incluindo nome, preço e quantidade.

[![](https://github.com/AranPrado/CrudLaravel/blob/main/resources/views/assests/edit2.png)](https://github.com/AranPrado/CrudLaravel/blob/main/resources/views/assests/edit2.png)

- `ProductsController.php`: Controlador responsável por lidar com as requisições relacionadas aos produtos. Ele contém métodos para criar, exibir, editar e excluir produtos.
- `web.php`: Arquivo de rotas que define as rotas da aplicação, mapeando as URLs para os métodos correspondentes do controlador.

## Instruções de Uso

1. Faça o clone deste repositório para o seu ambiente local.
2. Certifique-se de ter o Laravel e o MySQL instalados em sua máquina.
3. Crie um banco de dados no MySQL.
4. Configure as informações de conexão com o banco de dados no arquivo `.env`.
5. Execute as migrações para criar as tabelas necessárias no banco de dados.
6. Inicie o servidor PHP com o comando `php artisan serve`.
7. Acesse a aplicação em seu navegador, utilizando a URL fornecida pelo servidor PHP.

---

Esse é um exemplo de texto que descreve o projeto e as tecnologias utilizadas. Sinta-se à vontade para personalizá-lo de acordo com as características do seu projeto.

Espero que isso ajude! Se você tiver mais alguma dúvida, estou aqui para ajudar.
