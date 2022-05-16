<?php

namespace App\Console\Commands;

use App\Exports\ScamPhoneExport;
use Illuminate\Console\Command;
use App\ScammerPhone;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class ExportScamPhoneDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export Scam phone daily and send xls file in mail to user';

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
        /*$filename = time()."_scam_number.xlsx";
        //return Excel::download(new ScamPhoneExport($formData), $filename);
        $formData['frequency'] = 'today';
        $attachment = Excel::store(new ScamPhoneExport($formData), $filename);
        // send email functionality
        $filePath = storage_path("app/".$filename);
        $data["email"]="shyamvinayp85@gmail.com";
        $data["client_name"]="test client";
        $data["subject"]="test email with scammer phone attachment";

        //$pdf = PDF::loadView('test', $data);

        // $data = array('name'=>"byte and bits");

        Mail::send('emails.sendMail', $data, function($message) use($data, $attachment, $filename) {

            $message->to($data["email"], $data["client_name"])
                ->subject($data["subject"]);
            $message->attachData($attachment,$filename);
        });*/

        Log::info("Cron is working fine!");
        $this->exportAndSendToUser();
            //return 0;
    }

    public function exportAndSendToUser()
    {
        return redirect()->action('ScamsController@exportScamPhoneApiCall');
    }

}
