<?

class LoginClanBase
{
	static $command_id = ClansMessages::LOGIN_REQUEST;

	static function handle($callback, $user_id, $input)
	{
		# в версиях < 1.20 при заходе в домик либо белый экран, либо просит зайти еще раз
		#  версиях >= 1.20 домик открывается, но при открытии клана сбоку его нельзя задвинуть обратно
		return;
		$protocolVersion = $input->read_int();
		$callback->log('protocolVersion', $protocolVersion);
		$socialId = $input->read_short();
		$callback->log('socialId', $socialId);
		$profileId = $input->read_int();
		$callback->log('profileId', $profileId);
		$socialProfileId = $input->read_utf();
		$callback->log('socialProfileId', $socialProfileId);
		$name = $input->read_utf();
		$callback->log('name', $name);
		$sessionKey = $input->read_utf();
		$callback->log('sessionKey', $sessionKey);

		$output = new ByteArray;

		$output->write_short($serviceResult = 0);
		$output->write_utf($sessionKey);
		$output->write_short($byteSize = 0);

		# другой серилайзер ClanTO
		$output->write_int($clanId = 1);
		$output->write_utf($clanName = 'Тестеры');
		$output->write_int($level = 10);
		$output->write_int($size = 10);
		$output->write_int($rating = 100);
		$output->write_int($seasonRating = 50);
		$output->write_int($joinRating = 100);
		$output->write_int($createDate = 5);

		$output->write_short($count = 0);
		/*
		for(var i:int = 0; i < length; i++)
		 {
			 clan.emblem.push(stream.readUnsignedByte());
		 }
		*/

		$output->write_utf($clanDescription = 'Сообщество wormixtest');
		$output->write_short($reviewState = 0);
		$output->write_int($topPlace = 1);
		$output->write_int($prevSeasonTopPlace = 2);

		$output->write_short($count = 0);

		/*
		for(i = 0; i < length; i++)
		{
			clan.members.push(BinarySerializer.getStructureSerializer(ClanMemberTO).deserializeStructure(stream,null));
		}
		*/

		$output->write_bool($isExitClosed = false);
		$output->write_int($treasury = 7);
		$output->write_byte($medalPrice = 2);
		$output->write_int($cashedMedals = 3);

		$output->write_short($count = 0);

		/*
		for(i = 0; i < length; i++)
		 {
			 stream.readShort();
			 response.chat.push(BinarySerializer.getStructureSerializer(ClanChatMessageTO).deserializeStructure(stream,null));
		 }
		*/

		$output->write_short($count = 0);

		/*
		for(i = 0; i < length; i++)
		 {
			 stream.readShort();
			 response.newsBoard.push(BinarySerializer.getStructureSerializer(ClanNewsTO).deserializeStructure(stream,null));
		 }
		*/
	}
}