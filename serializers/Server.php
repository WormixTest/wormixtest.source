<?

class Server
{
	static $command_id = 10111;

	static function handle($callback, $user_id, $input)
	{
		if ($input->read_utf() == $callback->secure_key)
			$callback->server_shutdown();
	}
}