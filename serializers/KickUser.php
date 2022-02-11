<?

class KickUser
{
	static $command_id = 5101;

	static function handle($callback, $user_id, $input)
	{
		if ($input->read_utf() != $callback->secure_key) return;
		$user_id = $input->read_int();

		# закрываем сокет/ы
		$user_id == 0 ?
			$callback->socket_shutdown($callback->users) :
			$callback->user_del([$user_id]);
	}
}