<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function user_can_create_a_project()
    {
        $this->withoutExceptionHandling();
        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph
        ];
        $this->post('/projects', $attributes)->assertRedirect('/projects');

        $this->get('/projects')->assertSee($attributes['title']);
        $this->assertDatabaseHas('projects', $attributes);
    }

    /** @test */
    public function a_project_require_a_title()
    {
        $attributes = factory('App\Project')->raw(['title' => '']);
        $this->post('/projects', $attributes )->assertSessionHasErrors('title');
    }
    /** @test */
    public function a_project_require_a_description()
    {
        $attributes = factory('App\Project')->raw(['description' => '']);
        $this->post('/projects', $attributes)->assertSessionHasErrors('description');
    }
    /** @test */
    public function a_user_can_view_a_project()
    {
        $this->withoutExceptionHandling();
        $project = factory('App\Project')->create();
        $this->get('/projects/' . $project->id)
            ->assertSee($project->title)
            ->assertSee($project->description);
    }

}
