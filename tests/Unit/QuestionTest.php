<?php

namespace Tests\Unit;

use App\Models\Question;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use http\Env\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class QuestionTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_search_query()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->get('/search', ['search' => 'Що таке посилання']);
        $response->assertStatus(200);
    }
    public function test_user_can_create_question()
    {
        $form_data = new \Illuminate\Http\Request();
        $form_data->validate([
            'question' => 'Question',
            'answer' => 'Answer',
            'level' => 'Middle',
            'tech_id' => '1',
        ]);
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->post('/questions', $form_data->all());
        $response->assertStatus(302);
    }
    public function test_user_can_see_question()
    {
        $question = DB::table('questions')->select('id')->limit(1)->get();
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->get('questions/' . $question);
        $response->assertStatus(200);
    }
}
