<?php

namespace App\Http\Controllers\Tweet\update;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweet\UpdateRequest;
use App\Models\Tweet;
use App\Service\TweetService;
use Illuminate\Http\Request;
use Symfony\Component\Finder\Exception\AccessDeniedException;

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, TweetService $tweetService)
    {
        if (!$tweetService->checkOwnTweet($request->user()->id, $$request->id())) {
            throw new AccessDeniedException();
        }
        $tweet = Tweet::where('id', $request->id())->firstOrFail();
        $tweet->content = $request->tweet();
        $tweet->save();
        return redirect()->route('tweet.update.index', ['tweetId' => $tweet->id])->with('feedback.success', "つぶやきを編集しました");
    }
}
