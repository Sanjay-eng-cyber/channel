<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class ProjectSetup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates Required Folders';

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
     * @return int
     */
    public function handle()
    {
        Artisan::call('storage:link');
        $this->info('Storage has been linked.');
        $this->info('creating required directories.');
        Storage::disk('public')->makeDirectory('images');
        $this->line('...');
        Storage::disk('public')->makeDirectory('images/brands');
        $this->line('...');
        Storage::disk('public')->makeDirectory('images/categories');
        $this->line('...');
        Storage::disk('public')->makeDirectory('images/sub_categories');
        $this->line('...');
        Storage::disk('public')->makeDirectory('images/products');
        $this->line('...');
        Storage::disk('public')->makeDirectory('images/sliders');
        $this->line('...');
        $this->info('required directories created.');
        return 0;
    }
}
