<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use \App\User;

class UserTest extends TestCase
{
    /**
     * Testanto a tela inicial.
     *
     * @return void
     */
    public function testPaginaUsers()
    {
        //criar 3 usuarios
        $usuario = factory(User::class, 3)->create();
        $response = $this->get('/users');

        $response->assertStatus(200);
    }

    /**
     * Testanto a tela editar.
     *
     * @return void
     */
    public function testPaginaEditar()
    {
        //criar um usuario
        $usuario = factory(User::class)->create();
        $response = $this->get("/users/$usuario->id/edit");

        $response->assertStatus(200);
    }

    /**
     * usuario não existe.
     *
     * @return void
     */
    public function testPaginaNaoEditar()
    {
        //Tentar editar um usuario que não existe
        $id = 0;
        $response = $this->get("/users/$id/edit");
        $response->assertStatus(404);
    }

    /**
     * Exclusão.
     *
     * @return void
     */
    public function testApagarUsuario()
    {
        //Apagar um cadastro
        $usuario = factory(User::class)->create();
        $this->assertDatabaseHas('users', ['id' => $usuario->id]);
        $response = $this->delete("/users/$usuario->id");
        $response->assertStatus(302);
        $this->assertDatabaseMissing('users', ['id' => $usuario->id]);
    }
}
