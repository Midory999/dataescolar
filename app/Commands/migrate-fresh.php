<?php

declare(strict_types=1);

use Symfony\Component\Dotenv\Dotenv;

require_once __DIR__ . '/../../vendor/autoload.php';

echo "> Starting\n\n";
echo "🕐 Loading environment variables\n";
echo "--------------------------------\n";

(new Dotenv())->load(__DIR__ . '/../../.env.local');

echo "✅ Detected DB driver: {$_ENV['DB_CONNECTION']}\n";
echo "✅ Detected DB name: {$_ENV['DB_DATABASE']}\n";

if (strtolower($_ENV['DB_CONNECTION']) === 'sqlite') {
	$sqlitePath = dirname(__DIR__) . '/Repositories/SQLite';
	$filePath = str_replace('\\', '/', "$sqlitePath/init.sql");
	$dbPath = str_replace('\\', '/', "$sqlitePath/{$_ENV['DB_DATABASE']}");
	$sqlScript = file_get_contents($filePath);

	echo "📂 SQL script loaded: $filePath\n";
	$pdo = new PDO("sqlite:$dbPath");
	echo "✅ DB connection successfully\n";
	echo "--------------------------\n";
	echo "🕔 Running queries on: $dbPath\n";
	echo "🔃 Please wait...\n";

	foreach (explode(';', $sqlScript) as $query) {
		$query = trim($query);

		$query && $pdo->exec($query);
	}

	echo "\n☑ DB installed successfully\n";

	exit(0);
} elseif (strtolower($_ENV['DB_CONNECTION']) === 'mysql') {
	$mysqlPath = dirname(__DIR__) . '/Repositories/MySQL';
	$filePath = str_replace('\\', '/', "$mysqlPath/init.sql");
	$sqlScript = file_get_contents($filePath);
	$sqlScript = str_replace('{DB_DATABASE}', $_ENV['DB_DATABASE'], $sqlScript);

	echo "📂 SQL script loaded: $filePath\n";
	$dsn = "mysql:host={$_ENV['DB_HOST']}; charset=utf8";
	$pdo = new PDO($dsn, $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
	echo "✅ DB connection successfully\n";
	echo "--------------------------\n";
	echo "🕔 Running queries on: {$_ENV['DB_DATABASE']}\n";
	echo "🔃 Please wait...\n";

	foreach (explode(';', $sqlScript) as $query) {
		$query = trim($query);

		$query && $pdo->exec($query);
	}

	echo "\n☑ DB installed successfully\n";

	exit(0);
} else {
	echo "❌ Invalid DB driver: {$_ENV['DB_CONNECTION']}\n";

	exit(1);
}
