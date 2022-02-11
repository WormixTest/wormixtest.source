<?

class SetBackpackConf
{
	static $command_id = 103;

	static function handle($callback, $user_id, $input)
	{
		$backpack = $input->read_short_array();
		$callback->log('Backpack Conf1:', $backpack);
		UsersModel::set_backpack($user_id, $backpack);
	}
}