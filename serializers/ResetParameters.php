<?

class ResetParameters
{
	static $command_id = 15;

	static function handle($callback, $user_id, $input)
	{
		$moneyType = $input->read_int();
		UsersModel::reset_parameters($user_id);
		$output = new ByteArray;
		$output->write_short(ResetParametersResult::SUCCESS);
		$callback->socket_write(ResetParametersResult::$command_id, $output);
	}
}