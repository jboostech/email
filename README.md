# Boostech NFe

Este pacote tem o objetivo de abstrair métodos que permitam ao desenvolvedor manipular arquivos XML provenientes da NF-e

## 🚀 Começando

Essas instruções permitirão que você obtenha uma cópia do projeto em operação na sua máquina local para fins de desenvolvimento e teste.

Consulte **Implantação** para saber como implantar o projeto.

### 📋 Pré-requisitos

Este pacote foi desenvolvido com as seguintes tecnologias:
- PHP 7.4
- Laravel Framework 5.8.38
- Postgresql 12
- Composer version 2.2.6

### 🔧 Instalação

1) Acesse a pasta do projeto na qual você deseja instalar o pacote (lembre-se dos pré-requisitos)
2) Execute o comando: composer require boostech/nfe
3) Será criada a pasta vendor/boostech/nfe
4) Edite o arquivo /<nome_projeto>/config/app.php e adicione a linha Boostech\Nfe\Providers\NfeServiceProvider::class dentro da tag providers
    'providers' => [
        ...
        ...
        ...
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
        Boostech\Nfe\Providers\NfeServiceProvider::class,

    ],
5) Dentro da raiz do diretório do seu projeto, execute o comando php artisan migrate
6) Serão criadas duas tabelas no seu banco de dados:
    - boostech_nfe_hnfex: Tabela responsável por gerenciar o cabeçalho das NF-e's
    - boostech_nfe_hnfei: Tabela responsável por gerenciar os itens das NF-e's

## 📦 Desenvolvimento

Para utilizar o pacote, siga o seguinte exemplo:

1) Salve alguns XML's de NF-e's autorizadas em um determinado diretório
2) Crie no seu projeto um Controller chamado TesteController
3) Adicione um método a este controller
    public function teste()
    {
        $diretorio = "<diretorio_dos_xmls>";

        foreach (array_diff(scandir($diretorio), array('..', '.')) as $item) {
            $retorno = Hnfex::importarXML(1, 2, sprintf("%s/%s", $diretorio, $item));

            if (!$retorno['status']) {
                dd($retorno['excessao']);
            }
        }

        echo "XML's importados!";
    }
4) Crie uma rota para este método
    Route::get('/teste', [App\Http\Controllers\TesteController::class, 'teste'])->name('teste.teste');
5) Acesse a rota http://localhost:8000/teste através do seu browser
6) O sistema realizará a importação dos XML's e caso dê tudo certo, a seguinte mensagem será apresentada: XML's importados!
7) Acesse as tabelas boostech_nfe_hnfex e boostech_nfe_hnfei e confira se estão preenchidas

## 📌 Versão

Versão 1.0.1

## ✒️ Autores

* **João Romeiro** - (https://github.com/JoaoRomeiro)

## 📄 Licença

MIT
