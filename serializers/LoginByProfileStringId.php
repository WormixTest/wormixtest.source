<?

class LoginByProfileStringId
{
	static $command_id = 20;

	static function handle($callback, $user_id, $input)
	{
		$res = new Login;
		$res->friends = [];
		$res->version = '';

		$res->user_id = $input->read_utf();
		$res->referrer_id = $input->read_utf();
		$res->auth_key = $input->read_utf();
		$res->version = $input->read_int();
		$res->friends = [];

		$length = $input->read_short();
		$callback->log("count friends $length");

		for ($i = 0; $i < $length; $i++)
			$res->friends[] = $input->read_utf();

		$callback->socket_write(UserIsBanned::$command_id, $output);
	}
}