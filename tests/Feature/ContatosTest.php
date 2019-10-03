<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Contato;

class ContatosTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Testanto a tela inicial.
     *
     * @return void
     */
    public function testPaginaInicial()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

     /**
     * Testanto a tela inicial.
     *
     * @return void
     */
    public function testPaginaContatos()
    {
        //criar 3 contatos
        $contato = factory(Contato::class, 3)->create();
        $response = $this->get('/contatos');

        $response->assertStatus(200);
    }

    /**
     * Testanto a tela editar.
     *
     * @return void
     */
    public function testPaginaEditar()
    {
        //criar um contato
        $contato = factory(Contato::class)->create();
        $response = $this->get("/contatos/$contato->id/edit");

        $response->assertStatus(200);
    }

    /**
     * Testanto a tela editar quando o contato não existe.
     *
     * @return void
     */
    public function testNaoPaginaEditar()
    {
        //Tentar editar um contato que não existe
        $id=0;
        $response = $this->get("/contatos/$id/edit");

        $response->assertStatus(404);
    }

    /**
     * Testanto a a função de exclusão.
     *
     * @return void
     */
    public function testApagarContato()
    {
        //Tentar apagar um contato
        $contato = factory(Contato::class)->create();
        $this->assertDatabaseHas('contatos', ['id' => $contato->id]);
        $response = $this->delete("/contatos/$contato->id");
        $response->assertStatus(302);
        $this->assertDatabaseMissing('contatos', ['id' => $contato->id]);
    }
}
