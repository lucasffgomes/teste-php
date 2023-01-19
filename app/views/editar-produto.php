<header>
    <div class="container mx-auto">
        <div class="navbar bg-base-100">
            <div class="flex-1">
                <a href="/" class="btn btn-ghost normal-case text-xl">Teste PHP</a>
            </div>
            <div class="flex-none">
                <ul class="menu menu-horizontal px-1 space-x-2">
                    <li><a href="/">Home</a></li>
                    <li><a href="/listar/fornecedores/">Listar fornecedores</a></li>
                    <li><a href="/adicionar/fornecedor">Adicionar fornecedor</a></li>
                    <li><a href="/listar/produtos/">Listar produtos</a></li>
                    <li><a href="/adicionar/produto">Adicionar produto</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<main>
    <section class="container mx-auto my-10">
        <div class="text-2xl text-zinc-600 font-medium">
            <h2>Editar produto</h2>
        </div>
        <div class="my-5">
            <?php if (count($produto) > 0) : ?>
                <?php echo getFlash('message') ?>
                <form class="form-control space-y-5" action="/produto/editar/<?php echo $produto[0]->id_produto ?>" method="post">
                    <div class="w-full space-y-5">
                        <div class="flex flex-row gap-5">
                            <!--  -->
                            <div class="w-2/5">
                                <label class="label" for="nome_produto">
                                    <span class="label-text">Nome do produto</span>
                                </label>
                                <input type="text" placeholder="Informe o nome do produto" class="input input-bordered w-full" id="nome_produto" name="nome_produto" value="<?php echo $produto[0]->nome_produto ?>" />
                                <label class="label">
                                    <span class="label-text-alt"><?php echo getFlash('nome_produto'); ?></span>
                                </label>
                            </div>
                            <!--  -->
                            <div class="w-1/5">
                                <label class="label" for="valor_produto">
                                    <span class="label-text">Valor do produto</span>
                                </label>
                                <input type="text" placeholder="Informe o valor do produto" class="input input-bordered w-full" id="valor_produto" name="valor_produto" value="<?php echo $produto[0]->valor_produto ?>" />
                                <label class="label">
                                    <span class="label-text-alt"><?php echo getFlash('valor_produto'); ?></span>
                                </label>
                            </div>
                            <!--  -->
                            <div class="w-1/5">
                                <label class="label" for="peso">
                                    <span class="label-text">Peso</span>
                                </label>
                                <input type="tel" placeholder="Informe o peso" class="input input-bordered w-full" id="peso" name="peso" value="<?php echo $produto[0]->peso ?>" />
                                <label class="label">
                                    <span class="label-text-alt"><?php echo getFlash('peso'); ?></span>
                                </label>
                            </div>
                            <!--  -->
                            <div class="w-1/5">
                                <label class="label" for="quantidade_estoque">
                                    <span class="label-text font-medium">Quantidade no estoque</span>
                                </label>
                                <input type="number" placeholder="Informe a quantidade" class="input input-bordered w-full" id="quantidade_estoque" name="quantidade_estoque" value="<?php echo $produto[0]->quantidade_estoque ?>" />
                                <label class="label">
                                    <span class="label-text-alt"><?php echo getFlash('quantidade_estoque'); ?></span>
                                </label>
                            </div>
                        </div>
                        <div class="flex flex-row gap-5">
                            <div class="w-2/6">
                                <label class="label" for="id_fornecedor">
                                    <span class="label-text">Fornecedor</span>
                                </label>
                                <select class="input input-bordered w-full" name="id_fornecedor" id="id_fornecedor">
                                    <option value="" hidden>Escolha...</option>
                                    <!--  -->
                                    <?php foreach ($fornecedores as $fornecedor) : ?>
                                        <option value="<?php echo $fornecedor->id_fornecedor ?>" <?php echo ($fornecedor->id_fornecedor == $produto[0]->id_fornecedor ? 'selected' : '') ?>><?php echo $fornecedor->nome_fantasia ?></option>
                                    <?php endforeach ?>
                                    <!--  -->
                                </select>
                                <label class="label">
                                    <span class="label-text-alt"><?php echo getFlash('id_fornecedor'); ?></span>
                                </label>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="flex justify-end">
                            <button class="btn btn-primary" type="submit">Salvar edição</button>
                        </div>
                    </div>
                </form>
            <?php else : ?>
                <div>
                    <div class="alert">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <span>Desculpe: Esse produto não existe!</span>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </div>
        </div>
    </section>
</main>