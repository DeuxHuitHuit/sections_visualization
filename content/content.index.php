<?php
	/*
	Copyight: Deux Huit Huit 2012
	License: MIT, see the LICENCE file
	*/

	if(!defined("__IN_SYMPHONY__")) die("<h2>Error</h2><p>You cannot directly access this file</p>");

	require_once(TOOLKIT . '/class.administrationpage.php');

	require_once(EXTENSIONS . '/sections_visualization/lib/class.structure.php');

	class contentExtensionSections_visualizationIndex extends AdministrationPage {

		public function __construct() {
			parent::__construct();

		}

		/**
		 * Builds the content view
		 */
		public function __viewIndex() {
			$title = __(extension_sections_visualization::EXT_NAME);

			$this->setTitle(__('%1$s &ndash; %2$s', array(__('Symphony'), $title)));

			$this->appendSubheading(__($title));

			$this->buildSections();
		}

		private function buildSections() {
			$sections = Structure::instance()->lazyLoad()->getSections();

			foreach ($sections as $section) {
				$xmlSection = new XMLElement('section');
				$xmlSection->appendChild(new XMLElement('h3', $section['section']['name']));

				$xmlSection->appendChild($this->buildSectionData($section['section']));
				$xmlSection->appendChild($this->buildSectionFields($section['fields']));

				$this->Form->appendChild($xmlSection);
			}
		}

		private function buildSectionData($section) {
			$headerTds = array();
			$dataTds = array();
			foreach ($section as $secPropKey => $secProp) {
				if ($secPropKey != 'name' && $secPropKey != 'handle') {
					$headerTds[] = array($secPropKey, 'col');
					$dataTds[] = Widget::TableData($secProp);
				}
			}

			$rows = array(Widget::TableRow($dataTds));
			return Widget::Table(
						Widget::TableHead($headerTds),
						NULL,
						Widget::TableBody($rows),
						'section-props' // class
						// id
						// attributes
						);
		}

		private function buildSectionFields($fields) {
			$xmlFields = new XMLElement('ul', NULL, array('class' => 'fields'));

			foreach ($fields as $field) {
				$xmlField = new XMLElement('li');
				$xmlFieldTitle = new XMLElement('div', $field['label']);

				$headerTds = array();
				$dataTds = array();
				foreach ($field as $fieldKey => $fieldProp) {
					if ($fieldKey != 'label' && $fieldKey != 'element_name') {
						$headerTds[] = array($fieldKey, 'col');
						if (is_array($fieldProp)) {
							$fieldProp = implode(', ', $fieldProp);
						}
						$dataTds[] = Widget::TableData($fieldProp);
					}
				}

				$rows = array(Widget::TableRow($dataTds));

				$xmlFieldTable = Widget::Table(
							Widget::TableHead($headerTds),
							NULL,
							Widget::TableBody($rows),
							'fields-props' // class
							// id
							// attributes
							);

				$xmlField->appendChild($xmlFieldTitle);
				$xmlField->appendChild($xmlFieldTable);
				$xmlFields->appendChild($xmlField);
			}
			return $xmlFields;
		}

	}