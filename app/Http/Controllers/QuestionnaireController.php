<?php

namespace App\Http\Controllers;

use App\FilledQuestionnaire;
use App\Http\Requests\QuestionnaireRequest;
use App\Question;
use App\Questionnaire;
use App\QuestionResponses;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuestionnaireController extends Controller
{

    private function filter_unresponded($questionnaires)
    {
        return $questionnaires->filter(function ($questionnaire) {
            return $questionnaire->has_filled === false;
        });
    }

    /**
     * count the number of questionnaires user has not filled
     *
     *
     * @return Int The number of questionnaires user has not filled yet
     **/
    public function count_unfilled()
    {
        $count = $this->filter_unresponded(Questionnaire::whereIsActive(true)->get())->count();
        return response()->json([
            'message' => 'Unresponded Questionnaires',
            'data' => $count
        ], 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $response =  $this->filter_unresponded(Questionnaire::whereIsActive(true)->get());
        return response()->json([
            'message' => 'questionnaires',
            'data' => $response
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionnaireRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                foreach ($request->responses as $response) {
                    QuestionResponses::create([
                        'user_id' => Auth::user()->id,
                        'questionnaire_id' => $request->questionnaire_id,
                        'response' => $response['response'],
                        'question_id' => $response['question_id'],
                        'show_on_profile' => $response['show_on_profile'] ? $response['show_on_profile']  : false
                    ]);
                }

                FilledQuestionnaire::create([
                    'questionnaire_id' => $request->questionnaire_id,
                    'user_id' => Auth::user()->id,
                ]);
            });

            return response()->json([
                'message' => 'Successfully filled out questionnaire'
            ], 200);
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Something went wrong',
                'data' => $ex->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function show(Questionnaire $questionnaire)
    {
        //
        $questions = Question::whereQuestionnaireId($questionnaire->id)->get();
        return response()->json([
            'message' => $questionnaire->title,
            'data' => $questions
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Questionnaire $questionnaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Questionnaire $questionnaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Questionnaire $questionnaire)
    {
        //
    }
}
