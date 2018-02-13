<?php
namespace DorsetDigital\SilverStripeAmpPages;

use SilverStripe\CMS\Model\SiteTreeExtension;
use SilverStripe\View\HTML;

class AmpPagesSiteTreeExtension extends SiteTreeExtension
{

    public function MetaTags(&$tags)
    {
        $ampLink = $this->owner->AbsoluteLink()."amp.html";
        $atts = [
            'rel' => 'amphtml',
            'href' => $ampLink
        ];
        $tags .= "\n".HTML::createTag('link', $atts)."\n";
    }
}
