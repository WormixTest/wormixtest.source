<?

class GetBundlesResult
{
	static $command_id = 10116;

	static function deserialize($input, $version = null)
	{
		$bundles = [];
		$count = $input->read_short();
		echo "bundles count: $count\n";

		for ($i = 0; $i < $count; $i++)
		{
			$bundle = new stdClass();
			$bundle->expireInSeconds = $input->read_int();
			$bundle->items = $items;
			$bundles[] = $bundle;
		}

		return $bundles;
	}
}