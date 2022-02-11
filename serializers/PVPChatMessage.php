<?

class PVPChatMessage
{
	static $command_id = 17;

	static function handle($callback, $user_id, $input, $users)
	{
		foreach ($users as $user)
			if ($user->player_num != $user_id)
				$callback->socket_write(null, $input, $user->socket);
	}
}