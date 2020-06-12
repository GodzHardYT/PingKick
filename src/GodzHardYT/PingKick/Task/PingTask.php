<?php

namespace GodzHardYT\PingKick\Task;

use GodzHardYT\PingKick\Main;
use pocketmine\Player;
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
        foreach ($this->plugin->getServer()->getOnlinePlayers() as $player) {
            if ($player->getPing() >= $this->plugin->getConfig()->get("Ping-Kick")) {
                $player->kick($this->plugin->getConfig()->get("Kick-Message"));
            }
        }
    }

}