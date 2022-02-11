<?

class ServerMessage
{
	static $command_id = 10011;

	static function handle($callback, $user_id, $input)
	{
		$callback->log('called ServerMessage!');
		$msg = $input->read_utf();

		$sockets = $user_id ?
			[$callback->get_socket($user_id)] :
			$callback->sockets;

		$callback->socket_write
		(
			self::$command_id,
			$msg,
			$sockets
		);
	}
}