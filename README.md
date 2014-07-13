# Guild Wars 2 PHP Api
> Wrapper around the  Guild Wars 2 public API.

The current version supports v1 of the Guild Wars 2 API.

## Usage

The easiest way to instantiate is using the following snippet:

```php
$client = new GuildWars2\Client();
```

You can also set the locale.


```php
	$client = new GuildWars2\Client([
    	'locale' => 'fr',
	]);	
```

Once you have an instance you have access to all the endpoints.

```php
	$client->api('build')->build();
```

## Available methods

| Endpoint  | Method  | Parameters  | Example |
|---|---|---|---|
|  **build** |  build |  *none* | `	$client->api('build')->build()`|
|  **colors** |  colors |  *none* | `	$client->api('colors')->colors()`|
|  **files** |  files |  *none* | `	$client->api('files')->files()`|
|  **map** |  continents |  *none* | `	$client->api('map')->continents()`|
|  **map** |  maps |  *none* | `	$client->api('map')->maps()`|
|  **map** |  mapes |  (optional) int map_id| `	$client->api('map')->maps(15)`|
|  **map** |  floors |  int continent_id,  int floor| `	$client->api('map')->floors(1, 1)`|
|  **map** |  names |  *none* | `	$client->api('map')->names()`|
|  **wvw** |  matches |  *none* | `	$client->api('wvw')->matches()`|
|  **wvw** |  objectives |  *none* | `	$client->api('wvw')->objectives()`|
|  **wvw** |  match |  string match_id | `	$client->api('wvw')->match('2-2')`|
|  **guild** |  byId |  string guild_id | `	$client->api('guild')->byId("75FD83CF-0C45-4834-BC4C-097F93A487AF")`|
|  **guild** |  byName |  string guild_name | `	$client->api('guild')->byName("Veterans Of Lions Arch")`|
| **items** | items | *none* | `$client->api('items')->items()`|
| **items** | item | int item_id | `$client->api('items')->item(28445)`|
| **items** | skins | *none* | `$client->api('items')->skins()`|
| **items** | skin | int skin_id | `$client->api('items')->skin(1350)`|
| **items** | recipes | *none* | `$client->api('items')->recipes()`|
| **items** | recipe | int recipe_id | `$client->api('items')->recipe(1275)`|
| **events** | names | *none* | `$client->api('events')->names()`|
| **events** | event | (optional) string event_id | `$client->api('events')->event("4B212997-CEF0-4B2C-91BE-B787A6A32DE9")`|

## Using the render service

With the render service you can transform a file into a usable url. You pass the signature and file id.

```php
$client->api('files')->file('943538394A94A491C8632FBEF6203C2013443555', 102478)
```



