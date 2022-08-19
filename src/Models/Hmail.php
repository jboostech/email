<?php

namespace Boostech\Nfe\Models;

use Boostech\Nfe\Requests\HnfexRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Integer;

/**
 * Classe responsável por gerenciar o cabeçalho da NF-e
 */
class Hnfex extends Model
{
    protected $table = "boostech_nfe_hnfex";

    protected $fillable = [
        'ide_cuf',
        'ide_cnf',
        'ide_natop',
        'ide_indpag',
        'ide_mod',
        'ide_serie',
        'ide_nnf',
        'ide_dhemi',
        'ide_dhsaient',
        'ide_tpnf',
        'ide_iddest',
        'ide_cmunfg',
        'ide_tpimp',
        'ide_tpemis',
        'ide_cdv',
        'ide_tpamb',
        'ide_finnfe',
        'ide_indfinal',
        'ide_indpres',
        'ide_procemi',
        'ide_verproc',

        'emit_cnpj',
        'emit_cpf',
        'emit_xnome',
        'emit_xfant',
        'emit_ie',
        'emit_iest',
        'emit_im',
        'emit_crt',

        'enderemit_xlgr',
        'enderemit_nro',
        'enderemit_xcpl',
        'enderemit_xbairro',
        'enderemit_cmun',
        'enderemit_xmun',
        'enderemit_uf',
        'enderemit_cep',
        'enderemit_cpais',
        'enderemit_xpais',
        'enderemit_fone',

        'dest_cnpj',
        'dest_cpf',
        'dest_idestrangeiro',
        'dest_xnome',
        'dest_xfant',
        'dest_indiedest',
        'dest_ie',
        'dest_isuf',
        'dest_im',
        'dest_email',

        'enderdest_xlgr',
        'enderdest_nro',
        'enderdest_xcpl',
        'enderdest_xbairro',
        'enderdest_cmun',
        'enderdest_xmun',
        'enderdest_uf',
        'enderdest_cep',
        'enderdest_cpais',
        'enderdest_xpais',
        'enderdest_fone',

        'total_vprod',

        'vol_qvol',
        'vol_esp',
        'vol_marca',
        'vol_nvol',
        'vol_pesol',
        'vol_pesob',

        'infadic_infcpl',
        'infprot_tpamb',
        'infprot_veraplic',
        'infprot_chnfe',
        'infprot_dhrecbto',
        'infprot_nprot',
        'infprot_cstat',
        'infprot_xmotivo',

        'empresa_id',
        'usuario_id',
    ];

    public function setIdeDhsaientAttribute($value)
    {
        if (strlen(trim($value)) > 0) {
            $this->attributes['ide_dhsaient'] = $value;
        } else {
            $this->attributes['ide_dhsaient'] = null;
        }
    }

    public function setVolQvolAttribute($value)
    {
        if (strlen(trim($value)) > 0) {
            $this->attributes['vol_qvol'] = $value;
        } else {
            $this->attributes['vol_qvol'] = null;
        }
    }

    public function setVolPesolAttribute($value)
    {
        if (strlen(trim($value)) > 0) {
            $this->attributes['vol_pesol'] = $value;
        } else {
            $this->attributes['vol_pesol'] = null;
        }
    }

    public function setVolPesobAttribute($value)
    {
        if (strlen(trim($value)) > 0) {
            $this->attributes['vol_pesob'] = $value;
        } else {
            $this->attributes['vol_pesob'] = null;
        }
    }

    /**
     * Método responsável por persistir os dados do cabeçalho da NF-e
     */
    public static function createHnfex(int $empresa_id, int $usuario_id, Request $data)
    {
        $status = false;
        $excessao = null;
        $mensagem = null;
        $obj = null;

        try {
            DB::beginTransaction();

            $hnfex = Hnfex::create([
                'ide_cuf' =>  $data['ide_cuf'],
                'ide_cnf' =>  $data['ide_cnf'],
                'ide_natop' =>  $data['ide_natop'],
                'ide_mod' =>  $data['ide_mod'],
                'ide_serie' =>  $data['ide_serie'],
                'ide_nnf' =>  $data['ide_nnf'],
                'ide_dhemi' =>  $data['ide_dhemi'],
                'ide_dhsaient' =>  $data['ide_dhsaient'],
                'ide_tpnf' =>  $data['ide_tpnf'],
                'ide_iddest' =>  $data['ide_iddest'],
                'ide_cmunfg' =>  $data['ide_cmunfg'],
                'ide_tpimp' =>  $data['ide_tpimp'],
                'ide_tpemis' =>  $data['ide_tpemis'],
                'ide_cdv' =>  $data['ide_cdv'],
                'ide_tpamb' =>  $data['ide_tpamb'],
                'ide_finnfe' =>  $data['ide_finnfe'],
                'ide_indfinal' =>  $data['ide_indfinal'],
                'ide_indpres' =>  $data['ide_indpres'],
                'ide_procemi' =>  $data['ide_procemi'],
                'ide_verproc' =>  $data['ide_verproc'],

                'emit_cnpj' =>  $data['emit_cnpj'],
                'emit_cpf' =>  $data['emit_cpf'],
                'emit_xnome' =>  $data['emit_xnome'],
                'emit_xfant' =>  $data['emit_xfant'],
                'emit_ie' =>  $data['emit_ie'],
                'emit_iest' =>  $data['emit_iest'],
                'emit_im' =>  $data['emit_im'],
                'emit_crt' =>  $data['emit_crt'],

                'enderemit_xlgr' =>  $data['enderemit_xlgr'],
                'enderemit_nro' =>  $data['enderemit_nro'],
                'enderemit_xcpl' =>  $data['enderemit_xcpl'],
                'enderemit_xbairro' =>  $data['enderemit_xbairro'],
                'enderemit_cmun' =>  $data['enderemit_cmun'],
                'enderemit_xmun' =>  $data['enderemit_xmun'],
                'enderemit_uf' =>  $data['enderemit_uf'],
                'enderemit_cep' =>  $data['enderemit_cep'],
                'enderemit_cpais' =>  $data['enderemit_cpais'],
                'enderemit_xpais' =>  $data['enderemit_xpais'],
                'enderemit_fone' =>  $data['enderemit_fone'],

                'dest_cnpj' =>  $data['dest_cnpj'],
                'dest_cpf' =>  $data['dest_cpf'],
                'dest_idestrangeiro' =>  $data['dest_idestrangeiro'],
                'dest_xnome' =>  $data['dest_xnome'],
                'dest_xfant' =>  $data['dest_xfant'],
                'dest_indiedest' =>  $data['dest_indiedest'],
                'dest_ie' =>  $data['dest_ie'],
                'dest_isuf' =>  $data['dest_isuf'],
                'dest_im' =>  $data['dest_im'],
                'dest_email' =>  $data['dest_email'],

                'enderdest_xlgr' =>  $data['enderdest_xlgr'],
                'enderdest_nro' =>  $data['enderdest_nro'],
                'enderdest_xcpl' =>  $data['enderdest_xcpl'],
                'enderdest_xbairro' =>  $data['enderdest_xbairro'],
                'enderdest_cmun' =>  $data['enderdest_cmun'],
                'enderdest_xmun' =>  $data['enderdest_xmun'],
                'enderdest_uf' =>  $data['enderdest_uf'],
                'enderdest_cep' =>  $data['enderdest_cep'],
                'enderdest_cpais' =>  $data['enderdest_cpais'],
                'enderdest_xpais' =>  $data['enderdest_xpais'],
                'enderdest_fone' =>  $data['enderdest_fone'],

                'total_vprod' =>  $data['total_vprod'],

                'vol_qvol' =>  $data['vol_qvol'],
                'vol_esp' =>  $data['vol_esp'],
                'vol_marca' =>  $data['vol_marca'],
                'vol_nvol' =>  $data['vol_nvol'],
                'vol_pesol' =>  $data['vol_pesol'],
                'vol_pesob' =>  $data['vol_pesob'],

                'infadic_infcpl' =>  $data['infadic_infcpl'],
                'infprot_tpamb' =>  $data['infprot_tpamb'],
                'infprot_veraplic' =>  $data['infprot_veraplic'],
                'infprot_chnfe' =>  $data['infprot_chnfe'],
                'infprot_dhrecbto' =>  $data['infprot_dhrecbto'],
                'infprot_nprot' =>  $data['infprot_nprot'],
                'infprot_cstat' =>  $data['infprot_cstat'],
                'infprot_xmotivo' =>  $data['infprot_xmotivo'],

                'empresa_id' =>  $empresa_id,
                'usuario_id' =>  $usuario_id,
            ]);

            $status = true;
            $mensagem = "Registro criado com sucesso";
            $obj = $hnfex;

            DB::commit();
        } catch (\PDOException $e) {
            $status = false;
            $mensagem = sprintf("Ocorreu um erro inesperado Método: %s", __METHOD__);
            $excessao = $e;
            DB::rollBack();
        }

        return ["status" => $status, "excessao" => $excessao, "mensagem" => $mensagem, "obj" => $obj];
    }

    /**
     * Método responsável por importar um arquivo XML
     *
     * @param integer $empresa_id ID da empresa responsável por armazenar os dados da NF-e, caso não possua, informar 1
     * @param integer $usuario_id ID do usuário responsável por armazenar os dados da NF-e, caso não possua, informar 1
     * @param string $arquivo Diretório, nome e extensão do arquivo XML, por exemplo, /home/joao/Documents/dump/xml/arquivo.xml
     * @return array Retorna um array com a seguinte estrutura:
     *                      status: True informa que a operação foi bem sucedida
     *                      excessao: Retorna a excessão caso algum problema tenha ocorrido
     *                      mensagem: Descreve o status da operação
     */
    public static function importarXML(int $empresa_id, int $usuario_id, string $arquivo)
    {
        $status = false;
        $excessao = null;
        $mensagem = null;

        try {
            DB::beginTransaction();

            $xmldata = simplexml_load_file($arquivo);

            $data = new Request();
            $data->setMethod('POST');
            $data->replace([
                'ide_cuf' => (string)$xmldata->children()->NFe->infNFe->ide->cUF,
                'ide_cnf' => (string)$xmldata->children()->NFe->infNFe->ide->cNF,
                'ide_natop' => (string)$xmldata->children()->NFe->infNFe->ide->natOp,
                'ide_mod' => (string)$xmldata->children()->NFe->infNFe->ide->mod,
                'ide_serie' => (string)$xmldata->children()->NFe->infNFe->ide->serie,
                'ide_nnf' => (string)$xmldata->children()->NFe->infNFe->ide->nNF,
                'ide_dhemi' => (string)$xmldata->children()->NFe->infNFe->ide->dhEmi,
                'ide_dhsaient' => (string)$xmldata->children()->NFe->infNFe->ide->dhSaiEnt,
                'ide_tpnf' => (string)$xmldata->children()->NFe->infNFe->ide->tpNF,
                'ide_iddest' => (string)$xmldata->children()->NFe->infNFe->ide->idDest,
                'ide_cmunfg' => (string)$xmldata->children()->NFe->infNFe->ide->cMunFG,
                'ide_tpimp' => (string)$xmldata->children()->NFe->infNFe->ide->tpImp,
                'ide_tpemis' => (string)$xmldata->children()->NFe->infNFe->ide->tpEmis,
                'ide_cdv' => (string)$xmldata->children()->NFe->infNFe->ide->cDV,
                'ide_tpamb' => (string)$xmldata->children()->NFe->infNFe->ide->tpAmb,
                'ide_finnfe' => (string)$xmldata->children()->NFe->infNFe->ide->finNFe,
                'ide_indfinal' => (string)$xmldata->children()->NFe->infNFe->ide->indFinal,
                'ide_indpres' => (string)$xmldata->children()->NFe->infNFe->ide->indPres,
                'ide_procemi' => (string)$xmldata->children()->NFe->infNFe->ide->procEmi,
                'ide_verproc' => (string)$xmldata->children()->NFe->infNFe->ide->verProc,

                'emit_cnpj' => (string)$xmldata->children()->NFe->infNFe->emit->CNPJ,
                'emit_cpf' => (string)$xmldata->children()->NFe->infNFe->emit->CPF,
                'emit_xnome' => (string)$xmldata->children()->NFe->infNFe->emit->xNome,
                'emit_xfant' => (string)$xmldata->children()->NFe->infNFe->emit->xFant,
                'emit_ie' => (string)$xmldata->children()->NFe->infNFe->emit->IE,
                'emit_iest' => (string)$xmldata->children()->NFe->infNFe->emit->IEST,
                'emit_im' => (string)$xmldata->children()->NFe->infNFe->emit->IM,
                'emit_crt' => (string)$xmldata->children()->NFe->infNFe->emit->CRT,

                'enderemit_xlgr' => (string)$xmldata->children()->NFe->infNFe->emit->enderEmit->xLgr,
                'enderemit_nro' => (string)$xmldata->children()->NFe->infNFe->emit->enderEmit->nro,
                'enderemit_xcpl' => (string)$xmldata->children()->NFe->infNFe->emit->enderEmit->xCpl,
                'enderemit_xbairro' => (string)$xmldata->children()->NFe->infNFe->emit->enderEmit->xBairro,
                'enderemit_cmun' => (string)$xmldata->children()->NFe->infNFe->emit->enderEmit->cMun,
                'enderemit_xmun' => (string)$xmldata->children()->NFe->infNFe->emit->enderEmit->xMun,
                'enderemit_uf' => (string)$xmldata->children()->NFe->infNFe->emit->enderEmit->UF,
                'enderemit_cep' => (string)$xmldata->children()->NFe->infNFe->emit->enderEmit->CEP,
                'enderemit_cpais' => (string)$xmldata->children()->NFe->infNFe->emit->enderEmit->cPais,
                'enderemit_xpais' => (string)$xmldata->children()->NFe->infNFe->emit->enderEmit->xPais,
                'enderemit_fone' => (string)$xmldata->children()->NFe->infNFe->emit->enderEmit->fone,

                'dest_cnpj' => (string)$xmldata->children()->NFe->infNFe->dest->CNPJ,
                'dest_cpf' => (string)$xmldata->children()->NFe->infNFe->dest->CPF,
                'dest_idestrangeiro' => (string)$xmldata->children()->NFe->infNFe->dest->idEstrangeiro,
                'dest_xnome' => (string)$xmldata->children()->NFe->infNFe->dest->xNome,
                'dest_xfant' => (string)$xmldata->children()->NFe->infNFe->dest->xFant,
                'dest_indiedest' => (string)$xmldata->children()->NFe->infNFe->dest->indIEDest,
                'dest_ie' => (string)$xmldata->children()->NFe->infNFe->dest->IE,
                'dest_isuf' => (string)$xmldata->children()->NFe->infNFe->dest->ISUF,
                'dest_im' => (string)$xmldata->children()->NFe->infNFe->dest->IM,
                'dest_email' => (string)$xmldata->children()->NFe->infNFe->dest->email,

                'enderdest_xlgr' => (string)$xmldata->children()->NFe->infNFe->dest->enderDest->xLgr,
                'enderdest_nro' => (string)$xmldata->children()->NFe->infNFe->dest->enderDest->nro,
                'enderdest_xcpl' => (string)$xmldata->children()->NFe->infNFe->dest->enderDest->xCpl,
                'enderdest_xbairro' => (string)$xmldata->children()->NFe->infNFe->dest->enderDest->xBairro,
                'enderdest_cmun' => (string)$xmldata->children()->NFe->infNFe->dest->enderDest->cMun,
                'enderdest_xmun' => (string)$xmldata->children()->NFe->infNFe->dest->enderDest->xMun,
                'enderdest_uf' => (string)$xmldata->children()->NFe->infNFe->dest->enderDest->UF,
                'enderdest_cep' => (string)$xmldata->children()->NFe->infNFe->dest->enderDest->CEP,
                'enderdest_cpais' => (string)$xmldata->children()->NFe->infNFe->dest->enderDest->cPais,
                'enderdest_xpais' => (string)$xmldata->children()->NFe->infNFe->dest->enderDest->xPais,
                'enderdest_fone' => (string)$xmldata->children()->NFe->infNFe->dest->enderDest->fone,

                'total_vprod' => (string)$xmldata->children()->NFe->infNFe->total->ICMSTot->vProd,

                'vol_qvol' =>  (string)$xmldata->children()->NFe->infNFe->transp->vol->qVol,
                'vol_esp' =>  (string)$xmldata->children()->NFe->infNFe->transp->vol->esp,
                'vol_marca' =>  (string)$xmldata->children()->NFe->infNFe->transp->vol->marca,
                'vol_nvol' =>  (string)$xmldata->children()->NFe->infNFe->transp->vol->nVol,
                'vol_pesol' =>  (string)$xmldata->children()->NFe->infNFe->transp->vol->pesoL,
                'vol_pesob' =>  (string)$xmldata->children()->NFe->infNFe->transp->vol->pesoB,

                'infadic_infcpl' =>  (string)$xmldata->children()->NFe->infNFe->infAdic->infCpl,

                'infprot_tpamb' =>  (string)$xmldata->children()->protNFe->infProt->tpAmb,
                'infprot_veraplic' =>  (string)$xmldata->children()->protNFe->infProt->verAplic,
                'infprot_chnfe' =>  (string)$xmldata->children()->protNFe->infProt->chNFe,
                'infprot_dhrecbto' =>  (string)$xmldata->children()->protNFe->infProt->dhRecbto,
                'infprot_nprot' =>  (string)$xmldata->children()->protNFe->infProt->nProt,
                'infprot_cstat' =>  (string)$xmldata->children()->protNFe->infProt->cStat,
                'infprot_xmotivo' =>  (string)$xmldata->children()->protNFe->infProt->xMotivo,
            ]);

            $retorno = Hnfex::createHnfex($empresa_id, $usuario_id, $data);

            if ($retorno['status']) {
                foreach ($xmldata->children()->NFe->infNFe->det as $det) {
                    $data_item = new Request();
                    $data_item->setMethod('POST');
                    $data_item->replace([
                        'prod_cprod' => (string)$det->prod->cProd,
                        'prod_cean' => (string)$det->prod->cEAN,
                        'prod_xprod' => (string)$det->prod->xProd,
                        'prod_ncm' => (string)$det->prod->NCM,
                        'prod_ex_tipi' => (string)$det->prod->EXTIPI,
                        'prod_cfop' => (string)$det->prod->CFOP,
                        'prod_ucom' => (string)$det->prod->uCom,
                        'prod_qcom' => (string)$det->prod->qCom,
                        'prod_vuncom' => (string)$det->prod->vUnCom,
                        'prod_vprod' => (string)$det->prod->vProd,
                        'prod_ceantrib' => (string)$det->prod->cEANTrib,
                        'prod_utrib' => (string)$det->prod->uTrib,
                        'prod_qtrib' => (string)$det->prod->qTrib,
                        'prod_vuntrib' => (string)$det->prod->vUnTrib,
                        'prod_vfrete' => (string)$det->prod->vFrete,
                        'prod_vseg' => (string)$det->prod->vSeg,
                        'prod_vdesc' => (string)$det->prod->vDesc,
                        'prod_voutro' => (string)$det->prod->vOutro,
                        'prod_indtot' => (string)$det->prod->indTot,
                    ]);

                    $retorno_item = Hnfei::createHnfei($retorno["obj"], $data_item);

                    if (!$retorno_item['status']) {
                        $retorno['status'] = $retorno_item['status'];
                        $retorno['mensagem'] = $retorno_item['mensagem'];
                        $retorno['excessao'] = $retorno_item['excessao'];

                        break;
                    }
                }
            }

            $status = true;
            $mensagem = "XML importado com sucesso";

            if (!$retorno['status']) {
                $status = $retorno['status'];
                $mensagem = $retorno['mensagem'];
                $excessao = $retorno['excessao'];
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            $status = false;
            $mensagem = sprintf("Ocorreu um erro inesperado Método: %s", __METHOD__);
            $excessao = $th;
        }

        return ["status" => $status, "excessao" => $excessao, "mensagem" => $mensagem];
    }
}
