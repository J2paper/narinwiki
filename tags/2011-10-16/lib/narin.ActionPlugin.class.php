<?

class NarinActionPlugin extends NarinPlugin {
		
	/**
	 * ������
	 */
	public function __construct() {
		parent::__construct();
	}		
	
	/**
	 * ���� Ŭ�������� �ߺ������ؾ� ��
	 */
	public function register($ctrl) {}
		
	/**
	 * �÷����� ����
	 */
	public function getType() {
		return "action";
	}
}
?>