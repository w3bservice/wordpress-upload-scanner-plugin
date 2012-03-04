<?php

if ( !defined( 'ABSPATH') ) {
    exit();
}

/**
 * Upload Scan Report
 * @author Kurt Payne
 * @version 1.1
 * @package Upload_Scan_Plugin
 */
abstract class Upload_Scan_Report_Printer {
	
	/**
	 * Upload scan report
	 * @var Upload_Scan_Report
	 */
	protected $_report = null;

	/**
	 * Mutator for scan report
	 * @param Upload_Scan_Report $report
	 */
	public function setReport( Upload_Scan_Report $report ) {
		$this->_report = $report;
	}
	
	/**
	 * Get the current URL
	 * @return string
	 */
	public function getCurrentURL() {
		$url = $_SERVER['REQUEST_URI'];
		$parts = parse_url( $url );
		if ( isset( $parts['scheme'] ) ) {
			$scheme = $parts['scheme'];
		} elseif ( is_ssl() ) {
			$scheme = 'https';
		} else {
			$scheme = 'http';
		}
		return sprintf('%s://%s%s',
			$scheme,
			( isset( $parts['host'] ) ? $parts['host'] : $_SERVER['HTTP_HOST'] ),
			$_SERVER['REQUEST_URI']
		);
	}
}
