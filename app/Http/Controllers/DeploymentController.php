<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeploymentController extends Controller
{
	public function deploy(Request $request)
	{
		$signature = $request->header('X-Hub-Signature');
		$payload = file_get_contents('php://input');
		if ($this->isFromGithub($payload, $signature)) {
            shell_exec('sh /data/www/shell/dota2_laravel/github_webhook.sh');
			http_response_code(200);
		} else {
			abort(403);
		}
	}

	private function isFromGithub($payload, $signature)
	{
		return 'sha1=' . hash_hmac('sha1', $payload, env('GITHUB_DEPLOY_TOKEN'), false) === $signature;
	}
}

