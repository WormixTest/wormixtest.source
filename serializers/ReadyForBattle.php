<?

class ReadyForBattle
{
	static $command_id = 1023;

	static function handle($callback, $user_id, $input)
	{
		$battle_id = $input->read_int();
		$users = $callback->battles[$battle_id]->users;
		$callback->log("user $user_id ready for battle");

		foreach ($users as $user)
			if ($user->user_id == $user_id)
			{
				$callback->socket_write
				(
					StartPVPBattle::$command_id,
					$battle_id,
					$user->socket
				);
			}
	}
}