<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class voxteneotestdev_lib
{
    function voxteneotestdev_lib()
    {
        $this->CI=& get_instance();
		$this->CI->load->library('session');
        $this->CI->load->helper('form');
        $this->CI->load->helper('url');
        $this->CI->load->helper('language');
    }
	function get_start($iDisplayStart) {
			$start = 0;
			if (isset($iDisplayStart)) {
				$start = intval($iDisplayStart);

				if ($start < 0)
					$start = 0;
			}

			return $start;
		}

	function get_rows($iDisplayLength) {
			$rows = 10;
			if (isset($iDisplayLength)) {
				$rows = intval($iDisplayLength);
				if ($rows < 5 || $rows > 500) {
					$rows = 10;
				}
			}

			return $rows;
		}

	function get_sort_dir($sSortDir_0) {
			$sort_dir = "ASC";
			$sdir = strip_tags($sSortDir_0);
			if (isset($sdir)) {
				if ($sdir != "asc" ) {
					$sort_dir = "DESC";
				}
			}

			return $sort_dir;
		}

	function get_sort($iSortCol_0,$cols,$sumcols) {
			$sCol = $iSortCol_0;
			$col = 0;
			if (isset($sCol)) {
				$col = intval($sCol);
				if ($col < 0 || $col > $sumcols)
					$col = 0;
			}
			$colName = $cols[$col];

			return $colName;
		}

 
}
