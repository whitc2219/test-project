<?php

namespace App\Console\Commands;

use App\Company;
use Illuminate\Console\Command;

class AddCompanyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contact:company';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new company';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $name = $this->ask('What is the company name?');
        $phone = $this->ask('What is the company phone?');


        //$this->info($name);
        if ($this->confirm('Are you ready to inert? "' . $name . '"?')) {

                 $company = Company::create([
                 'name' => $name,
                 'phone' => $phone,
             ]);

             $this->info('Added' . $company->name);
        }

        $this->warn('No Co Added');


    }
}
