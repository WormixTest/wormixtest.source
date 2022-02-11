<?

class GetAchievements
{
	static $command_id = 3002;

	static function handle($callback, $user_id, $input)
	{
		$profileId = $input->read_utf();
		$callback->log('profileId', $profileId);
		$callback->user_add((int)$profileId);
		$investedAwardPoints = $input->read_byte();
		$callback->log('investedAwardPoints', $investedAwardPoints);
		$version = $callback->versions[(int)$profileId];

		if (!$version)
			throw new Exception("cant detect version");
	}
}