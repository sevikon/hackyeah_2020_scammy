<?php

namespace App\Console\Commands;

use App\Services\Keyword\CheckKeywordService;
use Illuminate\Console\Command;

class KeywordCheckCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'keywords:check';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Link Checker - check for anchor and url for articles';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $keyword = 'apartamenty inwestycyjne';
//        CheckKeywordService::generate_report($keyword);
        CheckKeywordService::analyze_results();
    }
}
