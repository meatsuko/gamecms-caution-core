## Installing
place ``__caution_core`` folder in ``modules_extra``

run ``$ composer install`` in ``__caution_core``

fill config file: modules_extra/``__caution_core/db.php``

patch file: inc/classes/class.autoload.php
```php
public function loader($className)
{
	#begin patch
	$primitiveTypes = ['int', 'string', 'bool', 'boolean', 'float', 'double', 'array', 'object', 'null',  'void', 'mixed'];
	if (in_array(strtolower($className), $primitiveTypes)) {
		return false;
	}
	#end patch

	$classNameParts = explode('\\', $className);
```
