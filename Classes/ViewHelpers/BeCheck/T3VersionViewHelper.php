<?php


/**
 * Backend Check Viewhelper: Check if TYPO3 Version is correct
 *
 * @package TYPO3
 * @subpackage Fluid
 */
class Tx_Powermail_ViewHelpers_BeCheck_T3VersionViewHelper extends Tx_Fluid_ViewHelpers_Form_AbstractFormFieldViewHelper {

    /**
     * Check if TYPO3 Version is correct
     *
     * @return 	boolean
     */
    public function render() {
		// settings
		global $EM_CONF, $_EXTKEY;
		$_EXTKEY = 'powermail';
		require_once(t3lib_extMgm::extPath('powermail') . 'ext_emconf.php');
		$versionString = $EM_CONF[$_EXTKEY]['constraints']['depends']['typo3'];
		$versions = explode('-', $versionString);

		if (t3lib_div::int_from_ver(TYPO3_version) > t3lib_div::int_from_ver($versions[0]) && t3lib_div::int_from_ver(TYPO3_version) < t3lib_div::int_from_ver($versions[1])) {
			return true;
		}
		return false;
    }
}

?>