<?php
	/*
	Copyight: Deux Huit Huit 2012
	License: MIT, see the LICENCE file
	*/

	if(!defined("__IN_SYMPHONY__")) die("<h2>Error</h2><p>You cannot directly access this file</p>");

	require_once(TOOLKIT . '/class.sectionmanager.php');

	class Structure {

		// holds up all sections data
		private $_sections = array();

		private static $_instance = NULL;

		private function __construct() {}

		public static function instance() {
			if (!self::$_instance) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		public function getSections() {
			return $this->_sections;
		}

		public function lazyLoad() {
			if (empty($this->_sections)) {
				$this->load();
			}
			return $this;
		}

		public function load() {
			$sections = SectionManager::fetch();

			foreach ($sections as $sectionKey => $section) {
				$aSection = array();
				$aSection['section'] = $section->get();
				$aSection['associated-sections'] = $section->fetchAssociatedSections();
				$aSection['fields'] = array();

				$fields = $section->fetchFields();
				foreach ($fields as $fKey => $f) {
					$aSection['fields'][$fKey] = $f->get();
				}

				$this->_sections[$sectionKey] = $aSection;
			}

			return $this;
		}
	}