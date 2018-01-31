<?php
namespace DorsetDigital\SilverStripeAmpPages;

use SilverStripe\CMS\Model\SiteTreeExtension;
use SilverStripe\View\ThemeResourceLoader;
use SilverStripe\View\SSViewer;
use SilverStripe\ORM\FieldType\DBField;

class AmpPagesSiteTreeExtension extends SiteTreeExtension
{

    public function MetaTags(&$tags)
    {
        $ampLink = $this->owner->AbsoluteLink() . "amp.html";
        $tags .= "\n<link rel='amphtml' href='$ampLink' />\n";
    }

    public function getAmpStyles($cssFile)
    {
        $css = null;
        $themeCSSPath = ThemeResourceLoader::inst()->findThemedCSS($cssFile, SSViewer::get_themes());
        $fullCSSPath = BASE_PATH . DIRECTORY_SEPARATOR . $themeCSSPath;
        if (is_file($fullCSSPath)) {
            $css .= file_get_contents($fullCSSPath);
        }
        return DBField::create_field('HTMLFragment', $css);
    }
}
