<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Technology;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Factory|View|Application
    {
        $questions = DB::table('questions')->leftJoin('technologies', 'questions.tech_id', '=', 'technologies.id')->select('questions.*', 'technologies.name')->paginate(5);
        return view('questions.index',compact('questions'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|Application|View
     */
    public function create(): View|Factory|Application
    {
        $all_tech = (new TechnologyController)->getAll();
        return view('questions.create', compact('all_tech'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'level' => 'required',
            'tech_id' => 'required',
        ]);

        Question::create($request->all());

        return redirect()->route('questions.index')
            ->with('success','Question created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Question $question
     * @return Application|Factory|View
     */
    public function show(Question $question)
    {
        $tech = (new TechnologyController)->getById($question->tech_id);
        return view('questions.show',compact('question', 'tech'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Question $question
     * @return Application|Factory|View
     */
    public function edit(Question $question)
    {
        $current_tech = (new TechnologyController)->getById($question->tech_id);
        $all_tech = (new TechnologyController)->getAll();
        return view('questions.edit',compact('question', 'current_tech', 'all_tech'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Question $question
     * @return RedirectResponse
     */
    public function update(Request $request, Question $question)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'level' => 'required',
            'tech_id' => 'required',
        ]);

        $question->update($request->all());

        return redirect()->route('questions.index')
            ->with('success','Question updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Question $question
     * @return RedirectResponse
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('questions.index')
            ->with('success','Question deleted successfully');
    }

    public function search(Request $request): Factory|View|Application
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $questions = Question::query()
            ->where('question', 'LIKE', "%{$search}%")
            ->orWhere('answer', 'LIKE', "%{$search}%")
            ->paginate(5);

        // Return the search view with the resluts compacted
        return view('questions.search', compact('questions'));
    }
}
