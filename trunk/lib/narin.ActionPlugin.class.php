<?
/**
 * �׼� �÷����� Ŭ����
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     byfun (http://byfun.com)
 */
 
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