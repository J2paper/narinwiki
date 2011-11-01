<?
/**
 * ������Ű �÷����� ���� Ŭ����
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     byfun (http://byfun.com)
 */

class NarinPluginInfo extends NarinClass {
	
	protected $id;	
	protected $plugin_path;
	protected $data_path;
	protected $setting;
	
	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();
			
		// get default setting from plugin instance
		$default = $this->getSetting();
		if($default) {
			
			// load saved setting from db
			//$setting = wiki_get_option("plugin_setting/".$this->id);			
			$setting = $this->wiki_config->plugin_setting[$this->id];
			// set setting as loaded value
			if($setting) {
				foreach($default as $k => $v) {
					// if default config is different with saved setting by updating plugin
					if(isset($setting[$k])) $default[$k][value] = $setting[$k];					
				}
			} 
			
			$this->setting = $default;
		} 
	
		$this->plugin_path = $this->wiki[path]."/plugins/".basename(dirname(__FILE__));
		$this->data_path = $this->wiki[path]."/data/".$this->wiki[bo_table];
	}	

	/**
	 * Return ID
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Return plugin path
	 */
	public function getPluginPath() {
		return $this->plugin_path;
	}
	
	/**
	 * Return data path
	 */
	public function getDataPath() {
		return $this->data_path;
	}	

	public function getPluginSetting() {
		return $this->setting;
	}
	
	/**
	 * ���� ����
	 * syntax / action �÷����ο��� �ߺ����� ��
	 */
	public function getSetting() {}
	
	/*
	 * ������ ������ ���� �Ǿ� ��	 
		$setting = array(
			"name"=>array("type"=>"text", "label"=>"�̸� : ", "desc"=>"�̸��� �Է��ؿ�", "default"=>"it's default value", "value"=>"test"),
			"desc"=>array("type"=>"textarea", "label"=>"���� : ", "default"=>"it's default value", "value"=>"ohohoh"),
			"year"=>array("type"=>"select", "label"=>"���� : ", "options"=>array(1, 2, 3, 4, 5, 6, 7, 8), "default"=>2, "value"=>4),
			"lunar"=>array("type"=>"checkbox", "label"=>"���� : ", "default"=>"checked", "setval"=>1)
		);	
	*/
    // ������Ű ���� ���������� �÷����ο� ���� ������ �� �� �ֵ���,
    // ������ ���� �������� setting ����
    // setting ���� : array( �ʵ�1=>array(�Ӽ�), �ʵ�2=>array(�Ӽ�) ...);
    // �Ӽ� ����
    //    type=>text : <input type="text" ...> �������� �������������� ����
    //    type=>textarea : <textarea ...></textarea> �������� �������������� ����
    //    type=>select : <select ..><option...></select> �������� �������������� ����
    //          select �� ��� options �� array �������� �ݵ�� �����ؾ� ��
    //    type=>checkbox : <input type="checkbox" ..> �������� �������������� ����
    //    value : �⺻��
    //    label : ���������� �Է� ���� ����ĭ�� ���� ���̺�
    //    desc : �Է°��� ���� ������ �ʿ��ϴٸ� �Է�	
	public function checkSetting($setting) {
		foreach($setting as $name => $attr) {
			if(!isset($attr[type]) || !isset($attr[label]) || !isset($attr[value])) {
				return false;
			}
			if($attr[type] == "select" && ( !isset($attr[options]) || !is_array($attr[options]))) {
				return false;
			}
		}
		return true;
	}
	
	/**
	 * �÷����� ��ġ�ؾ� �ϳ�?
	 * syntax / action �÷����ο��� �ߺ����� ��
	 */
	public function shouldInstall() { return false;	}

	/**
	 * �÷����� ���ν����ؾ� �ϳ�?
	 * syntax / action �÷����ο��� �ߺ����� ��
	 */
	public function shouldUnInstall() { return false;	}
	
	/**
	 * �÷����� ��ġ
	 * syntax / action �÷����ο��� �ߺ����� ��
	 */
	public function install() { }
	
	/**
	 * �÷����� ����
	 * syntax / action �÷����ο��� �ߺ����� ��
	 */
	public function uninstall() { }	
	
	/**
	 * ���������������� �÷����� ���� �� ȣ��
	 * syntax / action �÷����ο��� �ߺ����� ��
	 */	
	public function afterSetSetting($setting) {}
	
}
?>