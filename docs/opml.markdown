OPML Import/Export
==================

Parsing OPML
------------

```php
<?php

use PicoFeed\Serialization\SubscriptionListParser;

// Parse $opmlData and returns a SubscriptionList object
$subscriptionList = SubscriptionListParser::create($opmlData)->parse();
```

- `$opmlData` is a string that contains the OPML file contents
- The method `parse()` returns a `SubscriptionList` object

If the XML file is invalid, a exception `PicoFeed\Parser\MalformedXmlException` is raised.

OPML Serialization
------------------

```php
<?php

use PicoFeed\Serialization\SubscriptionListBuilder;

// Serialize the object $subscriptionList to OPML
$opmlBuilder = new SubscriptionListBuilder($subscriptionList);
echo $opmlBuilder->build();
```

- The constructor of the class `SubscriptionListBuilder` takes a `SubscriptionList` object as argument
- The method `build()` serialize the object to OPML as a string
- You can also save the content to a file by using `$opmlBuilder->build('/path/to/feeds.opml');`

SubscriptionList Object
-----------------------

The `SubscriptionList` object define a list of feeds that can be exported or imported by PicoFeed.
 
Here is the list of getters and setters:

- `setTitle($title)` / `getTitle()`
- `addSubscription(Subscription $subscription)`

The attribute `SubscriptionList::subscriptions` contains the list of feeds.

Subscription Object
-------------------

The `Subscription` object represents a single feed.

Here is the list of getters and setters:

- `setTitle($title)` / `getTitle()`
- `setFeedUrl($feedUrl)` / `getFeedUrl()`
- `setSiteUrl($siteUrl)` / `getSiteUrl()`
- `setCategory($category)` / `getCategory()`
- `setDescription($description)` / `getDescription()`
- `setType($type)` / `getType()`

The title and the feed url are mandatory when you generate a new OPML feed.
