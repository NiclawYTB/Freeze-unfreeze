<?php

namespace FreezePlayer\niclaw\command\staff\freeze;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\lang\Translatable;
use pocketmine\player\Player;

class freeze extends Command{

    public function __construct(string $name, Translatable|string $description = "", Translatable|string|null $usageMessage = null, array $aliases = [])
    {
        parent::__construct("freeze command", "freeze command by niclaw", "/freeze");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player){
            if ($sender->hasPermission("freeze.cmd")) {
                if (!empty($args[0])) {
                    $joueur = Server::getInstance()->getPlayerByPrefix($args[0]);
                    if (!is_null($joueur)) {
                        if (in_array($joueur->getName(), $this->frozenPlayers)) {
                            // Le joueur est déjà gelé, on le dégèle
                            $joueur->setImmobile(false);
                            unset($this->frozenPlayers[array_search($joueur->getName(), $this->frozenPlayers)]);
                            $sender->sendPopup("§ale joueur §f{$joueur->getName()}§a est dégelé !");
                        } else {
                            // Le joueur n'est pas gelé, on le gèle
                            $joueur->setImmobile(true);
                            $this->frozenPlayers[] = $joueur->getName();
                            $sender->sendPopup("§ale joueur §f{$joueur->getName()}§a est freeze !");
                        }
                        return;
                    }
                } else {
                    $sender->sendMessage("Vous devez spécifier un joueur.");
                }
            } else {
                $sender->sendMessage("Vous n'avez pas la permission.");
            }
        }
    }
}
