Exceptions
==========

All exceptions inherits from the standard `Exception` class.

### Library Exceptions

- `PicoFeed\PicoFeedException`: Base class exception for the library

### Client Exceptions

- `PicoFeed\Client\ClientException`: Base exception class for the Client class
- `PicoFeed\Client\InvalidCertificateException`: Invalid SSL certificate
- `PicoFeed\Client\InvalidUrlException`: Malformed URL, page not found (404), unable to establish a connection
- `PicoFeed\Client\MaxRedirectException`: Maximum of HTTP redirections reached
- `PicoFeed\Client\MaxSizeException`: The response size exceeds to maximum allowed
- `PicoFeed\Client\TimeoutException`: Connection timeout
- `PicoFeed\Client\ForbiddenException`: Thrown for HTTP 403, meaning that the user does not have the rights to access the feed
- `PicoFeed\Client\UnauthorizedException`: Thrown for HTTP 401, meaning that the user did not provide credentials or provided wrong credentials

### Parser Exceptions

- `PicoFeed\Parser\ParserException`: Base exception class for the Parser class
- `PicoFeed\Parser\MalformedXmlException`: XML Parser error
- `PicoFeed\Parser\XmlEntityException`: Thrown if XML entities are used in order to prevent XXE, subclass of MalformedXmlException

### Reader Exceptions

- `PicoFeed\Reader\ReaderException`: Base exception class for the Reader
- `PicoFeed\Reader\SubscriptionNotFoundException`: Unable to find a feed for the given website
- `PicoFeed\Reader\UnsupportedFeedFormatException`: Unable to detect the feed format
