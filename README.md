# Boostech Email

Este pacote tem o objetivo de abstrair métodos que permitam ao desenvolvedor manipular a leitura de e-mails

## 🚀 Começando

Os passos a seguir descreverão a instalação do pacote e a sua utilização

### 📋 Pré-requisitos

Este pacote foi desenvolvido com as seguintes tecnologias:
- PHP 7.4
- Laravel Framework 5.8.38
- Postgresql 12
- Composer version 2.2.6

### 🔧 Instalação

1) Acesse a pasta do projeto na qual você deseja instalar o pacote (lembre-se dos pré-requisitos)
2) Execute o comando: ```composer require boostech/email```
3) Execute o comando: ```sudo apt install php7.4-imap```
4) Execute o comando: ```sudo service apache2 restart```
5) Será criada a pasta vendor/boostech/email
6) Edite o arquivo /<nome_projeto>/config/app.php e adicione a linha Boostech\Email\Providers\EmailServiceProvider::class dentro da tag providers
```
'providers' => [
    ...
    ...
    ...
    App\Providers\EventServiceProvider::class,
    App\Providers\RouteServiceProvider::class,
    Boostech\Email\Providers\EmailServiceProvider::class,
],
```

## 📦 Desenvolvimento

Para utilizar o pacote, siga o seguinte exemplo:

1) Crie no seu projeto um Controller chamado TesteController
3) Adicione um método a este controller
```public function teste()
{
    $hmail = new HmailClass('<endereço_imap>', '<porta_imap>', 'SSL', '<endereco_email_a_ser_lido>', '<senha_do_email>', true, '<diretorio_para_salvar_anexos>');
    $retorno = $hmail->ler("INBOX", "", "");

    echo $retorno["mensagem"] . "<br>";

    if ($retorno["emails"] == true) {
        foreach ($retorno["emails"] as $email) {
            foreach ($email->attachments as $attachments) {
                print_r($attachments);
            }
        }
    }
}
```
    
IMPORTANTE:
- Não se esqueça de ler a documentação da classe e do método, quais os parâmetros, o que ele retorna e etc.

## 📌 Versão

Versão 1.0.0

## ✒️ Autores

* **João Romeiro** - (https://github.com/JoaoRomeiro)

## 📄 Licença

MIT
