<header>
    <div class="container mx-auto">
        <div class="navbar bg-base-100">
            <div class="flex-1">
                <a href="/" class="btn btn-ghost normal-case text-xl">Teste PHP</a>
            </div>
            <div class="flex-none">
                <ul class="menu menu-horizontal px-1 space-x-2">
                    <li><a href="/">Home</a></li>
                    <li><a class="active" href="/listar/fornecedores">Listar fornecedores</a></li>
                    <li><a href="/adicionar/produto">Adicionar fornecedor</a></li>
                    <li><a href="/listar/produtos">Listar produtos</a></li>
                    <li><a href="/adicionar/fornecedor">Adicionar produto</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<main>
    <section class="container mx-auto my-10">
        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>Nome vendedor</th>
                        <th>Email</th>
                        <th>CNPJ</th>
                        <th>Razão Social</th>
                        <th>Nome Fantasia</th>
                        <th>Telefone</th>
                        <th>Celular</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($fornecedores as $fornecedor) : ?>
                        <tr>
                            <th><?php echo $fornecedor->nome_vendedor ?></th>
                            <td><?php echo $fornecedor->email_vendedor ?></td>
                            <td><?php echo $fornecedor->cnpj ?></td>
                            <td><?php echo $fornecedor->razao_social ?></td>
                            <td><?php echo $fornecedor->nome_fantasia ?></td>
                            <td><?php echo $fornecedor->telefone ?></td>
                            <td><?php echo $fornecedor->celular_vendedor ?></td>
                            <td>
                                <a href="/fornecedor/editar/<?php echo $fornecedor->id_fornecedor ?>">Editar</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nome vendedor</th>
                        <th>Email</th>
                        <th>CNPJ</th>
                        <th>Razão Social</th>
                        <th>Nome Fantasia</th>
                        <th>Telefone</th>
                        <th>Celular</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
</main>