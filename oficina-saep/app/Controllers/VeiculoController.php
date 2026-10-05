<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ClienteModel;
use App\Models\VeiculoModel;

// Vincula o veiculo com seu respectivo cliente (FK_CLI_ID)
class VeiculoController extends BaseController
{
    // Exibe a listagem de veiculo
    public function index()
    {
        // Instancia o Model de veiculo
        $model = new VeiculoModel();

        // Verifica se o formulário de pesquisa foi enviado
        if ($this->request->getPost('botao_pesquisar')) {

            // Recupera o texto digitado pelo usuário
            $pesquisar = $this->request->getPost('pesquisar');

            // Busca os veiculos juntamente com o nome do cliente
            // responsável por cada veiculo
            $dados['veiculo'] = $model
                ->select('VEICULO.*, CLIENTE.CLI_NOME')

                // Relaciona veiculo com cliente pela chave estrangeira
                ->join(
                    'CLIENTE',
                    'CLIENTE.CLI_ID = VEICULO.FK_CLI_ID'
                )

                // Agrupa as condições da pesquisa
                ->groupStart()

                    // Pesquisa pelo nome
                    ->like('VEI_NOME', $pesquisar)

                    // Pesquisa pela data de fabricao
                    ->orLike('VEI_DATA_FABRICACAO', $pesquisar)

                    // Também permite pesquisar pelo nome do cliente
                    ->orLike('CLIENTE.CLI_NOME', $pesquisar)

                ->groupEnd()

                // Executa a consulta
                ->findAll();
        }
        else {

            // Caso não exista pesquisa, busca todos os veiculos
            // juntamente com o nome dos respectivos responsaveis
            $dados['veiculo'] = $model
                ->select('VEICULO.*, CLIENTE.CLI_NOME')
                ->join(
                    'CLIENTE',
                    'CLIENTE.CLI_ID = VEICULO.FK_CLI_ID'
                )
                ->findAll();
        }

        // Carrega a View de veiculo
        return view('sistema/veiculo/index', $dados);
    }


    // Exibe o formulário para cadastrar um novo veiculo
    public function novo()
    {
        // Instancia o Model de cliente
        $clienteModel = new ClienteModel();

        // Busca todos os cliente cadastrados
        // Esses dados serão utilizados em um campo SELECT
        $dados['cliente'] = $clienteModel->findAll();

        // Carrega o formulário de cadastro do veículo
        return view('sistema/veiculo/novo_veiculo', $dados);
    }


    // Insere um novo veiculo
    public function inserir()
    {
        // Instancia o Model de veiculo
        $model = new VeiculoModel();

        // Recupera os dados enviados pelo formulário
        $dados = [
            'VEI_NOME' => $this->request->getPost('nome'),
            'VEI_DATA_FABRICACAO' => $this->request->getPost('data_fabricacao'),

            // Guarda o ID do cliente escolhido no formulário
            // como chave estrangeira do veiculo
            'FK_CLI_ID' => $this->request->getPost('cliente')
        ];

        // Insere o veiculo no banco
        $model->insert($dados);

        // Redireciona para a listagem
        return redirect()
            ->to(base_url('veiculo'))
            ->with('success', 'veiculo cadastrado com sucesso!');
    }


    // Exibe o formulário de edição
    public function editar($id)
    {
        // Instancia o Model de veiculo
        $veiculoModel = new VeiculoModel();

        // Instancia o Model de cliente
        $clienteModel = new ClienteModel();

        // Busca o veiculo que será editado
        $dados['veiculo'] = $veiculoModel->find($id);

        // Busca todos os responsáveis para preencher o SELECT
        $dados['cliente'] = $clienteModel->findAll();

        // Carrega a View de edição
        return view('sistema/veiculo/editar_veiculo', $dados);
    }


    // Atualiza um veiculo
    public function atualizar($id)
    {
        // Instancia o Model
        $model = new VeiculoModel();

        // Recupera os novos dados do formulário
        $dados = [
            'VEI_NOME' => $this->request->getPost('nome'),
            'VEI_DATA_FABRICACAO' => $this->request->getPost('data_fabricacao'),

            // Guarda o ID do cliente escolhido no formulário
            // como chave estrangeira do veiculo
            'FK_CLI_ID' => $this->request->getPost('cliente')
        ];

        // Atualiza o veiculo pelo ID
        $model->update($id, $dados);

        // Redireciona para a listagem
        return redirect()
            ->to(base_url('veiculo'))
            ->with('success', 'Veiculo atualizado com sucesso!');
    }


    // Exclui um veiculo
    public function excluir($id)
    {
        // Instancia o Model
        $model = new VeiculoModel();

        // Exclui o veículo pelo ID
        $model->delete($id);

        // Redireciona para a listagem
        return redirect()
            ->to(base_url('veiculo'))
            ->with('success', 'Veiculo excluído com sucesso!');
    }
}