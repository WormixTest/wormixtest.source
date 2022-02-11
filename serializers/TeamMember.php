<?

class TeamMember
{
	static function serialize($output, $res, $real_name = true)
	{
		$output->write_short(count($res->team));

		foreach ($res->team as $member)
		{
			if ($res->version >= '1.33')
				$output->write_short(0);

			$output->write_int($member->user_id);
			$output->write_short($member->hat_id);

			# эта хуита в десиралайзере читается как UTF (моэно записать как write_short(0), ибо первые два байта это длина строки)
			$output->write_utf($social_owner_id = '');

			if ($res->version > '1.11')
			{
				# в космической версии 1.32 новое говно - смена имен, ранее уже было введено в 1.31 без возм. смены
				if ($res->version >= '1.31')
					$output->write_utf("Василевский клоун");

				if ($res->version >= '1.19')
					$output->write_bool($member->active);
			}
		}
	}
}