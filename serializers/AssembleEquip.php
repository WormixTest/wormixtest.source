<?

# крафт шапок и артефактов
class AssembleEquip
{
	static $command_id = 99;

	static function handle($callback, $user_id, $input)
	{
		$family_id = $input->read_short();
		$money_type = $input->read_short();

		$output = new ByteArray;
		$output->write_short($equip_id);
		$output->write_short($family_id);
		$output->write_short($result = 0);
		$output->write_utf(md5($user_id));
	}

}