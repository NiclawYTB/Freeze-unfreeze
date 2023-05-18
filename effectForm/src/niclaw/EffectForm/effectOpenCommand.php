<?php

namespace niclaw\EffectForm;

use niclaw\EffectForm\Form\Form;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\lang\Translatable;
use pocketmine\player\Player;

class effectOpenCommand extends Command{

    public function __construct(string $name, Translatable|string $description = "", Translatable|string|null $usageMessage = null, array $aliases = [])
    {
        parent::__construct("EffectForm", "EffectForm by niclaw", "/effect");
    }

public function execute(CommandSender $sender, string $commandLabel, array $args)
{
 if ($sender instanceof Player){
     $sender->sendForm(Form::FormSendEffect($sender));
     $sender->sendPopup("voici les effects disponible");
 }
}
}
