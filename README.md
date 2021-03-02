# PHP LOG Class

Custom static class for register messages with simple methods.

## INSTALLATION

**With Composer**

    composer require danielriera/phplog

## CONSTANTS

**LOG_DEFAULT_FILE**
Default file if $type is not defined, default: 'user'

**LOG_FOLDER**
Folder on put files, default: '/'

**LOG_DIVIDE_ELEMENT**
If defined divide files by $element, default: No defined 

## API
##### **LOG::add(msg, element, type)**

- **msg**: String | Array | Object to register.
- **element**: String or Integer id, default: false.
- **type**: Type of log register, default: ``LOG_DEFAULT_FILE`` (user) 

## Example

    LOG::add("Test Line");
    LOG::add("Test User Line", 524);
    LOG::add("Other User Line", 524);
    LOG::add("Order Test Line", 'WEB581657816', 'order');
