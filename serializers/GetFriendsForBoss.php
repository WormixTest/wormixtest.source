<?

class GetFriendsForBoss
{
	static $command_id = 93;

	static function handle($callback, $user_id, $input)
	{
		if ($callback->versions[$user_id] > '1.11')
			$boss_ids = $input->read_short_array();
		else
			$boss_ids = [$input->read_short()];

		$online_friends = $callback->get_online_friends($input);
		return $online_friends;
	}
}