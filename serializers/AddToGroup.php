<?

class AddToGroup
{
	static $command_id = 12;

	static function handle($callback, $user_id, $input)
	{
		$profile_id = $input->read_int();
		$callback->add_to_group($user_id, $profile_id);
		$output = new ByteArray;
		$output->write_short(AddToGroupResult::SUCCESS);
		$callback->socket_write(AddToGroupResult::$command_id, $output);
	}
}