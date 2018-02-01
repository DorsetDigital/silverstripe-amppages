<?php
namespace DorsetDigital\SilverStripeAmpPages;

use SilverStripe\Core\Extension;
use SilverStripe\View\ThemeResourceLoader;
use SilverStripe\View\SSViewer;

class AmpPagesRequirementsExtension extends Extension
{
    private static $ampCss = [];
    
    public static function ampCSS($cssFile) {
        $themeCSSPath = ThemeResourceLoader::inst()->findThemedCSS($cssFile, SSViewer::get_themes());
        if ($themeCSSPath) {
            self::$ampCss[] = $themeCSSPath;
        }
    }
    
    public static function getAmpCSSFiles() {
        return self::$ampCss;
    }
    
}
