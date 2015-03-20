<?php
/**
 * Created by PhpStorm.
 * User: kuroro2121
 * Date: 15/3/13
 * Time: 15:38
 */

namespace Wechat2\Web\Services;


use Wechat2\Web\Models\Entities\Question as EntityQuestion;
use Wechat2\Web\Services\Exceptions\QuestionNotFoundException;

class Question {
    public function getAllQuestions()
    {
        $questions = EntityQuestion::find();
        return $questions;
    }
    public function getQuestion($id)
    {
        $question = EntityQuestion::find($id);
        if (empty($question)) {
            throw new QuestionNotFoundException();
        }
        return $question;

    }
}