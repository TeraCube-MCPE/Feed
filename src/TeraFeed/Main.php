<?php

namespace TeraFeed;

use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as R;
use pocketmine\command\Command;

class Main extends PluginBase implements Listener{

	public function onEnable(): void{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{
		if(!$sender instanceof Player) return false;
		if(!$sender->hasPermission("teracube.feed")){
			$sender->sendMessage(R::RED . "Vous n'avez pas la permission d'executer cette commande!");
			return false;
		}
		$sender->setFood(20);
		$sender->setSaturation(20);
		$sender->sendMessage(R::GREEN . "Vous avez bien été nourrit!");
		return true;
	}
}
