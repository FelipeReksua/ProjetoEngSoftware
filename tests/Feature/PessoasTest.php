<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use \App\Pessoa;

class PessoasTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Tela inicial.
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
    public function testPaginaRanking()
    {
        //criar 3 pessoas
        $pessoa = factory(Pessoa::class, 3)->create();
        $response = $this->get('/ranking');

        $response->assertStatus(200);
    }

    /**
     * Testanto a tela editar.
     *
     * @return void
     */
    public function testPaginaEditar()
    {
        //criar um pessoa
        $pessoa = factory(Pessoa::class)->create();
        $response = $this->get("/ranking/$pessoa->id/edit");

        $response->assertStatus(200);
    }

    /**
     * Pessoa não existe.
     *
     * @return void
     */
    public function testPaginaNaoEditar()
    {
        //Tentar editar um pessoa que não existe
        $id = 0;
        $response = $this->get("/ranking/$id/edit");
        $response->assertStatus(404);
    }

    /**
     * Exclusão.
     *
     * @return void
     */
    public function testApagarPessoa()
    {
        //Apagar um cadastro
        $pessoa = factory(Pessoa::class)->create();
        $this->assertDatabaseHas('pessoas', ['id' => $pessoa->id]);
        $response = $this->delete("/ranking/$pessoa->id");
        $response->assertStatus(302);
        $this->assertDatabaseMissing('pessoas', ['id' => $pessoa->id]);
    }
}
