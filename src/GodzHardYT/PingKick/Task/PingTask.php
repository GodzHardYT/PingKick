<?php

namespace GodzHardYT\PingKick\Task;

use GodzHardYT\PingKick\Main;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\scheduler\Task;

class PingTask extends Task {

    private $plugin;

    public function __construct(Main $main) {
        $this->plugin = $main;
    }

    /**
     * @inheritDoc
     */
    public function onRun(int $currentTick) {
        foreach (array_filter(Server::getInstance()->getOnlinePlayers(), function($player) {return $player->getPing() >= $this->plugin->getConfig()->get("Ping-Kick");}) as $player) {
            $player->kick($this->plugin->getConfig()->get("Kick-Message"));
        }
    }

}
