<?

class PVPActionEx
{
	static $command_id = 1007;

	static function handle($callback, $user_id, $input)
	{
		$battle = $callback->battles[$battle_id];
		$users = $battle->users;

		foreach ($users as $user)
		{
			try
			{
				if ($user->user_id != $user_id)
					$callback->socket_write(null, $input, $user->socket);
				else
					$user->end_turn = true;
			}
			catch (Exception $e)
			{
				$pseudoinput = new ByteArray;
				$pseudoinput->write_byte($user->playerNum);
				$pseudoinput->write_byte($user->battleId);
				$pseudoinput->write_short($user->type);

				PVPDropPlayer::handle($callback, $user->user_id, $pseudoinput);
			}
		}
	}
}