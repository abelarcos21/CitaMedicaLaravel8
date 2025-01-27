<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Especialidad;

class EspecialidadesTest extends TestCase
{

    use RefreshDatabase; 

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_see_all_especialidades()
    {
        $this->withoutExceptionHandling();

        $especialidad = Especialidad::create([

            'nombre' => 'dermatologiasasa',
            'descripcion' => 'enfermedad de curas'

        ]);

        $especialidad2 = Especialidad::create([

            'nombre' => 'dermatologiasasa',
            'descripcion' => 'enfermedad de curas'

        ]);

        $response = $this->get(route('index'));

        $response->assertStatus(200);

        $response->assertViewIs('especialidades.index');

        $response->assertViewHas('especialidades');

        $response->assertSee($especialidad->nombre);
        $response->assertSee($especialidad->descripcion);

        $response->assertSee($especialidad2->nombre);
        $response->assertSee($especialidad2->descripcion);
    }

    public function test_can_see_individual_especialidades(){

        $especialidad = Especialidad::create([
            'nombre' => 'Dermatologia',
            'descripcion' => 'enfermedad de curas'
        ]);

        $response = $this->get(route('show', $especialidad));
        $response->assertSee($especialidad->nombre);
    }
}
