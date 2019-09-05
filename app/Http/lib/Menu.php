<?php
namespace app\Http\lib;

class Menu{
	protected $_data = array();
	protected $_result = '';
	protected $_open = '<ul class="main-nav flex-center-between">';
	protected $_open1 = '<ul>';
	protected $_close = '</ul>';
	protected $_openitem = '<li>';
	protected $_closeitem = '</li>';
	protected $_baseurl;
    public function __construct($config = '')
    {
		if ($config != '') {
			$this->setOption($config);
		}
    }
    public function setOption($config)
    {
		foreach ($config as $key => $value) {
			$method = 'set' . ucfirst($key);
			$this->$method($value);
		}
	}
    public function setOpen($tag)
    {
		$this->_open = $tag;
    }
    public function setClose($tag)
    {
		$this->_close = $tag;
    }
    public function setOpenitem($tag)
    {
		$this->_openitem = $tag;
    }
    public function setCloseitem($tag)
    {
		$this->_closeitem = $tag;
    }
    public function setBaseurl($url)
    {
		$this->_baseurl = $url;
	}
	public function setMenu($data){
		foreach ($data as $tmp){
			$id = $tmp['parent_id'];
			$this->_data[$id][] = $tmp;
		}
    }
    public function callMenu($parent = 0)
    {
		if (isset($this->_data[$parent])) {
		    if ($parent == 0) {
                $this->_result .= $this->_open; // thẻ ul mở c1
                $this->_result .= '<li><a href=""><i class="fa fa-home"></i> </a></li>';
            } else {
		        $this->_result .= $this->_open1;
            }
			foreach ($this->_data[$parent] as $tmp) {
				$this->_result .= $this->_openitem; // mở thẻ li c1
				$id = $tmp['id'];
				if (isset($this->_data[$id])) {
					$this->_result .= '<a href="' . $tmp['slug'] . '">' . $tmp['name'] . '</a>';
				} else {
					$this->_result .= '<a href="' . $tmp['slug'] . '">' . $tmp['name'] . '</a>';
				}
				$this->callMenu($id);
				$this->_result .= $this->_closeitem; // đóng thẻ li c
			}
			$this->_result .= $this->_close;// đóng thẻ ul cấp 1
        }
		return $this->_result;
	}
}
