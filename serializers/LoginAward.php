<?

class LoginAward
{

	static function deserialize($input, $version)
	{
		$r = new LoginAward;
		# опять непонятные пустые байты в никуда
		$input->read_short();
		$r->award_type = $input->read_short();
		$size = $input->read_short();
		$r->attach = $input->read_utf();
		return $r;
	}

	static function serialize($output, $res, $version)
	{
		# опять непонятные пустые байты в никуда
		$output->write_short(0);
		$output->write_short($res->award_type);
		$output->write_short($size = count($res->awards));
	}
}