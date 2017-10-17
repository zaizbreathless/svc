<?php
namespace cli;

use cli\BaseConsole as Console;

class Migration {
	public $schemaName = 'svc';
    private function getSchemaSql() {
        $fileName = 'faisal_svc-v4.sql';
        $myfile = fopen($fileName, "r") or die("Unable to open file!");
        $commandR = fread($myfile, filesize($fileName));
        fclose($myfile);

        $sql = $commandR;
        return "$sql";

    }


	public function Up() {
		$this->down();
		Console::stdout('migrating up...');
		Console::break();

		$pdo = new \PDO("mysql:host=localhost;dbname=svc", 'root', '');
		$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        foreach (array_filter(array_map('trim', explode(';', $this->getSchemaSql()))) as $query) {
			Console::stdout($query);
			Console::break();

			$pdoStatement = $pdo->prepare($query);
			$pdoStatement->execute();
        }

		// for ($i=1; $i < 10; $i++) {
		// 	# code...
		// 	Console::stdout("migration table $i");
		// 	Console::break();
		// 	sleep(1);
		// }

		Console::stdout('migration done');
		Console::break();
	}

	public function Down() {
		Console::stdout('migrating down...');
		Console::break();

		$pdo = new \PDO("mysql:host=localhost;dbname=svc", 'root', '');
		$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        //drop for confirm
        try {
            //set fk check off
            $fkCheckOff = "SET FOREIGN_KEY_CHECKS = 0";
            // $sqlObject = Yii::$app->db->createCommand($fkCheckOff)->execute();
            $sqlObject = $pdo->prepare($fkCheckOff)->execute();
            //prepare script for dropping table and view
            $script = "SELECT concat('DROP TABLE IF EXISTS ', table_name, ';') as query
            FROM information_schema.tables
            WHERE table_schema = '".$this->schemaName."' and table_name != 'migration'";

            $viewDropScript = "SELECT CONCAT('DROP VIEW IF EXISTS ', table_name, ';') AS query
            FROM information_schema.tables
            WHERE table_schema = '".$this->schemaName."' AND TABLE_TYPE LIKE 'VIEW'";

            //dropping view
            $viewDropObject = $pdo->query($viewDropScript);
            foreach ($viewDropObject as $viewQuery) {
        		$command = $pdo->prepare($viewQuery)->execute();
                Console::stdout($query['query']);
                Console::break();
            }

            //dropping table
            $sqlObject = $pdo->query($script);
            foreach ($sqlObject as $query) {
                $command = $pdo->prepare($query['query'])->execute();
                Console::stdout($query['query']);
                Console::break();
            }

            //set fk check back on
            $fkCheckOn = "SET FOREIGN_KEY_CHECKS = 1";
            // $sqlObject = Yii::$app->db->createCommand($fkCheckOff)->execute();
            $sqlObject = $pdo->prepare($fkCheckOff)->execute();

        } catch (\yii\db\Exception $e) {

        }
		Console::stdout('migration done');
		Console::break();
	}
	public function Redo() {
		Console::stdout('redo migration...');
		$this->down();
		$this->up();
	}

}
