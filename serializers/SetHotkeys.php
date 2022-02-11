<?

class SetHotkeys
{
	public static $command_id = 104;

	static function handle($callback, $user_id, $input)
	{
		$hotkeys = $input->read_short_array();
		UsersModel::set_hotkeys($user_id, $hotkeys);
	}

}