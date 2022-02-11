<?

class PVPEndTurn
{
	static $command_id = 1014;

	static function handle($callback, $user_id, $input, $users)
	{
		while ($items_length-- > 0)
		{
			$input->read_short();
			$weapon_id = $input->read_int();
			$value = $input->read_int();
			$weapons[$weapon_id] = $value;
		}

		$battle_state = $input->read_int();
		$forced = $input->read_bool();
		$ban_type = $input->read_short();
		$ban_note = $input->read_utf();

		foreach ($users as $user)
			if ($user->user_id != $user_id)
				$callback->pvp_send($user);
	}
}