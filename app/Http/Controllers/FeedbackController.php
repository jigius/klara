<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFeedbackRequest;
use App\Jobs\ProcessFeedback;
use App\Models\Feedback;
use Illuminate\Contracts\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Http;
use Illuminate\Routing;

/**
 * Implements a controller is used for the interaction with feedback page
 */
final class FeedbackController extends Controller
{
    /**
     * @return View\View
     */
    public function index(): View\View
    {
        return view('feedback');
    }

    /**
     * @param CreateFeedbackRequest $request
     * @return Http\RedirectResponse|Routing\Redirector
     */
    public function create(CreateFeedbackRequest $request): Http\RedirectResponse|Routing\Redirector
    {
        $validated = $request->safe()->only(['email', 'message']);
        $feedback = Feedback::create([
            'email' => $validated['email'],
            'message' => $validated['message'],
        ]);
        dispatch(new ProcessFeedback($feedback));
        Session::flash('farewell', trans("feedback.farewell"));
        return redirect('/feedback');
    }
}
