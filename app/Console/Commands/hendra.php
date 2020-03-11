<?php
 
namespace App\Console\Commands;
 
use Illuminate\Console\Command;
 
class hendra extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checksite {url : URL Website yang ini dicek}';
 
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cek HTTP Status dari sebuah URL.';
 
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
        $ch = curl_init($this->argument('url'));
        curl_setopt($ch, CURLOPT_HEADER, true);    // we want headers
        curl_setopt($ch, CURLOPT_NOBODY, true);    // we don't need body
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_TIMEOUT,10);
        curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
 
        $this->info('HTTP code: ' . $httpcode);
    }
}