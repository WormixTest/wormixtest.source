<?

# начиная с 1.32 изменили id
class SetBackpackConf2
{
	public static $command_id = 129;

	static function handle($callback, $user_id, $input)
	{
		if ($callback->versions[$user_id] >= '1.53')
		{
			$configLength = $input->read_short();
			$callback->log('Backpack configLength:', $configLength);
			$backpacks = [];
		}
		else
		{
			/*
		 Для 1.52:

		   §5E§.§0%§(_loc5_,_loc3_.config1);
         §5E§.§0%§(_loc5_,_loc3_.config2);
         §5E§.§0%§(_loc5_,_loc3_.config3);
         §5E§.§0%§(_loc5_,_loc3_.config4);
         §5E§.§0%§(_loc5_,_loc3_.config5);
         _loc5_.writeByte(_loc3_.activeConfig);

		 */

			$backpack = $input->read_short_array();
			$callback->log('Backpack Conf2:', $backpack);
			UsersModel::set_backpack($user_id, $backpack);
		}
	}
}