<?php
namespace DorsetDigital\SilverStripeAmpPages;

use SilverStripe\Core\Extension;
use SilverStripe\Control\Controller;
use SilverStripe\View\Requirements;

class AmpPagesControllerExtension extends Extension
{

    private static $allowed_actions = ['amp'];

    public function amp()
    {
        Requirements::clear();
        $this->addAmpStyles();
        $controller = Controller::curr();
        $class = $controller->ClassName;
        return $this->owner->renderWith([$class . "_amp", "Amp"]);
    }

    private function addAmpStyles()
    {
        $css = null;
        $cssFiles = AmpPagesRequirementsExtension::getAmpCSSFiles();
        foreach ($cssFiles as $themeCSSPath) {
            $fullCSSPath = BASE_PATH . DIRECTORY_SEPARATOR . $themeCSSPath;
            if (is_file($fullCSSPath)) {
                $css .= file_get_contents($fullCSSPath);
            }
        }
        $tag = '<style amp-custom>' . $css . '</style>';
        Requirements::insertHeadTags($tag);
    }
}
