<?

class PVPSystemMessage
{
	static $command_id = 2021;

	const UNDEFINED = -1;
	const DROPPED_BY_RECONNECTION_TIMEOUT = 1;
	const DROPPED_BY_COMMAND_TIMEOUT = 2;
	const DROPPED_BY_RESPONSE_TIMEOUT = 3;
	const SURRENDERED = 4;
	const CHEATER = 5;
	const DISCONNECTED = 6;
	const RECONNECTED = 7;
	const PLAYER_LONG_TIME_TURN = 8;
	const BATTLE_NOT_EXIST = 9;
	const PLAYER_NOT_FOUND_IN_BATTLE = 10;
	const PLAYER_JOINED_TO_BATTLE = 11;
	const PLAYER_REPEATED_COMMAND = 12;
	const PLAYER_SKIPPED_COMMAND = 14;

	static function serialize($output, $type, $player_num)
	{
		$output->write_short($type);
		$output->write_byte($player_num);
	}
}