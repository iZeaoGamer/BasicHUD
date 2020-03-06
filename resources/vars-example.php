/*
 * This code is used to create new format variables
 *
 * The following variables are available:
 *
 * $plugin - the HUD plugin
 * $vars - array containing format variables
 * $player - current player
 */
$pm = $plugin->getServer()->getPluginManager();

if (($factions = $pm->getPlugin("FactionsPro")) !== null) {
	if (version_compare($factions->getDescription()->getVersion(),"1") >= 0) {
		$vars["{faction}"] = $faction->getPlayerFaction($player->getName());
		$isInFaction = $faction->isInFaction();
		if (!$isInFaction){
			$vars["{faction}"] = "N/A";
		} else {
			$vars["{faction}"] = $faction->getPlayerFaction($player->getName());
	
			}
		}
	}
}
if (($mm = $pm->getPlugin("PocketMoney")) !== null) {
	$vars["{money}"] = $mm->getMoney($player->getName());
} elseif (($mm = $pm->getPlugin("MassiveEconomy")) !== null) {
	$vars["{money}"] = $mm->getMoney($player->getName());
} elseif (($mm = $pm->getPlugin("EconomyAPI")) !== null) {
	$vars["{money}"] = $mm->mymoney($player->getName());
} elseif (($mm = $pm->getPlugin("GoldStd")) !== null) {
	$vars["{money}"] = $mm->getMoney($player);
}
