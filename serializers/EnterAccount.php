<?

class EnterAccount
{
	static $command_id = 10001;

	static function serialize($callback, $output, $user)
	{
		UserProfile::serialize($output, $user);
		$callback->login($output);
	}
}