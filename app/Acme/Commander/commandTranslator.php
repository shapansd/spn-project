<?php

namespace Acme\Commander;


class CommandTranslator
{
	protected $command;
	
	public function translate($command)
	{
		return get_class($command);
	}
}