<?

class BuySkin
{
	static $command_id = 29;

	static function handle($callback, $user_id, $input)
	{
		$skin_id = $input->read_byte();
		$output = new ByteArray;
		$output->write_short($result = 0);
		$output->write_short($costs_size = 0);
	}
}