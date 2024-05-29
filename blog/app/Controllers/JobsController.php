<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JobsModel;
use CodeIgniter\CLI\CLI;

class JobsController extends BaseController
{
    const STATUS_DONE = 'done';
    const STATUS_QUEUED = 'queued';
    const STATUS_RUNNING = 'running';

    public function message($to)
    {
        // for testing cd /var/www/html
        // run => php index.php jobs message "Args"
        CLI::write("Processing job id: " . CLI::color("2", 'yellow'));
        echo "Hello $to!" . PHP_EOL;
    }

    public function listen()
    {
        $model = new JobsModel();

        $job = $model->select('id,name,payload')
            ->where('status', self::STATUS_QUEUED)
            ->orderBy('created_at', 'ASC')
            ->first();

        if (isset($job)) {
            CLI::write("Processing job id: " . CLI::color($job['id'], 'yellow'));
        } else {
            exit('No Queued Job Found to Run');
        }

        if (!method_exists($this, $job['name'])) {
            exit('Job: ' . $job['name'] . ' not found');
        }

        $response = "Failed while started";

        try {
            $start = microtime(true);
            $runtime = null;
            $model->update($job['id'], ['status' => self::STATUS_RUNNING]);
            $jobHandler = [$this, $job['name']];
            $payload = json_decode($job['payload'], true);
            if (!is_array($payload)) {
                exit('Invalid payload format');
            }
            $payload = is_array($payload) ? $payload : [];
            $response = $jobHandler($payload);
            $runtime = microtime(true) - $start;
        } catch (\Throwable $th) {
            $runtime = $runtime === null ?  microtime(true) - $start : $runtime;
            $response = $th->getMessage(); //throw $th;
        }

        $model->update($job['id'], [
            'status' => self::STATUS_DONE,
            'run_time' => $runtime,
            'response' => $response
        ]);

        CLI::write("Job id: " . CLI::color($job['id'], 'yellow') . " is completed");
    }


    public function customEmail(array $payload): array
    {
        if (!isset($payload['to'])) {
            exit('Invalid to');
        }

        if (!isset($payload['subject'])) {
            exit('Invalid subject');
        }

        if (!isset($payload['message'])) {
            exit('Invalid message');
        }

        $attachment = null;

        if (isset($payload['attachment']) && file_exists($payload['attachment'][0])) {
            $attachment = $payload['attachment'];
        }

        $sent = (int) $this->sendEmail([
            'to' => $payload['to'],
            'subject' => $payload['subject'],
            'message' => $payload['message']
        ], $attachment);

        if (file_exists($attachment[0])) {
            unlink($attachment[0]);
        }

        return ['sent' => "$sent"];
    }

    public function sendEmail($info, $attachment = null)
    {
        // $client = new \Google_Client([
        //     'client_id' => env('google_client_id'),
        //     'client_secret' => env('google_client_secret')
        // ]);
        $email = \Config\Services::email();
        $email->setFrom(env('SMTP_USER'), "hksamacar");
        $email->setTo($info['to']);
        $email->setSubject($info['subject']);
        $email->setMessage($info['message']);
        if (isset($attachment)) {
            $email->attach(...$attachment);
        }
        return $email->send();
    }
}
