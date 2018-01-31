# silverstripe-amppages
Adds semi-automated AMP page functionality to Silverstripe

This add-on provides some basic assistance in creating AMP pages in Silverstripe 4
Very much inspired by [Silverstripe AMP HTML for SS3](https://github.com/thezenmonkey/silverstripe-amp)

# Requirements
*Silverstripe 4.0.x

# Installation
* Install the code with `composer require dorsetdigital/silverstripe-amppages`
* Run a `dev/build?flush` to update your project

# Usage
*Please note:* this is not an 'out-of-the-box' solution, you'll need to do some work as well!

The add-on provides some of the basic framework for getting your site AMP-enabled.   For pages in the SiteTree, a link is added to the html head which points at an AMP version of the page.
There are base templates to deal with the fundamental requirements.  These include some basic AMP boilerplate.

See [The AMP Project](https://www.ampproject.org/) for more information about what you can and can't do in an AMP page

The controller which handles the AMP pages forcibly removes any scripts, CSS, etc. added via `Requirements` to the parent page.  This is due to the strict limitations on what can be included in AMP.
There is a base page template called `Amp.ss` and additional page types can be templated by adding a file called `ClassName_amp.ss` to your theme.

In line with the AMP recommendations, CSS should be minified and included inline in the page.  To make managing the CSS via tools such as SASS a little simpler, there's a helper method that can be called in a template:  `$getAmpStyles(cssfilename)`.  This will include the contents of the named CSS file (from your theme's CSS directory) and put them inline for you.

