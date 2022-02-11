<?

class EndBattleResult
{
	static $command_id = 10121;

	static function serialize($result, $battleId, $missionId, $sessionKey)
	{
		$output = new ByteArray;
		$output->write_int($result);
		$output->write_int($battleId);
		$output->write_short($missionId);
		$output->write_utf($sessionKey);
	}
}