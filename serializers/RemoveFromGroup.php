<?

class RemoveFromGroup
{
	static $command_id = 13;

	static function handle($callback, $user_id, $input)
	{
		$profileId = $input->read_int();
		$output = new ByteArray;
		$output->write_short(RemoveFromGroupResult::SUCCESS);
		UsersModel::remove_from_group($user_id, $profileId);
	}
}