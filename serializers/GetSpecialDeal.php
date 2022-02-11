<?

# запрос на получение спец. предложения
# типа скидона
class GetSpecialDeal
{
	public static $command_id = 108;

	static function handle($callback, $user_id, $input)
	{
		$callback->syslog("user $user_id GetSpecialDeal called", $input->string);

		# клиент не передает параметров

		# $output = new ByteArray;
		# $callback->socket_write(0, $output);
	}
}