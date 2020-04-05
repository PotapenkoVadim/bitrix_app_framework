<?php
use libs\crest\CRest;
use libs\crest\CRestPlus;
use libs\debugger\Debugger;
require_once (__DIR__.'/autoload.php');

/**
* version 1.0
* 1 настроена работа библиотек CrestPlus, Debugger
*    - реализованы методы-обертки для класса Crest
*    - реализованы методы-обертки для класса Debugger
* 2 конструктор класса выступает в роли установщика приложения (BX24.init{CRest::installApp}) и реализует настройку взаимодействия с классом Debugger
* 3 работа над методом рендинга шаблона приложения
*
* NiceDo
*/

class Core {
	// файл с токенами клиента
	public const CLIENT  = __DIR__.'/libs/crest/settings.json';
	// файл установки
	public const INSTALL = __DIR__.'/libs/crest/install.php';
	// логирование системных сообщений
	protected const SYS_LOG = __DIR__.'/log/syslog.txt';
	// файл для записи логов
	protected const LOG_PATH = __DIR__.'/log/log.txt';
	// место сохранения пользовательских данных
	protected const SAVE_PARAMS = __DIR__.'/config/saveparams/savedata.php';
	// сообщение о неправильной установке
	protected const SYSTEM_MESSAGE = __DIR__.'/config/system_message/';
	// дефолтный шаблон приложения
	protected const TEMPLATE = 'default';

	// логирование
	protected $debugLog = false;
	// вывод ошибок на эран
	protected $debugErrors = false;
	// дефолтный заголовок этапа логгирования
	protected $debugTitle = 'DEBUG';
	// пользовательский файл для логгирования
	protected $debugPath;
	// пользовательское значения сохранения данных 
	protected $debugSavePath;
	// урл точки входа
	public $serverName;
	// урл клиента
	public $serverClient;


	/**
	* Контруктор объекта осуществляет установку приложения и настройку параметров debugger
	*
	* @var array $params - параметры настройки debugger array(
	*		debugBool => вкл логирование, debugErrors => вкл вывод ошибок, debugPath => путь к файлу логирования, debugTitle => заголовки этапа логирования
	* )
	* @return bool - true выполнена установка или штатный режим работы приложения, false - необходимо проверить наличие файла /libs/crest/settings.json или выполнить 
	*		вход в приложение через битрикс при установке
	*/
	public function __construct ($params = array()) {
		if (isset($_REQUEST['DOMAIN']) && !file_exists(self::CLIENT)) {
			require self::INSTALL;
			$this->serverName = (isset($_SERVER['HTTPS']) ? 'https:' : 'http:').'//'.$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'];

			// подписка на события
			$bind = require(__DIR__.'/config/systemBind.php');
			if (!empty($bind)) {
				$set_bind = $this->getInstallBind($bind, $this->serverName);
				Debugger::writeToLog($set_bind, SYS_LOG, 'Подписка на события');
			}

			// встраивание приложения
			$place = require(__DIR__.'/config/systemPlacementBind.php');
			if (!empty($place)) {
				$set_bindplace = $this->getInstallBind($place, $this->serverName);
				Debugger::writeToLog($set_bindplace, SYS_LOG);
			}
			header('Location: ../index.php');
			return true;

		} elseif (file_exists(self::CLIENT)) {
			$this->serverClient = explode('=', explode('&',$_SERVER['QUERY_STRING'])[0])[1];;
			$this->setDebugParam($params);
			$this->setDisplayErrors($this->debugErrors);
			return true;

		}
		require self::SYSTEM_MESSAGE.'warning_install.php';
		return false;
	}


	### Управление Crest ###
	/**
	* Метод-обертка для CRest::(call/callBatch/callBatchList)
	*
	* @var str $func - используемые метод класса CRestPlus (call/callBatch/callBatchList)
	* @var str $method - метод rest api bitrix
	* @var array $data - параметры запроса `array('filter' => array(), 'select' => array())`
	* @return array возвращаемый массив данных из битрикса
	*/
	public function callCrest ($func, $method, $data = array()) {
		if ($func == 'callBatch') $result[] = CRestPlus::$func($method);
		else $result = CRestPlus::$func($method, $data);
		return $result;
	}

	/**
	* Метод-обертка для безпараметренных методов CRest::(callCurrentUser/aboutActivity)
	*
	* @var str $func - используемые метод класса CRestPlus (callCurrentUser/aboutActivity)
	* @return array возвращаемый массив данных из битрикса
	*/
	public function noDataCrest ($func) {
		$result = CRestPlus::$func();
		return $result;
	}

	/**
	* Метод-обертка для CRest::callBatchUser
	*
	* @var array data - массив id пользователей портала
	* @return array - массив данных пользователей портала 
	*/
	public function callUsers ($data = array()) {
		$result = CRestPlus::callBatchUsers($data);
		return $result;
	}


	### Управление Debugger ###
	/**
	* метод настройки debugger
	*
	* @var array $params - массив параметров настроки, вносится в конструкторе класса
	* @return void
	*/
	protected function setDebugParam ($params = array()) {
		if (is_array($params)) {
			$this->debugLog    = $params['debugBool'] ?: false;
			$this->debugErrors = $params['debugErrors'] ?: false;
			$this->debugPath   = $params['debugPath'] ?: self::LOG_PATH;
			$this->debugTitle  = $params['debugTitle'] ?: 'DEBUG';
			$this->debugSavePath = $params['debugSavePath'] ?: self::SAVE_PARAMS;
		}
	}

	/**
	* метод вкл отображения ошибок, устанавливается в конструкторе класса
	*
	* @var bool $set - вкл/выкл отображения отображения ошибок
	* @return void
	*/
	private function setDisplayErrors ($set) {
		Debugger::displayErrors ($set);
	}

	/**
	* метод-обертка для класса debugger::writeToLog
	*
	* @var array $data - парметры которые логируем
	* @var str $title - заголовок для этапа логирования
	* @retrun void
	*/
	public function writeToLog ($data, $title) {
		$setTitle = $title ?: $this->debugTitle;
		Debugger::writeToLog($data, $this->debugPath, $setTitle, $this->debugLog);
	}

	/**
	* метод-обертка для класса debugger::debug
	*
	* @var array $data - параметры для вывода
	* @return void
	*/
	public function debug ($data, $die = false) {
		Debugger::debug ($data, $die);
	}

	/**
	* метод-обертка для класса debugger::saveparams
	*
	* @var array $data - сохраняемые данные
	* @return void
	*/
	public function saveParams ($data, $path = false) {
		$tmp = $path ?: $this->debugSavePath;
		Debugger::saveParams($data, $tmp);
	}



	### управление ядром ###
	/**
	* Метод рендеринга шаблона приложения и вывода данных
	*
	* @var array $data - массив с данными для вывода в шаблоне приложения
	* @var str $appName - строка с наименованием приложения (нужон или не нужон?)
	* @var str $template - установка пользовательского шаблона (шаблоны необходимо расположить в директории template)
	* @return void
	*/
	public function render ($data, $template = 'default', $appName = false) {
		$currentTemplate = $template ?: self::TEMPLATE;
		$file = (__DIR__.'/templates/'.$template.'/index.php');
		if (file_exists($file)) include ($file);
		else include __DIR__.'/config/system_message/warning_template.php';
	}

	/**
	* Метод установки подписки приложения на события и встраивания приложения в битрикс, /config/system*.php
	*
	* @var array $bind - массив с событиями или с константами встраивания приложения
	* @var str $handler - урл обработчика
	*/
	public function getInstallBind ($binds, $handler) {
		if (!empty($binds)) {
			foreach ($binds as $bind) {
				$dataBind[] = array(
					'method' => 'event.bind',
					'params' => array(
						'EVENT'   => $bind,
						'HANDLER' => $handler
					)
				);
			}
			CRestPlus::callBatch($dataBind);
		}
	}

	/**
	* Метод пользовательского подключения скриптов с системным оповещением
	*
	* @var string script - имя файла ('script.php')
	* @return void
	*/
	public function showSystemMessage ($script, $die = false) {
		require_once self::SYSTEM_MESSAGE.$script;
		if ($die) die();
	}
	
}