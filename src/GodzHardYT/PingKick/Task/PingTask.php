<?php

namespace GodzHardYT\PingKick\Task;

use GodzHardYT\PingKick\Main;
use pocketmine\scheduler\Task;

class PingTask extends Task {

    private Main $plugin;

    public function __construct(Main $main) {
        $this->plugin = $main;
    }

    public function onRun() : void {
        if ($this->plugin->getServer()->getTicksPerSecondAverage() >= $this->plugin->getConfig()->get("tps-check")) {
            foreach ($this->plugin->getServer()->getOnlinePlayers() as $player) {
                if ($player->getNetworkSession()->getPing() >= $this->plugin->getConfig()->get("ping-kick")) {
                    $player->kick($this->plugin->getConfig()->get("kick-message"));
                }
            }
        }
    }
}
