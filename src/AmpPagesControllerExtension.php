<?php
namespace DorsetDigital\SilverStripeAmpPages;

use SilverStripe\Core\Extension;
use SilverStripe\Control\Controller;
use SilverStripe\View\Requirements;

class AmpPagesControllerExtension extends Extension
{

    private static $allowed_actions = ['amp'];
    private static $url_handlers = [
        'amp.html' => 'amp'
    ];

    public function amp()
    {
        Requirements::clear();
        $controller = Controller::curr();
        $class = $controller->ClassName;
        return $this->owner->renderWith([$class . "_amp", "Amp"]);
    }
}
