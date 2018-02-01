# silverstripe-amppages
Adds semi-automated AMP page functionality to Silverstripe
This add-on provides some basic assistance in creating AMP pages in Silverstripe 4

# Requirements
*Silverstripe 4.0.x

# Installation
* Install the code with `composer require dorsetdigital/silverstripe-amppages`
* Run a `dev/build?flush` to update your project

# Usage
*Please note:* this is not an 'out-of-the-box' solution, you'll need to do some work as well!

The add-on provides some of the basic framework for getting your site AMP-enabled.   For pages in the SiteTree, a link is added to the html head which points at an AMP version of the page.
There are base templates to deal with the fundamental requirements.  These include some basic AMP boilerplate.

The controller which handles the AMP pages forcibly removes any scripts, CSS, etc. added via `Requirements` to the parent page.  This is due to the strict limitations on what can be included in AMP.
There is a base page template called `Amp.ss` and additional page types can be templated by adding a file called `ClassName_amp.ss` to your theme in the same directory as the non-AMP template.

In line with the AMP recommendations, CSS should be minified and included inline in the page.  
To try and keep a consistent workflow, the `Requirements` class has been extended to provide the ability to inject AMP CSS into the AMP version of the page automatically.  
It can be used in your page controller class as follows:

```use DorsetDigital\SilverStripeAmpPages\AmpPagesRequirementsExtension;

class ExamplePageController extends \PageController
{
    public function init()
    {
        parent::init();
        AmpPagesRequirementsExtension::ampCSS('amp');
    }
}
```

The above would automatically find a CSS file called `amp.css` in your theme's CSS directory and add the contents inline in the correct `<style amp-custom>` tag.   Additional style sheets can be added by calling the `ampCSS()` method again, they will be appended.   (Just remember, there's a size limit on the amount of CSS in AMP)


# Useful Links
See [The AMP Project](https://www.ampproject.org/) for more information about what you can and can't do in an AMP page


# Credits
Very much inspired by [Silverstripe AMP HTML for SS3](https://github.com/thezenmonkey/silverstripe-amp)
Silverstripe Slack users for their patient assistance [Slack channel signup](https://www.silverstripe.org/community/slack-signup/)
As always, thanks to the core team for all their hard work.  