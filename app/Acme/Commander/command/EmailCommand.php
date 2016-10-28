<?php

namespace Acme\Commander\command;

use Acme\Commander\command\commandInterface;

use Illuminate\Mail\Mailer;


class EmailCommand implements commandInterface
{


	function __construct()
	{
		//$this->mail = $mail;
	}

	public function handle()
	{
		\Log::info('email send from emailcommander new one');
	}
}