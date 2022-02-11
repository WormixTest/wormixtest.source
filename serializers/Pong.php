<?

class Pong
{
	static $command_id = 16;

	static function handle($callback, $user_id, $input)
	{
		# не отвечать на пинг
		#return;

		$output = new ByteArray;
		$callback->socket_write(Ping::$command_id, $output);
	}
}