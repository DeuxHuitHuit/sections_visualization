<?php
	/*
	Copyight: Deux Huit Huit 2012
	License: MIT, see the LICENCE file
	*/

	if(!defined("__IN_SYMPHONY__")) die("<h2>Error</h2><p>You cannot directly access this file</p>");

	require_once(TOOLKIT . '/class.administrationpage.php');

	class contentExtensionSections_visualizationIndex extends AdministrationPage {

		public function __construct() {
			parent::__construct();

		}

		/**
		 * Builds the content view
		 */
		public function __viewIndex() {
			$title = __(extension_sections_visualization::EXT_NAME);

			//$this->setPageType('table');

			$this->setTitle(__('%1$s &ndash; %2$s', array(__('Symphony'), $title)));

			$this->appendSubheading(__($title));

			// build header table
			/*$aTableHead = ViewFactory::buildTableHeader($this->_cols);

			// build body table
			$aTableBody = ViewFactory::buildTableBody($this->_cols, $this->_data);

			// build data table
			$table = Widget::Table(
				Widget::TableHead($aTableHead), // header
				NULL, // footer
				Widget::TableBody($aTableBody), // body
				'selectable' // class
				// id
				// attributes
			);

			$this->Form->appendChild($table);

			$this->Form->appendChild(
				ViewFactory::buildActions($this->_hasData)
			);*/
		}


	}