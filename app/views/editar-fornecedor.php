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
                    <li><a href="/listar/produtos">Listar produtos</a></li>
                    <li><a href="/adicionar/produto">Adicionar produto</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<main>
    <section class="container mx-auto my-10">
        <div class="text-2xl text-zinc-600 font-medium">
            <h2>Editar fornecedor</h2>
        </div>
        <div class="my-5">
            <?php if (count($fornecedor) > 0) : ?>
                <?php echo getFlash('message') ?>
                <form class="form-control space-y-5" action="/fornecedor/editar/<?php echo $fornecedor[0]->id_fornecedor ?>" method="post">
                    <div class="w-full space-y-5">
                        <div class="flex flex-row gap-5">
                            <!--  -->
                            <div class="w-2/6">
                                <label class="label" for="nome_vendedor">
                                    <span class="label-text">Nome do vendedor</span>
                                </label>
                                <input type="text" placeholder="Informe o nome do vendedor" class="input input-bordered w-full" id="nome_vendedor" name="nome_vendedor" value="<?php echo $fornecedor[0]->nome_vendedor ?>" />
                                <label class="label">
                                    <span class="label-text-alt"><?php echo getFlash('nome_vendedor'); ?></span>
                                </label>
                            </div>
                            <!--  -->
                            <div class="w-1/6">
                                <label class="label" for="email_vendedor">
                                    <span class="label-text">Email do vendedor</span>
                                </label>
                                <input type="email" placeholder="Informe o email do vendedor" class="input input-bordered w-full" id="email_vendedor" name="email_vendedor" value="<?php echo $fornecedor[0]->email_vendedor ?>" />
                                <label class="label">
                                    <span class="label-text-alt"><?php echo getFlash('email_vendedor'); ?></span>
                                </label>
                            </div>
                            <!--  -->
                            <div class="w-1/6">
                                <label class="label" for="cnpj">
                                    <span class="label-text">CNPJ</span>
                                </label>
                                <input type="tel" placeholder="Informe o CNPJ" class="input input-bordered w-full" id="cnpj" name="cnpj" value="<?php echo $fornecedor[0]->cnpj ?>" />
                                <label class="label">
                                    <span class="label-text-alt"><?php echo getFlash('cnpj'); ?></span>
                                </label>
                            </div>
                            <!--  -->
                            <div class="w-2/6">
                                <label class="label" for="razao_social">
                                    <span class="label-text font-medium">Razão social</span>
                                </label>
                                <input type="tel" placeholder="Informe a razão social" class="input input-bordered w-full" id="razao_social" name="razao_social" value="<?php echo $fornecedor[0]->razao_social ?>" />
                                <label class="label">
                                    <span class="label-text-alt"><?php echo getFlash('razao_social'); ?></span>
                                </label>
                            </div>
                            <!--  -->
                        </div>
                        <div class="flex flex-row gap-5">
                            <!--  -->
                            <div class="w-2/6">
                                <label class="label" for="nome_fantasia">
                                    <span class="label-text">Nome fantasia</span>
                                </label>
                                <input type="text" placeholder="Informe o nome fantasia" class="input input-bordered w-full" id="nome_fantasia" name="nome_fantasia" value="<?php echo $fornecedor[0]->nome_fantasia ?>" />
                                <label class="label">
                                    <span class="label-text-alt"><?php echo getFlash('nome_fantasia'); ?></span>
                                </label>
                            </div>
                            <!--  -->
                            <div class="w-1/6">
                                <label class="label" for="telefone">
                                    <span class="label-text">Telefone</span>
                                </label>
                                <input type="tel" placeholder="Informe o telefone" class="input input-bordered w-full" id="telefone" name="telefone" value="<?php echo $fornecedor[0]->telefone ?>" />
                                <label class="label">
                                    <span class="label-text-alt"><?php echo getFlash('telefone'); ?></span>
                                </label>
                            </div>
                            <!--  -->
                            <div class="w-1/6">
                                <label class="label" for="celular_vendedor">
                                    <span class="label-text">Celular do vendedor</span>
                                </label>
                                <input type="tel" placeholder="Informe o celular do vendedor" class="input input-bordered w-full" id="celular_vendedor" name="celular_vendedor" value="<?php echo $fornecedor[0]->celular_vendedor ?>" />
                                <label class="label">
                                    <span class="label-text-alt"><?php echo getFlash('celular_vendedor'); ?></span>
                                </label>
                            </div>
                            <!--  -->
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
                            <span>Desculpe: Esse fornecedor não existe!</span>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </div>
        </div>
    </section>
</main>