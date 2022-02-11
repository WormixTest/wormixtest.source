<?

/* Отмена боя */
class CancelBattle
{
	static $command_id = 1004;

	static function handle($callback, $user_id, $input)
	{
		global $main;
		$battle_id = $input->read_int(); # при обычной отмене 1
		$error = $input->read_short(); # при обычной отмене 0

		$output = new ByteArray;

		$output->write_int($battle_id);
		$output->write_int($refuser_id = $user_id);
		$output->write_byte($social_network_id = 1);
		$output->write_short(CallToBattleResult::CANCELED);
	}
}