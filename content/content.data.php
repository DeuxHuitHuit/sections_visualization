<?php
	/*
	Copyight: Deux Huit Huit 2012
	License: MIT, see the LICENCE file
	*/

	if(!defined("__IN_SYMPHONY__")) die("<h2>Error</h2><p>You cannot directly access this file</p>");

	require_once(TOOLKIT . '/class.ajaxpage.php');

	require_once(EXTENSIONS . '/sections_visualization/lib/class.structure.php');

	class contentExtensionSections_visualizationData extends AjaxPage {

		private $_sections = NULL;

		/**
		 *
		 * Builds the content view
		 */
		public function view() {
			$this->_sections = Structure::instance()->lazyLoad()->getSections();
		}

		/**
		 *
		 * Generate de HTTP response output
		 */
		public function generate() {
			header('Content-Type: application/json');
			echo json_encode($this->_sections);
			exit;
		}
	}