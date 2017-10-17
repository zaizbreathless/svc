<?php
namespace cli;

use cli\BaseConsole as Console;

class Db {
	public $config;

    protected function createDatabase()
    {
		$pdo = new PDO("mysql:host=$config['host'];dbname=$config['root_dsn']", $config['root_user'], $config['root_password']);
		$pdo->setAttributes(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$pdoStatement = $pdo->prepare("CREATE DATABASE $config['dsn']");
		$pdoStatement->execute();
		Console::stdout("Creating database");
		//mysqli
		// $mysqli = new mysqli($config['host'], $config['root_user'], $config['root_password'], $config['root_dsn']);

		// /* check connection */
		// if ($mysqli->connect_errno) {
		//     Console::stdout("Connect failed: %s\n", $mysqli->connect_error);
		//     Console::break();
		//     exit();
		// }

		// /* Create table doesn't return a resultset */
		// if ($mysqli->query("CREATE DATABASE $config['dsn']") === TRUE) {
		//     Console::stdout("Table myCity successfully created.\n");
		//     Console::break();
		// }
    }

    public function getConfig() {
    	return  isset($config) ? $config : $this->setConfig();
    }

    public function setConfig() {
		// $fileName = '.env';
		// $myfile = fopen($fileName, "r") or die("Unable to open file!");
		// $config = fread($myfile, filesize($fileName));
		// fclose($myfile);
		$config = [
			'host'=>'localhost',
			'root_dsn'=>'localhost',
			'root_dsn'=>'localhost',
		];
		return $config;
    }

    protected function createCommand($sql,$config)
    {
		$pdo = new PDO("mysql:host=$config['host'];dbname=$config['dsn']", $config['user'], $config['password']);
		$pdo->setAttributes(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$pdoStatement = $pdo->prepare("CREATE DATABASE $config['dsn']");

		//mysqli
		// $mysqli = new mysqli($config['host'], $config['root_user'], $config['root_password'], $config['root_dsn']);

		// /* check connection */
		// if ($mysqli->connect_errno) {
		//     Console::stdout("Connect failed: %s\n", $mysqli->connect_error);
		//     Console::break();
		//     exit();
		// }

		// /* Create table doesn't return a resultset */
		// if ($mysqli->query("CREATE DATABASE $config['dsn']") === TRUE) {
		//     Console::stdout("Table myCity successfully created.\n");
		//     Console::break();
		// }
    }

    protected function createCommand()
    {
		$pdo = new PDO("mysql:host=$config['host'];dbname=$config['root_dsn']", $config['root_user'], $config['root_password'], array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		));

        if ($this->emulatePrepare !== null && constant('PDO::ATTR_EMULATE_PREPARES')) {
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, $this->emulatePrepare);
        }
        if ($this->charset !== null && in_array($this->getDriverName(), ['pgsql', 'mysql', 'mysqli', 'cubrid'], true)) {
            $this->pdo->exec('SET NAMES ' . $this->pdo->quote($this->charset));
        }
        $this->trigger(self::EVENT_AFTER_OPEN);
    }

    public function createCommand($sql = null, $params = [])
    {
        /** @var Command $command */
        $command = new $this->commandClass([
            'db' => $this,
            'sql' => $sql,
        ]);

        return $command->bindValues($params);
    }

	private static function getConfig() {
		$fileName = '.env';
		$myfile = fopen($fileName, "r") or die("Unable to open file!");
		$config = fread($myfile, filesize($fileName));
		fclose($myfile);
		return $config;
	}

	public function getDbName() {
		$config = self::getConfig();
		return $config['DBNAME'];
	}

	public function getDbName() {
		$config = self::getConfig();
		return $config['DBNAME'];
	}

	public function execute() {
		$config = self::getConfig();
		$pdo = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->user, $this->password, array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		));

		return $pdo;
	}

	public function query($pdo) {
		$config = self::getConfig();
        $cd = $pdo->prepare("SELECT * FROM tapak WHERE id=$id");
        $acd = array($id);
        $cd->execute($acd);

		return $config['DBNAME'];
	}
	public function query() {
		$config = self::getConfig();

		return $config['DBNAME'];
	}

}
