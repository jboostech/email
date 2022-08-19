<?php

namespace Boostech\Email\Classes;

/**
 * Classe responsável por manipular uma conta de e-mail
 * IMPORTANTE: O IMAP precisa estar liberado no host
 */
class HmailClass
{
    private string $host;
    private string $port;
    private string $security;
    private string $user;
    private string $password;
    private string $imapPath;
    private string $unSeen;
    private string $attachmentsDir;

    /**
     * Construtor da calsse Hmail
     *
     * @param string $host: Endereço host
     * @param string $port: Porta do endereço host
     * @param string $security: Tipo de segurança (SSL, TSL ou vazio)
     * @param string $user: Usuário, normalmente um e-mail
     * @param string $password: Senha do usuário
     * @param string $unSeen: 'True' percorre as mensagens não lidas e 'False' percorre todas as mensagens
     * @param string $attachmentsDir: Diretório na qual os anexos serão salvos
     */
    function __construct(string $host, string $port, string $security, string $user, string $password, bool $unSeen, string $attachmentsDir)
    {
        $this->host = $host;
        $this->port = $port;
        $this->security = $security;
        $this->user = $user;
        $this->password = $password;
        $this->unSeen = $unSeen;
        $this->attachmentsDir = $attachmentsDir;
    }

    /**
     * Método utilizado para ler e-mails
     *
     * @param string $box: Nome da pasta da caixa postal cujos e-mails serão pesquisados, por exemplo, INBOX
     * @param string $subject: Assunto do e-mail a ser pesquisado, por exemplo, NF-e XML
     * @param string $email: Endereço de e-mail a ser pesquisado, por exemplo, j.romeiro@live.com
     * @return array $retorno: Retorna um array com a seguinte estrutura:
     *                  [status]: True informa que a operação foi bem sucedida e Fale informa que algum problema ocorreu
     *                  [mensagem]: Mensagem com o resultado da operação, por exemplo, E-mails lidos com sucesso
     *                  [excessao]: Objeto Throwable caso algum problema tenha ocorrido
     *                  [emails]: Array contendo os e-mails lidos na caixa postal
     */
    public function ler(string $box, string $subject, string $email)
    {
        $mailsIds = [];

        $status = false;
        $mensagem = 'Nenhum e-mail encontrado';
        $excessao = '';
        $emails = [];

        $this->imapPath = sprintf('{%s:%s/imap/%s/novalidate-cert}%s', $this->host, $this->port, $this->security, $box);

        try {
            $mailbox = new MailBox($this->imapPath, $this->user, $this->password, $this->attachmentsDir);

            $search = $this->unSeen ? 'UNSEEN' : '';

            if (strlen(trim($subject)) > 0) {
                $search = sprintf('%s SUBJECT "%s"', $search, $subject);
            }

            if (strlen(trim($email)) > 0) {
                $search = sprintf('%s FROM "%s"', $search, $email);
            }

            $mailsIds = $mailbox->searchMailBox($search);

            foreach ($mailsIds as $id) {
                $mail = $mailbox->getMail($id);
                $emails[] = $mail;
            }

            if (count($emails) > 0) {
                $mensagem = 'E-mails lidos com sucesso';
            }

            $status = true;
        } catch (\Throwable $th) {
            $status = false;
            $mensagem = "Ocorreu um erro inesperado";
            $excessao = $th;
        }

        $retorno["status"] = $status;
        $retorno["mensagem"] = $mensagem;
        $retorno["excessao"] = $excessao;
        $retorno["emails"] = $emails;

        return $retorno;
    }
}
