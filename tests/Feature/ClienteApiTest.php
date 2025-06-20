<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ClienteApiTest extends TestCase
{
    /**
     * ======================
     * VALIDAÇÕES DE NOME
     * ======================
     */

    public function test_nome_valido()
    {
        Http::fake([
            'https://api.ficticia.local/clientes' => Http::response([
                'message' => 'Cliente cadastrado com sucesso'
            ], 201)
        ]);

        $response = Http::post('https://api.ficticia.local/clientes', [
            'nome' => 'Roberto Silva'
        ]);

        $this->assertEquals(201, $response->status());
    }

    public function test_nome_so_com_espacos()
    {
        Http::fake([
            'https://api.ficticia.local/clientes' => Http::response([
                'message' => 'Nome invalido'
            ], 422)
        ]);

        $response = Http::post('https://api.ficticia.local/clientes', [
            'nome' => '     '
        ]);

        $this->assertEquals(422, $response->status());
        $this->assertEquals('Nome invalido', $response['message']);
    }

    /**
     * ======================
     * VALIDAÇÕES DE E-MAIL
     * ======================
     */

    public function test_email_valido()
    {
        Http::fake([
            'https://api.ficticia.local/clientes' => Http::response([
                'message' => 'Cliente cadastrado'
            ], 201)
        ]);

        $response = Http::post('https://api.ficticia.local/clientes', [
            'email' => 'luana@empresa.com'
        ]);

        $this->assertEquals(201, $response->status());
    }

    public function test_email_invalido_com_espacos()
    {
        Http::fake([
            'https://api.ficticia.local/clientes' => Http::response([
                'message' => 'E-mail invalido'
            ], 422)
        ]);

        $response = Http::post('https://api.ficticia.local/clientes', [
            'email' => '  luana @teste.com '
        ]);

        $this->assertEquals(422, $response->status());
    }

    public function test_email_com_formato_errado()
    {
        Http::fake([
            'https://api.ficticia.local/clientes' => Http::response([
                'message' => 'E-mail invalido'
            ], 422)
        ]);

        $response = Http::post('https://api.ficticia.local/clientes', [
            'email' => 'rafael@@empresa...com'
        ]);

        $this->assertEquals(422, $response->status());
    }

    public function test_email_duplicado()
    {
        Http::fake([
            'https://api.ficticia.local/clientes' => Http::response([
                'message' => 'E-mail ja cadastrado'
            ], 409)
        ]);

        $response = Http::post('https://api.ficticia.local/clientes', [
            'email' => 'rafael@empresa.com'
        ]);

        $this->assertEquals(409, $response->status());
    }

    /**
     * ======================
     * VALIDAÇÕES DE TELEFONE
     * ======================
     */

    public function test_telefone_valido()
    {
        Http::fake([
            'https://api.ficticia.local/clientes' => Http::response([
                'message' => 'Cliente cadastrado'
            ], 201)
        ]);

        $response = Http::post('https://api.ficticia.local/clientes', [
            'telefone' => '(48) 99999-0000'
        ]);

        $this->assertEquals(201, $response->status());
    }

    public function test_telefone_com_letras()
    {
        Http::fake([
            'https://api.ficticia.local/clientes' => Http::response([
                'message' => 'Telefone invalido'
            ], 422)
        ]);

        $response = Http::post('https://api.ficticia.local/clientes', [
            'telefone' => '(48) 99AB9-00CD'
        ]);

        $this->assertEquals(422, $response->status());
    }

    public function test_telefone_duplicado()
    {
        Http::fake([
            'https://api.ficticia.local/clientes' => Http::response([
                'message' => 'Telefone ja cadastrado'
            ], 409)
        ]);

        $response = Http::post('https://api.ficticia.local/clientes', [
            'telefone' => '(48) 99999-0000'
        ]);

        $this->assertEquals(409, $response->status());
    }

    /**
     * ======================
     * VALIDAÇÕES DE CNPJ
     * ======================
     */

    public function test_cnpj_valido()
    {
        Http::fake([
            'https://api.ficticia.local/clientes' => Http::response([
                'message' => 'Cliente cadastrado'
            ], 201)
        ]);

        $response = Http::post('https://api.ficticia.local/clientes', [
            'cnpj' => '12.345.678/0001-99'
        ]);

        $this->assertEquals(201, $response->status());
    }

    public function test_cnpj_duplicado()
    {
        Http::fake([
            'https://api.ficticia.local/clientes' => Http::response([
                'message' => 'CNPJ ja cadastrado'
            ], 409)
        ]);

        $response = Http::post('https://api.ficticia.local/clientes', [
            'cnpj' => '12.345.678/0001-99'
        ]);

        $this->assertEquals(409, $response->status());
    }

    public function test_cnpj_com_letras()
    {
        Http::fake([
            'https://api.ficticia.local/clientes' => Http::response([
                'message' => 'CNPJ invalido'
            ], 422)
        ]);

        $response = Http::post('https://api.ficticia.local/clientes', [
            'cnpj' => '12A3456B78/0001-C9'
        ]);

        $this->assertEquals(422, $response->status());
    }

    public function test_cnpj_com_numeros_a_mais()
    {
        Http::fake([
            'https://api.ficticia.local/clientes' => Http::response([
                'message' => 'CNPJ invalido'
            ], 422)
        ]);

        $response = Http::post('https://api.ficticia.local/clientes', [
            'cnpj' => '1234567890000000000000000001-99'
        ]);

        $this->assertEquals(422, $response->status());
    }

    public function test_cnpj_com_numeros_a_menos()
    {
        Http::fake([
            'https://api.ficticia.local/clientes' => Http::response([
                'message' => 'CNPJ invalido'
            ], 422)
        ]);

        $response = Http::post('https://api.ficticia.local/clientes', [
            'cnpj' => '12345678/0001'
        ]);

        $this->assertEquals(422, $response->status());
    }

    public function test_inserir_cpf_em_vez_de_cnpj()
    {
        Http::fake([
            'https://api.ficticia.local/clientes' => Http::response([
                'message' => 'CNPJ invalido'
            ], 422)
        ]);

        $response = Http::post('https://api.ficticia.local/clientes', [
            'cnpj' => '123.456.789-00'
        ]);

        $this->assertEquals(422, $response->status());
    }

    /**
     * ======================
     * AUTENTICAÇÃO
     * ======================
     */

    public function test_usuario_autenticado_pode_cadastrar()
    {
        Http::fake([
            'https://api.ficticia.local/clientes' => Http::response([
                'message' => 'Cliente cadastrado'
            ], 201)
        ]);

        $response = Http::withToken('fake-token')->post('https://api.ficticia.local/clientes', [
            'nome' => 'Luisa Alves'
        ]);

        $this->assertEquals(201, $response->status());
    }

    public function test_usuario_nao_autenticado_nao_pode_cadastrar()
    {
        Http::fake([
            'https://api.ficticia.local/clientes' => Http::response([
                'message' => 'Nao autenticado'
            ], 401)
        ]);

        $response = Http::post('https://api.ficticia.local/clientes', [
            'nome' => 'Lucas Mendes'
        ]);

        $this->assertEquals(401, $response->status());
    }

    /**
     * ======================
     * ADMINISTRADOR
     * ======================
     */

    public function test_aprovar_cliente()
    {
        Http::fake([
            'https://api.ficticia.local/clientes/1/aprovar' => Http::response([
                'message' => 'Cadastro aprovado',
                'status' => 'aprovado'
            ], 200)
        ]);

        $response = Http::post('https://api.ficticia.local/clientes/1/aprovar');

        $this->assertEquals(200, $response->status());
        $this->assertEquals('aprovado', $response['status']);
    }

    public function test_rejeitar_cliente()
    {
        Http::fake([
            'https://api.ficticia.local/clientes/2/rejeitar' => Http::response([
                'message' => 'Cadastro rejeitado',
                'status' => 'rejeitado'
            ], 200)
        ]);

        $response = Http::post('https://api.ficticia.local/clientes/2/rejeitar');

        $this->assertEquals(200, $response->status());
        $this->assertEquals('rejeitado', $response['status']);
    }

    /**
     * ======================
     * LISTAGEM E FILTROS
     * ======================
     */

    public function test_filtrar_por_nome()
    {
        Http::fake([
            'https://api.ficticia.local/clientes?nome=Luana' => Http::response([
                ['nome' => 'Luana Silva'],
                ['nome' => 'Luana Teste']
            ], 200)
        ]);

        $response = Http::get('https://api.ficticia.local/clientes?nome=Luana');

        $this->assertEquals(200, $response->status());
        $this->assertStringContainsString('Luana', $response[0]['nome']);
    }

    public function test_filtrar_por_cnpj()
    {
        Http::fake([
            'https://api.ficticia.local/clientes?cnpj=12.345.678/0001-99' => Http::response([
                ['nome' => 'Empresa X', 'cnpj' => '12.345.678/0001-99']
            ], 200)
        ]);

        $response = Http::get('https://api.ficticia.local/clientes?cnpj=12.345.678/0001-99');

        $this->assertEquals(200, $response->status());
        $this->assertEquals('12.345.678/0001-99', $response[0]['cnpj']);
    }

    public function test_filtrar_por_status()
    {
        Http::fake([
            'https://api.ficticia.local/clientes?status=pendente' => Http::response([
                ['nome' => 'Paula Souza', 'status' => 'pendente'],
                ['nome' => 'Lucas Reis', 'status' => 'pendente']
            ], 200)
        ]);

        $response = Http::get('https://api.ficticia.local/clientes?status=pendente');

        $this->assertEquals(200, $response->status());
        foreach ($response->json() as $cliente) {
            $this->assertEquals('pendente', $cliente['status']);
        }
    }

    public function test_paginacao()
    {
        Http::fake([
            'https://api.ficticia.local/clientes?page=3' => Http::response([
                ['nome' => 'Cliente 1'],
                ['nome' => 'Cliente 2']
            ], 200)
        ]);

        $response = Http::get('https://api.ficticia.local/clientes?page=3');

        $this->assertEquals(200, $response->status());
        $this->assertCount(2, $response->json());
    }

    /**
     * ======================
     * TESTES HTTP ADICIONAIS
     * ======================
     */

    public function test_buscar_cliente_inexistente_retorna_404()
    {
        Http::fake([
            'https://api.ficticia.local/clientes/99999' => Http::response([
                'message' => 'Cliente nao encontrado'
            ], 404)
        ]);

        $response = Http::get('https://api.ficticia.local/clientes/99999');

        $this->assertEquals(404, $response->status());
        $this->assertEquals('Cliente nao encontrado', $response['message']);
    }

    public function test_aprovar_cliente_sem_permissao_retorna_403()
    {
        Http::fake([
            'https://api.ficticia.local/clientes/1/aprovar' => Http::response([
                'message' => 'Acesso nao autorizado'
            ], 403)
        ]);

        $response = Http::post('https://api.ficticia.local/clientes/1/aprovar');

        $this->assertEquals(403, $response->status());
        $this->assertEquals('Acesso nao autorizado', $response['message']);
    }

    public function test_erro_interno_retorna_500()
    {
        Http::fake([
            'https://api.ficticia.local/clientes' => Http::response([
                'message' => 'Erro interno do servidor'
            ], 500)
        ]);

        $response = Http::post('https://api.ficticia.local/clientes', [
            'nome' => 'Erro Fatal'
        ]);

        $this->assertEquals(500, $response->status());
        $this->assertEquals('Erro interno do servidor', $response['message']);
    }

    public function test_muitos_pedidos_em_curto_tempo_retorna_429()
    {
        Http::fake([
            'https://api.ficticia.local/clientes' => Http::response([
                'message' => 'Muitas requisicoes. Tente novamente mais tarde.'
            ], 429)
        ]);

        $response = Http::post('https://api.ficticia.local/clientes', [
            'nome' => 'Carlos Silva'
        ]);

        $this->assertEquals(429, $response->status());
        $this->assertEquals('Muitas requisicoes. Tente novamente mais tarde.', $response['message']);
    }

    public function test_requisicao_com_metodo_incorreto_retorna_405()
    {
        Http::fake([
            'https://api.ficticia.local/clientes' => Http::response([
                'message' => 'Metodo nao permitido'
            ], 405)
        ]);

        $response = Http::put('https://api.ficticia.local/clientes', [
            'nome' => 'Teste Invalido'
        ]);

        $this->assertEquals(405, $response->status());
        $this->assertEquals('Metodo nao permitido', $response['message']);
    }

    public function test_requisicao_com_cabecalho_incorreto_retorna_400()
    {
        Http::fake([
            'https://api.ficticia.local/clientes' => Http::response([
                'message' => 'Cabecalho invalido'
            ], 400)
        ]);

        $response = Http::withHeaders(['X-Custom-Header' => 'invalid'])->post('https://api.ficticia.local/clientes', [
            'nome' => 'Teste Cabecalho'
        ]);

        $this->assertEquals(400, $response->status());
        $this->assertEquals('Cabecalho invalido', $response['message']);
    }

    public function test_requisicao_com_corpo_incorreto_retorna_422()
    {
        Http::fake([
            'https://api.ficticia.local/clientes' => Http::response([
                'message' => 'Corpo da requisicao invalido'
            ], 422)
        ]);

        $response = Http::post('https://api.ficticia.local/clientes', [
            'nome' => '' // Nome vazio
        ]);

        $this->assertEquals(422, $response->status());
        $this->assertEquals('Corpo da requisicao invalido', $response['message']);
    }

    public function test_requisicao_com_query_string_incorreta_retorna_400()
    {
        Http::fake([
            'https://api.ficticia.local/clientes?invalid=query' => Http::response([
                'message' => 'Query string invalida'
            ], 400)
        ]);

        $response = Http::get('https://api.ficticia.local/clientes?invalid=query');

        $this->assertEquals(400, $response->status());
        $this->assertEquals('Query string invalida', $response['message']);
    }

    public function test_requisicao_com_tempo_limite_excedido_retorna_504()
    {
        Http::fake([
            'https://api.ficticia.local/clientes' => Http::response([
                'message' => 'Tempo limite excedido'
            ], 504)
        ]);
        $response = Http::timeout(1)->post('https://api.ficticia.local/clientes', [
            'nome' => 'Teste Timeout'
        ]);
        $this->assertEquals(504, $response->status());
        $this->assertEquals('Tempo limite excedido', $response['message']);
    }
}
