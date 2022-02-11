<?

class GetRating
{
	static $command_id = 19;

	static function handle($callback, $user_id, $input)
	{
		$callback->syslog("user $user_id GetRating called", $input->string);

		$ratingType = $input->read_short();
		$callback->log('ratingType', $ratingType);
		$battleWager = $input->read_short();
		$callback->log('battleWager', $battleWager);
	}
}