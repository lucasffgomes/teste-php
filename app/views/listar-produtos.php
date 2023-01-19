<header>
    <div class="container mx-auto">
        <div class="navbar bg-base-100">
            <div class="flex-1">
                <a href="/" class="btn btn-ghost normal-case text-xl">Teste PHP</a>
            </div>
            <div class="flex-none">
                <ul class="menu menu-horizontal px-1 space-x-2">
                    <li><a href="/">Home</a></li>
                    <li><a href="/listar/fornecedores">Listar fornecedores</a></li>
                    <li><a href="/adicionar/fornecedor">Adicionar fornecedor</a></li>
                    <li><a class="active" href="/listar/produtos">Listar produtos</a></li>
                    <li><a href="/adicionar/produto">Adicionar produto</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<main>
    <section class="container mx-auto my-10">
        <div class="text-2xl text-zinc-600 font-medium">
            <h2>Produtos</h2>
        </div>
        <div class="overflow-x-auto my-5">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>Nome do produto</th>
                        <th>Valor</th>
                        <th>Peso</th>
                        <th>Quantidade em estoque</th>
                        <th>Fornecedor</th>
                        <th>Telefone</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $produto) : ?>
                        <tr>
                            <th><?php echo $produto->nome_produto ?></th>
                            <td><?php echo $produto->valor_produto ?></td>
                            <td><?php echo $produto->peso ?></td>
                            <td><?php echo $produto->quantidade_estoque ?></td>
                            <td><?php echo $produto->nome_fantasia ?></td>
                            <td><?php echo $produto->telefone ?></td>
                            <td>
                                <div class="tooltip" data-tip="Editar">
                                    <a class="btn btn-square btn-outline" href="/produto/editar/<?php echo $produto->id_produto ?>">
                                        <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                            <path fill="none" d="M0 0h24v24H0z" />
                                            <path d="M15.728 9.686l-1.414-1.414L5 17.586V19h1.414l9.314-9.314zm1.414-1.414l1.414-1.414-1.414-1.414-1.414 1.414 1.414 1.414zM7.242 21H3v-4.243L16.435 3.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 21z" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="tooltip" data-tip="Excluir">
                                    <a class="btn btn-square btn-outline" href="/produto/deletar/<?php echo $produto->id_produto ?>">
                                        <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                            <path fill="none" d="M0 0h24v24H0z" />
                                            <path d="M17 6h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3zm1 2H6v12h12V8zm-4.586 6l1.768 1.768-1.414 1.414L12 15.414l-1.768 1.768-1.414-1.414L10.586 14l-1.768-1.768 1.414-1.414L12 12.586l1.768-1.768 1.414 1.414L13.414 14zM9 4v2h6V4H9z" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nome do produto</th>
                        <th>Valor</th>
                        <th>Peso</th>
                        <th>Quantidade em estoque</th>
                        <th>Fornecedor</th>
                        <th>Telefone</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
</main>