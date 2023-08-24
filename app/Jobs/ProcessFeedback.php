<?php

namespace App\Jobs;

use App\Local\OutdoorServiceInterface;
use App\Models;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Implements the job is used for the interaction with outdoor services
 */
final class ProcessFeedback implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Models\Feedback
     */
    private Models\Feedback $feedback;

    /**
     * Create a new job instance.
     */
    public function __construct(Models\Feedback $feedback)
    {
        $this->feedback = $feedback;
    }

    /**
     * Execute the job.
     */
    public function handle(OutdoorServiceInterface $service): void
    {
        $service
            ->process(
                $this->feedback->getAttribute("email"),
                $this->feedback->getAttribute("message")
            );
    }
}
