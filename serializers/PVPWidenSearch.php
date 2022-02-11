<?

class PVPWidenSearch
{
	static $command_id = 1008;

	static function handle($callback, $user_id1, $input = null)
	{
		if (count($callback->profiles) < 2)
			return;

		$users = $callback->profiles[$user_id1];
		self::createBattle($callback, $users);
	}

	function createBattle($callback, $users, $mainUser)
	{
		$battle = new stdClass;

		if ($mainUser->battle_id)
			$battle->battle_id = $mainUser->battle_id;
		else
			$battle->battle_id = ++$callback->battle_id;

		$callback->log("current battle id: $battle->battle_id");
		shuffle_assoc($users);

		if (count($mainUser->mission_ids) == 2)
			$battle->boss_team_count = 2;
		else
			foreach ($mainUser->mission_ids as $mission_id)
				if (isset($cooperative_bosses_teams[$mission_id]))
					$battle->boss_team_count += $cooperative_bosses_teams[$mission_id];

		$output = new ByteArray;

		$output->write_short($battle->battle_type);
		$output->write_int($battle->battle_id);
		$output->write_short($battle->wager);

		foreach ($users as $user)
		{
			$user->player_num = $player_num++;
			$user->team_num = $team_num++;
			$user->battle_id = $battle->battle_id;
			$user->turn_num = 1;
			$callback->log("player_num: $user->player_num, user_id: $user->user_id");
			PVPProfile::serialize($output, $user);
		}

		$output->write_int($seed = 213);
		$output->write_short($reagent_size = 0);

		if ($user->version >= '1.32')
			$output->write_short($questId = 0);

		reset($users);

		$battle->users = $users;
		$callback->battles[$battle->battle_id] = $battle;
		$callback->log("players connected");
		return $battle;
	}
}