<?
class NarinSyntaxPlugin extends NarinPlugin {
	
	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();
	}	
	
	public function getType() {
		return "syntax";
	}

	/**
	 * ���� Ŭ�������� �ߺ������ؾ� ��
	 */
	public function register($parser) {}
}
?>