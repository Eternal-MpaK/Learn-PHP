<?php

// autoload_real_52.php generated by xrstf/composer-php52

class ComposerAutoloaderInit18b08e895742391cb46af3b3d43b33fd {
	private static $loader;

	public static function loadClassLoader($class) {
		if ('xrstf_Composer52_ClassLoader' === $class) {
			require dirname(__FILE__).'/ClassLoader52.php';
		}
	}

	/**
	 * @return xrstf_Composer52_ClassLoader
	 */
	public static function getLoader() {
		if (null !== self::$loader) {
			return self::$loader;
		}

		spl_autoload_register(array('ComposerAutoloaderInit18b08e895742391cb46af3b3d43b33fd', 'loadClassLoader'), true /*, true */);
		self::$loader = $loader = new xrstf_Composer52_ClassLoader();
		spl_autoload_unregister(array('ComposerAutoloaderInit18b08e895742391cb46af3b3d43b33fd', 'loadClassLoader'));

		$vendorDir = dirname(dirname(__FILE__));
		$baseDir   = dirname($vendorDir);
		$dir       = dirname(__FILE__);

		$map = require $dir.'/autoload_namespaces.php';
		foreach ($map as $namespace => $path) {
			$loader->add($namespace, $path);
		}

		$classMap = require $dir.'/autoload_classmap.php';
		if ($classMap) {
			$loader->addClassMap($classMap);
		}

		$loader->register(true);

//		require $vendorDir . '/symfony/polyfill-ctype/bootstrap.php'; // disabled because of PHP 5.3 syntax
//		require $vendorDir . '/symfony/polyfill-mbstring/bootstrap.php'; // disabled because of PHP 5.3 syntax
		require $vendorDir . '/ralouphie/getallheaders/src/getallheaders.php';
//		require $vendorDir . '/guzzlehttp/promises/src/functions_include.php'; // disabled because of PHP 5.3 syntax
//		require $vendorDir . '/guzzlehttp/psr7/src/functions_include.php'; // disabled because of PHP 5.3 syntax
//		require $vendorDir . '/guzzlehttp/guzzle/src/functions_include.php'; // disabled because of PHP 5.3 syntax
//		require $vendorDir . '/myclabs/deep-copy/src/DeepCopy/deep_copy.php'; // disabled because of PHP 5.3 syntax
		require $vendorDir . '/wp-cli/mustangostang-spyc/includes/functions.php';
//		require $vendorDir . '/wp-cli/php-cli-tools/lib/cli/cli.php'; // disabled because of PHP 5.3 syntax

		return $loader;
	}
}
