<?php

namespace Step\Http;

class Response
{
	protected $content;

	function __construct($content)
	{
		$this->content = $content;
	}

    public function send()
    {
       echo $this->content;
    }
}