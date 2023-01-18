# Teste-PHP
Projeto de sistema web utilizando as 4 operações básicas com banco de dados: Create, Read, Update e Delete.

## Introdução

Esse projeto está utilizando uma arquitetura constituída em controllers e views, seguindo boas práticas e padrões modernos de codificação.
Utilizando TailwindCSS para o frontend e o DaisyUI para os componentes tornando sua manutenção muito mais fácil e interface moderna.
Os dados de empresa são fictícios e foram tirados do site (https://4devs.com.br). 

## Instalar e rodar o projeto

## Dependências globais

É necessário ter todas as seguintes dependências instaladas:

- PHP v8.2 (ou versão superior);
- Composer v2.3.7 (ou versão superior);
- MySQL v5.6 (ou versão superior);
- Node.js LTS v16 (ou versão superior).

## Dependências locais

Após baixar/clonar o reposítório, entre na pasta do mesmo e instale as dependências locais
com os seguintes comandos abaixo:

```bash
npm install
```

```bash
composer install
```

## Importar base de dados
Faça a importação da base de dados a partir do arquivo dump.sql que está na src/ 

## Executar aplicação

Para executar a aplicação, rode o comando abaixo:

```bash
composer run server
```

Com isso, a aplicação será executada, sendo acessível pela url (http://localhost:8000).
Pronto! Agora é só inserir novas features para criar um produto melhor. Faça bom uso!