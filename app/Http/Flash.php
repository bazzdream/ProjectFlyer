<?php

namespace App\Http;

class Flash {

	public function message($title, $message, $level, $key = 'flash_message')
	{
		session()->flash($key, [
			'title' => $title,
			'message' => $message,
			'level' => $level
		]);
	}

	public function info($title, $message)
	{
		return $this->message($title, $message, 'info');
	}

	public function overlay($title, $message, $level = 'success', $key = 'flash_message_overlay')
	{
		return $this->message($title, $message, $level, $key);
	}

	public function __call($level, $args)
	{
		return $this->message($args[0], $args[1], $level);
	}

}