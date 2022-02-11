<?

class GetProfiles
{
	static $command_id = 5;

	static function handle($callback, $user_id, $input)
	{
		$session_key = $input->read_utf();
		$size = $input->read_short();
		$ids = [];

		while ($size--)
			$ids[] = $input->read_utf();

		$output = new ByteArray;
		$output->write_short(count($ids));

		foreach ($ids as $id)
			$logins[] = UsersModel::get_user($id, true);

		return $logins;
	}
}