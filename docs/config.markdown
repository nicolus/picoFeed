Configuration
=============

**TODO: The config management will be rewritten to avoid static variables!**

Override blacklist/whitelist of the content filter
---------------------------------------------------

These variables are static arrays, extends the actual array or replace it.

By example to add a new iframe whitelist:

    Filter::$iframe_whitelist[] = 'http://www.kickstarter.com';

Or to replace the entire whitelist:

    Filter::$iframe_whitelist = array('http://www.kickstarter.com');

Available variables:

    // Allow only specified tags and attributes
    Filter::$whitelist_tags

    // Strip content of these tags
    Filter::$blacklist_tags

    // Allow only specified URI scheme
    Filter::$whitelist_scheme

    // List of attributes used for external resources: src and href
    Filter::$media_attributes

    // Blacklist of external resources
    Filter::$media_blacklist

    // Required attributes for tags, if the attribute is missing the tag is dropped
    Filter::$required_attributes

    // Add attribute to specified tags
    Filter::$add_attributes

    // Integer Attributes
    Filter::$integer_attributes

    // Iframe allowed source
    Filter::$iframe_whitelist

For more details, have a look to the class `Filter`.