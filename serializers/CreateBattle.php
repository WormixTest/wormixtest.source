<?

class CreateBattle
{
	static $command_id = 1001;

	static function handle($callback, $user_id, $input)
	{
		global $main;
		$user_id = $input->read_int();
		$version = $main->versions[$user_id];
		$subversion = $main->subversions[$user_id];

		if (!$version)
			throw new Exception("version not found for user $user_id");

		if (!$subversion)
			throw new Exception("subversion not found for user $user_id");

		$callback->versions[$user_id] = $version;
		$callback->subversions[$user_id] = $subversion;
		$callback->user_add($user_id);
	}
}