<?

# используется в 1.4-1.7
# неизвестно про 1.8.-1.9
# в 1.10 уже используется новая
class Arena
{
	public static $command_id = 4;

	static function handle($callback, $user_id, $input)
	{
		if ($callback->versions[$user_id] >= '1.07')
			$returnUserProfiles = $input->read_bool();

		$output = new ByteArray;
		$output->write_short($userProfilesCount = 0);

		$battles_count = UsersModel::get_battles($user_id);

		$output->write_int($battles_count);
		$bossAvailable = true;
		$output->write_bool($bossAvailable);
	}
}