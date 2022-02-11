<?

class Login
{
	const WRONG_KEY = 1;
	const ALREADY_IN_GAME = 2;
	const INTERNAL_SERVER_ERROR = 3;
	const BAN = 4;
	const PROTOCOL_CHEAT = 32;

	static $command_id = 1;

	static function handle($callback, $user_id, $input)
	{
		Login::deserialize($input);

		if (!@$callback->isNotify[$user->user_id])
		{
			$callback->isNotify[$user->user_id] = true;

			$msg = "Внимание! Сейчас тест предоставляется бесплатно до августа, если будет набран онлайн 100+, то тест продолжит быть бесплатным, хотите чтобы так было всегда - позовите друзей!";

			$output = new ByteArray;
			$output->write_utf($msg);

			$callback->socket_write(ServerMessage::$command_id, $output);

			if ($callback->versions[$user->user_id] != '1.26')
			{
				$msg = "Внимание! Ваша версия не 1.26, поэтому могут возникунуть баги. Самая стабильная версия для Single + PVP - 1.26";

				$output = new ByteArray;
				$output->write_utf($msg);

				$callback->socket_write(ServerMessage::$command_id, $output);
			}
		}
	}

	static function deserialize($input, $version = null)
	{
		global $main;

		$res = new Login;
		$res->friends = [];
		$res->version = '';

		$res->user_id = $input->read_int();
		$res->referrer_id = $input->read_int();
		#echo "referrer_id: $res->referrer_id\n";
		$res->auth_key = $input->read_utf();

		# 1.5 - 1.7 не отправляет версию, что нехорошо! Непонятно как реализовать такую штуку, поэтому без версии ничего работать не будет
		# UP: решено было реализовать обработкой READ NULL BYTE
		# UPP: реализовано с помощью дописывания версии в конец auth_key
		$v1d4 = '1.05';
		$v1d7 = '1.07';

		if (mb_strpos($res->auth_key, $v1d7) !== false)
		{
			$res->version = $v1d7;
			$res->subversion = '0.0';
			$res->auth_key = str_replace($v1d7, '', $res->auth_key);
		}

		# полная версия 1.35.0.0 делится на:
		# version 1.35
		# subversion 0.0

		if (!$res->subversion)
		{
			# получится вид 0.0
			# например, для PVP сверяется и подверсия
			$res->subversion = '';
			$res->subversion .= $input->read_byte();
			$res->subversion .= '.'.$input->read_byte();
		}

		for ($i = 0; $i < $length; $i++)
			$res->friends[] = $input->read_int();

		/*
		VK:("vkontakte",1);
		OK:("odnoklassniki",2);
		MM:("mailru",3);
		NATE:("nate",4);
		BARATIKOR:("baratikor",5);
		NK:("nk",6);
		ONELT:("onelt",7);
		FS:("fotostrana",8);
		FB:("facebook",9);
		VZ:("vz",10);
		DRAUGIEM:("draugiem",11);
		*/

		$res->social_code = $input->read_byte();
		$main->log("social code:, $res->social_code");

		return $res;
	}

	# позволяет получить версию из int путем смещения байтов
	# deprecated
	static function parse_version($version, $major = true)
	{
		$a = ord(chr($version >> 24));
		$b = ord(chr($version >> 16));
		$c = ord(chr($version >> 8));
		$d = ord(chr($version));

		return $major ? $a.$b : $a.$b.$c.$d;
	}
}