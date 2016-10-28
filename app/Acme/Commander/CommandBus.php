<?php

namespace Acme\Commander;

use Acme\Commander\commandTranslator;

use Acme\Commander\command\commandInterface;

use Illuminate\Foundation\Application;


class CommandBus
{
	protected $translator;

	protected $command;

	protected $mail;


	function __construct(commandTranslator $translator,Application $app)
	{
		$this->translator=$translator;
		
		$this->app=$app;
	}

	public function execute(commandInterface $command)
	{
		$command=$this->translator->translate($command);

		$this->app->make($command)->handle();
	}
}