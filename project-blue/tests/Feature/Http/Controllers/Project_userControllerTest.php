<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\ProjectUser;
use App\Models\Project_user;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Project_userController
 */
final class Project_userControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $projectUsers = Project_user::factory()->count(3)->create();

        $response = $this->get(route('project_users.index'));

        $response->assertOk();
        $response->assertViewIs('projectUser.index');
        $response->assertViewHas('projectUsers');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('project_users.create'));

        $response->assertOk();
        $response->assertViewIs('projectUser.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Project_userController::class,
            'store',
            \App\Http\Requests\Project_userStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('project_users.store'));

        $response->assertRedirect(route('projectUsers.index'));
        $response->assertSessionHas('projectUser.id', $projectUser->id);

        $this->assertDatabaseHas(projectUsers, [ /* ... */ ]);
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $projectUser = Project_user::factory()->create();

        $response = $this->get(route('project_users.edit', $projectUser));

        $response->assertOk();
        $response->assertViewIs('projectUser.edit');
        $response->assertViewHas('projectUser');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Project_userController::class,
            'update',
            \App\Http\Requests\Project_userUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $projectUser = Project_user::factory()->create();

        $response = $this->put(route('project_users.update', $projectUser));

        $projectUser->refresh();

        $response->assertRedirect(route('projectUsers.index'));
        $response->assertSessionHas('projectUser.id', $projectUser->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $projectUser = Project_user::factory()->create();
        $projectUser = ProjectUser::factory()->create();

        $response = $this->delete(route('project_users.destroy', $projectUser));

        $response->assertRedirect(route('projectUsers.index'));

        $this->assertModelMissing($projectUser);
    }
}
