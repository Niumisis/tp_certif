<?php
/**
 * Objet de domaine : Collection de postits
 *
 * Représente une collection de postits itérable
 *
 * @category   MyApp
 * @package    Core
 * @subpackage Model
 * @example <br />
 *		  Instanciation : <br />
 *		  <b>$postits = new Core_Model_PostitCollection();</b><br />
 *		  <b>$postits->add(new Core_Model_Postit);</b>
 * @version 0.01
 * @since 2012-09-03
 * @author Moi <moi@monmail.com>
 */
class Core_Model_PostitCollection extends My_Model_Collection
{
	public function toArray()
	{
		$postitsArray = array();
		$postitMapper = new Core_Model_Mapper_Postit();
		
		
		foreach ($this as $postit) {
			$postitsArray[] = $postitMapper->objectToArray($postit);
		}
		
		return $postitsArray;
	}
}








