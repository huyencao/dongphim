<?php
namespace app\Http\lib;
class Menu{
	protected $_data = array();
	protected $_result = '';
	protected $_open = '<ul>';
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
			$this->_result .= $this->_open;
			foreach ($this->_data[$parent] as $tmp) {
				$this->_result .= $this->_openitem;
				$id = $tmp['id'];
				if (isset($this->_data[$id])) {
					$this->_result .= '<a href="' . $tmp['link'] . '" class="dropdown-toggle" data-toggle="dropdown" role="button">' . $tmp['title'] . '</a>';
				} else {
					$this->_result .= '<a href="' . $tmp['link'] . '">' . $tmp['title'] . '</a>';
				}
				$this->callMenu($id);
				$this->_result .= $this->_closeitem;
			}
			$this->_result .= $this->_close;
        }
		return $this->_result;
	}
}
