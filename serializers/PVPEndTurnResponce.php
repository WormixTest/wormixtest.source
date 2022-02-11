<?

class PVPEndTurnResponce
{
	static $command_id = 1017;

	static function handle($callback, $user_id, $input)
	{
		while ($items_length-- > 0)
		{
			$input->read_short();
			$weapon_id = $input->read_int();
			$value = $input->read_int();
			$weapons[$weapon_id] = $value;
		}

		$battle_state = $input->read_int();
		$battle = $callback->get_battle($battle_state);

		if ($battle->boss_team_count == count($battle->boss_eleminated))
		{
			$callback->log("boss loose! WIN!");
			$output = PVPEndBattle::magic_win($input);

			foreach ($battle->users as $user)
				$callback->ssocket_write($end_battle_command = 1021, $output, $user->socket);

			unset($callback->battles[$battle_id]);
			return;
		}
	}
}