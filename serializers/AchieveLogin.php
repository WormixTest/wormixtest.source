<?

class AchieveLogin
{
	static $command_id = 3001;

	static function handle($callback, $user_id, $input)
	{
		$callback->log('dectected version:', $version);
		$callback->versions[$id] = $version;
		$callback->user_add($id);

		$authKey = $input->read_utf();
		$callback->log('authKey', $authKey);
		$sendAchievements = $input->read_bool();
		$callback->log('sendAchievements', $sendAchievements);
	}
}