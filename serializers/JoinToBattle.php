<?

class JoinToBattle
{
	static $command_id = 1002;

	static function handle($callback, $user_id, $input)
	{
		$user->battle_type = null;
		$user->wagers = null;
		$user->mission_ids = null;
		$user->socket = $callback->cur_socket;
		PVPWidenSearch::handle($callback, $user_id);
	}
}